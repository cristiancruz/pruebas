<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\Project2Request;
use App\Project;
use App\Permissions;
use App\User;
use Carbon\Carbon;
use App\state;
use App\Company_social_reason;
use App\Client_social_reason;
use App\Developments;
use App\Client;

class ProjectController extends Controller
{
    public function  index(){
        $projects = Project::get();
        $date = Carbon::now();
        $state = state::orderBy('name','ASC')->lists('name','id');
        $rsc = Client_social_reason::lists('nameReason','id');
        $rse = Company_social_reason::lists('companyReason','id');
        $dev = Developments::lists('name','id');
        $clie = Client::lists('name','id');
        $devview=1;

        $projects->each(function($projects){
            $projects->client;

        });

        $id= \Auth::user()->id;
        $users = User::find($id);
        $profile = $users->profile_id;
        $perm = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',53)->where('view','=',1)->count();
        $perm_btn = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',53)->select('add','update','delete')->get();
        if($perm==0) {
            return redirect()->route('admin.template.main');
        } else{
            return view('admin.projects.index',compact('projects','perm_btn','date','state','rsc','rse','dev','clie','devview'));
        }
    }
    public function destroy($id, Request $request){
        $projects = Project::find($id);
        $projects->delete();

        $mensaje="Proyecto eliminado exitosamente!";

        if($request->ajax()){
            return $mensaje;
        }
        return redirect()->route('admin.projects.index');
    }
    public function store(ProjectRequest $request){
        $projects = new Project($request->all());
        $projects->user_id= \Auth::user()->id;
        $projects->save();
        return redirect()->route('admin.projects.index')->with('msjtrue',"Proyecto ".$projects->nameProject." creado exitosamente!");
    }
    public function getRazonSocialCliente(Request $request,$id){
         if($request->ajax()){
            $client_social_reason = Client_social_reason::where('client_id','=',$id)->get();
            return response()->json($client_social_reason);
        }
    }
      public function edit($id){
        $projects = Project::find($id);
        return response()->json($projects);
    }
    public function update(Request $request, $id){

        $projects = Project::find($id);
        if ($request->value != null) {
            $field = $request->name;
            $projects->$field = $request->value;
        } else {
            abort(501);
        }
        $projects->save();
        return $projects->$field;
    }

     public function update2(Project2Request $request, $id){
        if($request->ajax()){
            $projects = Project::find($id);
            $projects->fill($request->all());
            $projects->save();

            $projects_info = Project::find($id);

            $reason_client = Client::where('id', '=', $request->client_id)->lists('name');
            
        }

        return response()->json(["success" =>  true, "data" => $request->all(), "info"=>$projects_info,'reason'=>$reason_client]);
    }

}
