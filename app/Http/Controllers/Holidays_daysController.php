<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Holiday_day;
use App\Http\Requests;
use App\Http\Requests\Holiday_dayRequest;
use Carbon\Carbon;
use App\Permissions;
use App\User;
class Holidays_daysController extends Controller
{
        public function index(){

                $holiday = Holiday_day::orderBy('description','ASC')->get();
                $date = Carbon::now();



                $id= \Auth::user()->id;
                $users = User::find($id);
                $profile = $users->profile_id;
                $perm = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',283)->where('view','=',1)->count();
                $perm_btn = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',283)->select('add','update','delete')->get();
                if($perm==0) {
                        return redirect()->route('admin.template.main');
                } else{
                        return view('admin.holidays_days.index')
                            ->with('holiday', $holiday)
                            ->with('date',$date)
                            ->with('perm_btn',$perm_btn);
                }
        }

        public function update(Request $request, $id){
                $holiday = Holiday_day::find($id);
                if ($request->value!=null){
                        $field = $request->name;
                        $holiday->$field = $request->value;
                }else{
                        abort(501);
                }
                $holiday->save();
                return $holiday->$field;
        }
        public function update2(Request $request, $id){
                $holiday = Holiday_day::find($id);

                if($holiday->status=="Activo"){
                        $holiday->status="Inactivo";
                }else if ($holiday->status=="Inactivo"){
                        $holiday->status="Activo";
                }

                $holiday->save();

                if($request->ajax()){
                        return response()->json([
                            'id' => $holiday->id,
                            'statusHoliday' => $holiday->status,
                        ]);
                }
                return redirect()->route('admin.holidays_days.index');
        }
        public  function  destroy($id, Request $request){
                $holiday = Holiday_day::find($id);
                $holiday->delete();

                $mensaje = "Dia feriado eliminado exitosamente";

                if ($request->ajax()){
                        return $mensaje;
                }
                 return redirect()->route('admin.holidays_days.index');
}

        public function store(Holiday_dayRequest $request){
                $holiday = new Holiday_day($request->all());
                
                $yearNuevo="0000";
                $dias_mes =substr($request->date, -6, 6);//Obtiene el mes y el dia , ejemplo -18-12
                $Complete=$yearNuevo.$dias_mes;// sera la fecha final por ejemplo 0000-18-12
                $holiday->date = $Complete;
                $holiday->save();
            
                return redirect()->route('admin.holidays_days.index')->with('msjtrue',"Dia feriado ".$holiday->description." creado exitosamente!");
        }

}
