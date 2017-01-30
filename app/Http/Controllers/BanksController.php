<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BankRequest;
use App\Bank;
use App\Permissions;
use App\User;


class BanksController extends Controller
{
    public function index(){
        $bank = Bank::orderBy('status','ASC')->get();


        $id= \Auth::user()->id;
        $users = User::find($id);
        $profile = $users->profile_id;
        $perm = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',279)->where('view','=',1)->count();
        $perm_btn = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',279)->select('add','update','delete')->get();
        if($perm==0) {
            return redirect()->route('admin.template.main');
        } else{
            return view('admin.banks.index')->with('bank', $bank)->with('perm_btn',$perm_btn);
        }
    }
    public function store(BankRequest $request){
        $bank = new Bank($request->all());
        $bank->save();
        return redirect()->route('admin.banks.index')->with('msjtrue',"Banco ".$bank->nameBank." creado exitosamente!");
    }
    public function destroy($id, Request $request){
        $bank = Bank::find($id);
        $bank->delete();

        $mensaje ="Banco eliminado exitosamente!";

        if($request->ajax()){
            return $mensaje;
        }
        return redirect()->route('admin.banks.index');
    }

    public function update(Request $request, $id){

        $bank = Bank::find($id);
        if ($request->value != null) {
            $field = $request->name;
            $bank->$field = $request->value;
        } else {
            abort(501);
        }
        $bank->save();
        return $bank->$field;
    }
    public function update2(Request $request, $id){
        $bank = Bank::find($id);

        if($bank->status=="activo"){
            $bank->status="inactivo";
        }else if ($bank->status=="inactivo"){
            $bank->status="activo";
        }

        $bank->save();

        if($request->ajax()){
            return response()->json([
                'id' => $bank->id,
                'statusBank' => $bank->status
            ]);
        }
        return redirect()->route('admin.banks.index');
    }

}
