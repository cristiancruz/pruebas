<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Petty_cash_conceptRequets;
use App\Petty_cash_concept;
use App\Permissions;
use App\User;

class Petty_cash_conceptsController extends Controller
{
    public function index(){
        $cash = Petty_cash_concept::orderBy('nameCash','ASC')->get();


        $id= \Auth::user()->id;
        $users = User::find($id);
        $profile = $users->profile_id;
        $perm = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',19)->where('view','=',1)->count();
        $perm_btn = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',19)->select('add','update','delete')->get();
        if($perm==0) {
            return redirect()->route('admin.template.main');
        } else{
            return view('admin.petty_cash_concepts.index')->with('cash',$cash)->with('perm_btn',$perm_btn);
        }
    }
    public function update(Request $request, $id){
        $cash = Petty_cash_concept::find($id);
        if ($request->value!=null){
            $field = $request->name;
            $cash->$field = $request->value;
        }else{
            abort(501);
        }
        $cash->save();
        return $cash->$field;
    }
    public  function  destroy($id, Request $request){
        $cash = Petty_cash_concept::find($id);
        $cash->delete();

        $mensaje = "Concepto eliminado exitosamente";

        if ($request->ajax()){
            return $mensaje;
        }
        return redirect()->route('admin.petty_cash_concepts.index');
    }
    public function store(Petty_cash_conceptRequets $request){
        $cash = new Petty_cash_concept($request->all());
        $cash->save();
        return redirect()->route('admin.petty_cash_concepts.index')->with('msjtrue',"Concepto ".$cash->nameCash." creado exitosamente!");
    }

}
