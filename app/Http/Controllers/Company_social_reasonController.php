<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Company_social_reasonRequest;
use App\Http\Requests\Company_social_reason2Request;
use App\Http\Requests\LogoRequest;
use App\Company_social_reason;
use App\state;
use App\Municipalities;
use App\Section;
use App\Permissions;
use App\User;

class Company_social_reasonController extends Controller
{
    public function index(){

        $rse = Company_social_reason::orderBy('status','ASC')->get();
        $state = state::orderBy('name','ASC')->lists('name','id');//contenido - value


        $id= \Auth::user()->id;
        $users = User::find($id);
        $profile = $users->profile_id;
        $perm = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',13)->where('view','=',1)->count();
        $perm_btn = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',13)->select('add','update','delete')->get();
        if($perm==0) {
            return redirect()->route('admin.template.main');
        } else{
            return view('admin.company_social_reason.index')
                ->with('rsee',$rse)
                ->with('state',$state)
                ->with('perm_btn',$perm_btn);
        }


    }

    public function getMunicipalities(Request $request,$id){
        if($request->ajax()){
            $municipalities = Municipalities::municipalities($id);
            return response()->json($municipalities);
        }
    }

    public function update2(Request $request, $id){
        $rse = Company_social_reason::find($id);
        if($rse->status=="activo"){
            $rse->status="inactivo";
        }else if ($rse->status=="inactivo"){
            $rse->status="activo";
        }

        $rse->save();

        if($request->ajax()){
            return response()->json([
                'id' => $rse->id,
                'statusRSE' => $rse->status
            ]);
        }
        return redirect()->route('admin.company_social_reason.index');
    }
    
        public function destroy($id, Request $request){
            $rse = Company_social_reason::find($id);
            $ruta=public_path() . '/img/logos/';
            $archivo = $rse->logoEnterprice;

          if($archivo!=""){
                if(unlink($ruta.$archivo)){
                    $rse->delete();
                }
            }else{
                $rse->delete();
            }

            $mensaje ="Razón eliminada exitosamente!";

           if($request->ajax()){
                return $mensaje;
            }
            return redirect()->route('admin.company_social_reason.index');
        }

    public function store(Company_social_reasonRequest $request){
        // Manipulacion de imgs
        $name="";
        if ($request->file('logoEnterprice')) {
            $file = $request->file('logoEnterprice');
            $name = 'logoEmpresa' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/img/logos/';
            $file->move($path, $name);
        }
        
            $rse = new Company_social_reason($request->all());

            $rse->logoDefault = "logo_no_disponible.png";
            $rse->logoEnterprice=$name;
            $rse->user_id= \Auth::user()->id;
            $rse->save();
        //----------------------------------------------------------CREA SUS SECCIONES EN MENU----------------------------------------------------------
        $sec_default = new Section();
        $sec_default->reference = 3;
        $sec_default->section = $rse->companyReason;
        $sec_default->description = $rse->companyReason;
        //Pendiente URL
        //Order pendinte
        $sec_default->haveAdd = 0;
        $sec_default->haveUpdate = 0;
        $sec_default->haveDelete = 0;
        $sec_default->hijo = 1;
        $sec_default->padre = 3;
        $sec_default->save();
        $sec_default->company_social_reason_id=$rse->id;
        $sec_default->save();


        $section1 = new Section;
        $section1->section = "Programación de pagos";
        $section1->order = 1;
        $section1->haveAdd = 1;
        $section1->haveUpdate = 1;
        $section1->padre = 3;
        $section1->company_social_reason_id = $rse->id;
        $section1->reference=$sec_default->id;
        $section1->save();


        $section2 = new Section;
        $section2->section = "Ejecución de pagos";
        $section2->order = 2;
        $section2->haveAdd = 1;
        $section2->haveUpdate = 1;
        $section2->padre = 3;
        $section2->company_social_reason_id = $rse->id;
        $section2->reference=$sec_default->id;
        $section2->save();


        $section3 = new Section;
        $section3->section = "Histórico de pagos";
        $section3->order = 3;
        $section3->padre = 3;
        $section3->company_social_reason_id = $rse->id;
        $section3->reference=$sec_default->id;
        $section3->save();


        $section4 = new Section;
        $section4->section = "Saldar";
        $section4->order = 4;
        $section4->haveAdd = 1;
        $section4->haveUpdate = 1;
        $section4->padre = 3;
        $section4->company_social_reason_id = $rse->id;
        $section4->reference=$sec_default->id;
        $section4->save();


        $section5 = new Section;
        $section5->section = "Impresión";
        $section5->order = 5;
        $section5->padre = 3;
        $section5->company_social_reason_id = $rse->id;
        $section5->reference=$sec_default->id;
        $section5->save();

        //----------------------------------------------------------/CREA SUS SECCIONES EN MENU----------------------------------------------------------
            return redirect()->route('admin.company_social_reason.index')->with('msjtrue', "Razón " . $rse->companyReason . " creada exitosamente!");

    }
    
    public function edit($id){
        
        $rse = Company_social_reason::find($id);
        return response()->json($rse);
    }
    
    public function update(Company_social_reason2Request $request, $id){

        if($request->ajax()){
            $rse = Company_social_reason::find($id);
            $rse->fill($request->all());
            $rse->save();
        
        }
        return response()->json(["success" =>  true, "data" => $request->all()]);
    }
    
    public function logo($id,LogoRequest $request){
        $rse = Company_social_reason::find($id);
        $ruta=public_path() . '/img/logos/';
        $archivo = $rse->logoEnterprice;
        $mensaje ="El logo fue actualizado";

        if($request->ajax()){
            if ($request->file('logoEnterprice2')) {

                if($archivo!=""){
                    unlink($ruta.$archivo);
                    $file = $request->file('logoEnterprice2');
                    $name = 'logoEmpresa' . time() . '.' . $file->getClientOriginalExtension();
                    $path = public_path() . '/img/logos/';
                    $file->move($path, $name);

                    $rse->logoEnterprice=$name;
                    $rse->save();
                }else{
                    $file = $request->file('logoEnterprice2');
                    $name = 'logoEmpresa' . time() . '.' . $file->getClientOriginalExtension();
                    $path = public_path() . '/img/logos/';
                    $file->move($path, $name);

                    $rse->logoEnterprice=$name;
                    $rse->save();
                }//fin validacion nombre de archivo sea diferente de nada
            }else{
                abort(501);
            }// fin validacion request file

            $rseAc = Company_social_reason::find($id);
            return response()->json(["success" =>  true, "data" => $rseAc,"msj"=>$mensaje]);
        }
    }
    
}