<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Discount_incomeRequest;
use App\Discount_income;
use App\Permissions;
use App\User;

class Discounts_incomeController extends Controller
{
    public  function index(){
        $discount = Discount_income::orderBy('key','ASC')->get();



        $id= \Auth::user()->id;
        $users = User::find($id);
        $profile = $users->profile_id;
        $perm = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',282)->where('view','=',1)->count();
        $perm_btn = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',282)->select('add','update','delete')->get();
        if($perm==0) {
            return redirect()->route('admin.template.main');
        } else{
            return view('admin.discounts_income.index')->with('discount',$discount)->with('perm_btn',$perm_btn);
        }
    }
    public function update(Request $request, $id){
        $discount = Discount_income::find($id);
        if ($request->value!=null){
            $field = $request->name;
            $discount->$field = $request->value;
        }else{
          abort(501);
         }
        $discount->save();
        return $discount->$field;
    }
    public function destroy($id, Request $request){
        $discount = Discount_income::find($id);
        $discount->delete();

        $mensaje="Descuento o Ingreso eliminado exitosamente!";

        if($request->ajax()){
            return $mensaje;
        }
    return redirect()->route('admin.discounts_income.index');
}

    public function store(Discount_incomeRequest $request){
        $discount = new Discount_income($request->all());
        $discount->save();
        return redirect()->route('admin.discounts_income.index')->with('msjtrue',"Descuento o Ingreso ".$discount->key." creado exitosamente!");
    }

}
