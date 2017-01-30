<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\Employee2Request;
use App\Employee;
use App\Job;
use App\Bank;
use Carbon\Carbon;
use App\Permissions;
use App\User;

class EmployeeController extends Controller
{

    public function index()
    {
        $employee = Employee::where('mainOffice','=','obra')->get();
        $job = Job::orderBy('nameJob','ASC')->lists('nameJob','id');//contenido - value
        $bank = Bank::orderBy('bank','ASC')->where('status', '=', 'activo')->lists('bank','id');//contenido - value
        $date = Carbon::now();

        $employee->each(
            function($employee){
            $employee->job;
        });



        $id= \Auth::user()->id;
        $users = User::find($id);
        $profile = $users->profile_id;
        $perm = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',80)->where('view','=',1)->count();
        $perm_btn = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',80)->select('add','update','delete')->get();
        if($perm==0) {
            return redirect()->route('admin.template.main');
        } else{
            return view('admin.employees.index')
                ->with('employee',$employee)
                ->with('job',$job)
                ->with('date',$date)
                ->with('bank',$bank)
                ->with('perm_btn',$perm_btn);
        }
    }

    public function store(EmployeeRequest $request){
        $employee = new Employee($request->all());
        $employee->user_id= \Auth::user()->id;
        $employee->save();
        return redirect()->route('admin.employees.index')->with('msjtrue',"Empleado ".$employee->name." creado exitosamente!");
    }

    public function destroy($id, Request $request){
        $employee = Employee::find($id);
        $employee->delete();

        $mensaje="Empleado eliminado exitosamente!";

        if($request->ajax()){
            return $mensaje;
        }
    }
    public function edit($id){
        $employee = Employee::find($id);
        return response()->json($employee);
    }
    public function update(Employee2Request $request, $id){

        if($request->ajax()){
            $employee = Employee::find($id);
            $employee->fill($request->all());
            $employee->save();
            
            $job_info = Employee::find($id);
            $job = Job::where('id', '=', $request->job_id)->lists('nameJob');
        }

        return response()->json(["success" =>  true, "info"=>$job_info,"job"=>$job]);
    }
}
