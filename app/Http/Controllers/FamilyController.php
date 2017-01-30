<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FamilyRequest;
use App\Family;
use App\Cost;
use App\Key;
use App\Permissions;
use App\User;



class FamilyController extends Controller
{
    public function index()
    {
        // simulacion permiso
        $configKey="manual";
        // fin simulacion permiso

        $family = Family::orderBy('nameFamily', 'ASC')->where('type','=','obra')->get();
        $cost = Cost::orderBy('nameCosts','ASC')->lists('nameCosts','id');//contenido - value

        $family->each(function($family){
            $family->cost;

        });
        $id= \Auth::user()->id;
        $users = User::find($id);
        $profile = $users->profile_id;
        $perm = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',91)->where('view','=',1)->count();
        $perm_btn = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',91)->select('add','update','delete')->get();
        if($perm==0) {
            return redirect()->route('admin.template.main');
        } else{
            return view('admin.families.index')
                ->with('family', $family)
                ->with('cost',$cost)
                ->with('configKey',$configKey)
                ->with('perm_btn',$perm_btn);
        }
    }
    public function update(Request $request, $id){
        $family = Family::find($id);
        if ($request->value!=null){
            $field = $request->name;
            $family->$field = $request->value;
        }else{
            abort(501);
        }
        $family->save();
        return $family->$field;
    }
    public function destroy($id, Request $request){
        $family = Family::find($id);
        $family->delete();

        $mensaje="Familia eliminada exitosamente!";

        if($request->ajax()){
            return $mensaje;
        }
        return redirect()->route('admin.families.index');
    }
    public function store(FamilyRequest $request){
            $family = new Family($request->all());
            $family->save();
            return redirect()->route('admin.families.index')->with('msjtrue',"Familia ".$family->nameFamily." creada exitosamente!");
}
}
