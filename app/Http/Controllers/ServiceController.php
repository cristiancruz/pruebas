<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;

use App\Http\Requests;
use App\Http\Requests\ServiceRequests;
use App\Permissions;
use App\User;

class ServiceController extends Controller
{
    public function index(){

        $service = Services::orderBy('name','ASC')->get();



        $id= \Auth::user()->id;
        $users = User::find($id);
        $profile = $users->profile_id;
        $perm = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',286)->where('view','=',1)->count();
        $perm_btn = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',286)->select('add','update','delete')->get();
        if($perm==0) {
            return redirect()->route('admin.template.main');
        } else{
            return view('admin.services.index')->with('service',$service)->with('perm_btn',$perm_btn);
        }

    }
    public function store(ServiceRequests $request){
        $service = new Services($request->all());
        $service->save();
        return redirect()->route('admin.services.index')->with('msjtrue',"Servicio ".$service->name." creado exitosamente!");
    }
    public function destroy($id, Request $request){
        $service = Services::find($id);
        $service->delete();

        $mensaje ="Servicio eliminado exitosamente!";

        if($request->ajax()){
            return $mensaje;
        }
        return redirect()->route('admin.services.index');
    }

    public function update(Request $request, $id){

        $service = Services::find($id);
        if ($request->value != null) {
            $field = $request->name;
            $service->$field = $request->value;
        } else {
            abort(501);
        }
        $service->save();
        return $service->$field;
    }

}
