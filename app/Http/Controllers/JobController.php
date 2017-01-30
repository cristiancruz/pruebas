<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\JobRequest;
use App\Job;
use App\Permissions;
use App\User;

class JobController extends Controller
{
    public function index(){
        $job = Job::orderBy('nameJob','ASC')->get();


        $id= \Auth::user()->id;
        $users = User::find($id);
        $profile = $users->profile_id;
        $perm = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',280)->where('view','=',1)->count();
        $perm_btn = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',280)->select('add','update','delete')->get();
        if($perm==0) {
            return redirect()->route('admin.template.main');
        } else{
            return view('admin.jobs.index')->with('job', $job)->with('perm_btn',$perm_btn);
        }
    }
    public function update(Request $request, $id){
        $job = Job::find($id);
        if ($request->value!=null){
            $field = $request->name;
            $job->$field = $request->value;
        }else{
            abort(501);
        }
        $job->save();
        return $job->$field;
    }
    public function destroy($id, Request $request){
        $job = Job::find($id);
        $job->delete();

        $mensaje="Empleo eliminado exitosamente!";

        if($request->ajax()){
            return $mensaje;
        }
        return redirect()->route('admin.job.index');
    }
    public function store(JobRequest $request){
        $job = new Job($request->all());
        $job->save();
        return redirect()->route('admin.jobs.index')->with('msjtrue',"Empleo ".$job->nameJob." creado exitosamente!");
    }
}
