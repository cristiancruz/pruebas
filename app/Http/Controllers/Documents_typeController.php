<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Documents_typeRequest;
use App\Documents_type;
use App\Permissions;
use App\User;

class Documents_typeController extends Controller
{
     public function index(){
        $doc = Documents_type::orderBy('name','ASC')->get();

         $id= \Auth::user()->id;
         $users = User::find($id);
         $profile = $users->profile_id;
         $perm = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',289)->where('view','=',1)->count();
         $perm_btn = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',289)->select('add','update','delete')->get();
         if($perm==0) {
             return redirect()->route('admin.template.main');
         } else{
             return view('admin.documents_types.index')->with('doc', $doc)->with('perm_btn',$perm_btn);

         }
    }

    public  function update(Request $request, $id){
        $doc = Documents_type::find($id);
        if ($request->value!=null){
            $field = $request->name;
            $doc->$field = $request->value;
        }else{
            abort(501);
        }
        $doc->save();
        return $doc->$field;
    }

    public  function  destroy($id, Request $request){
        $doc = Documents_type::find($id);
        $doc->delete();

        $mensaje = "Tipo de documento eliminado exitosamente";

        if ($request->ajax()){
            return $mensaje;
        }
        return redirect()->route('admin.documents_types.index');
    }
    
    public function store(Documents_typeRequest $request){

        $doc = new Documents_type($request->all());
        $doc->save();
        return redirect()->route('admin.documents_types.index')->with('msjtrue',"Tipo de documento ".$doc->name." creado exitosamente!");
    }

}
