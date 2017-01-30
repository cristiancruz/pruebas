<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\DevelopmentsRequest;
use App\Developments;
use App\Permissions;
use App\User;

class DevelopmentsController extends Controller
{
    public function index(){
        $deve = Developments::orderBy('name','ASC')->get();


        $id= \Auth::user()->id;
        $users = User::find($id);
        $profile = $users->profile_id;
        $perm = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',288)->where('view','=',1)->count();
        $perm_btn = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',288)->select('add','update','delete')->get();
        if($perm==0) {
            return redirect()->route('admin.template.main');
        } else{
            return view('admin.developments.index')->with('deve',$deve)->with('perm_btn',$perm_btn);
        }

    }
    
    public function store(DevelopmentsRequest $request){
        $deve = new Developments($request->all());
        $deve->save();
        return redirect()->route('admin.developments.index')->with('msjtrue',"Desarrollo ".$deve->name." creado exitosamente!");
    }
    
    public function destroy($id, Request $request){
        $deve = Developments::find($id);
        $deve->delete();

        $mensaje ="Desarrollo eliminado exitosamente!";

        if($request->ajax()){
            return $mensaje;
        }
        return redirect()->route('admin.developments.index');
    }

    public function update(Request $request, $id){

        $deve = Developments::find($id);
        if ($request->value != null) {
            $field = $request->name;
            $deve->$field = $request->value;
        } else {
            abort(501);
        }
        $deve->save();
        return $deve->$field;
    }
}
