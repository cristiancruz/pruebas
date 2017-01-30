<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UnitRequest;
use App\Unit;
use App\Permissions;
use App\User;

class UnitsController extends Controller
{
    public function index(){
       $unit = Unit::orderBy('nameUnit','ASC')->get();

        $id= \Auth::user()->id;
        $users = User::find($id);
        $profile = $users->profile_id;
        $perm = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',281)->where('view','=',1)->count();
        $perm_btn = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',281)->select('add','update','delete')->get();
        if($perm==0) {
            return redirect()->route('admin.template.main');
        } else{
            return view('admin.units.index')->with('unit', $unit)->with('perm_btn',$perm_btn);
        }
    }
    public  function update(Request $request, $id){
        $unit = Unit::find($id);
        if ($request->value!=null){
            $field = $request->name;
            $unit->$field = $request->value;
        }else{
            abort(501);
        }
        $unit->save();
        return $unit->$field;
    }
    public  function  destroy($id, Request $request){
        $unit = Unit::find($id);
        $unit->delete();

        $mensaje = "Unidad eliminada exitosamente";

        if ($request->ajax()){
            return $mensaje;
        }
        return redirect()->route('admin.units.index');
    }
    
    public function store(UnitRequest $request){
        $unit = new Unit($request->all());
        $unit->save();
        return redirect()->route('admin.units.index')->with('msjtrue',"Unidad ".$unit->nameUnit." creada exitosamente!");
    }

}
