<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Permissions;

class PermissionsController extends Controller
{
    public function edit($id){
        $per = Permissions::where('profiles_id','=',$id)->get();
        return response()->json($per);
    }
    public function update_store(Request $request, $id, $id_seccion){

        $per = Permissions::where('profiles_id','=',$id)->where('sections_id','=',$id_seccion)->get();

        return response()->json(["success" =>  true, "data" => $per]);
    }
    public function store(Request $request){
        if($request->ajax()) {
            $per = new Permissions($request->all());
            $per->save();
        }
        return response()->json(["success" =>  true,'data'=>$per]);
    }
    public function updateV(Request $request, $_id, $seccion_id){
        $per = Permissions::where('profiles_id','=',$_id)->where('sections_id','=',$seccion_id)->lists('id');
        $search_id = Permissions::find($per);

        if($search_id->view==0){
            $search_id->view=1;
        }else if($search_id->view==1){
            $search_id->view=0;
        }
        $search_id->save();

        return response()->json($search_id);
    }
    public function update_add(Request $request, $_id, $seccion_id){
        $per = Permissions::where('profiles_id','=',$_id)->where('sections_id','=',$seccion_id)->lists('id');
        $search_id = Permissions::find($per);

        if($search_id->add==0){
            $search_id->add=1;
        }else if($search_id->add==1){
            $search_id->add=0;
        }
        $search_id->save();

    return response()->json($search_id);
}

    public function update_update(Request $request, $_id, $seccion_id){
        $per = Permissions::where('profiles_id','=',$_id)->where('sections_id','=',$seccion_id)->lists('id');
        $search_id = Permissions::find($per);

        if($search_id->update==0){
            $search_id->update=1;
        }else if($search_id->update==1){
            $search_id->update=0;
        }
        $search_id->save();

        return response()->json($search_id);
    }
    public function update_delete(Request $request, $_id, $seccion_id){
        $per = Permissions::where('profiles_id','=',$_id)->where('sections_id','=',$seccion_id)->lists('id');
        $search_id = Permissions::find($per);

        if($search_id->delete==0){
            $search_id->delete=1;
        }else if($search_id->delete==1){
            $search_id->delete=0;
        }
        $search_id->save();

        return response()->json($search_id);
    }
}