<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\User2Request;
use App\User;
use App\Bank;
use App\Profile;
use App\Section;
use App\Permissions;
class UserController extends Controller
{
    public function index(){
        $user = User::orderBy('username','ASC')->get();
        //dd($user);
        $bank = Bank::orderBy('bank','ASC')->where('status', '=', 'activo')->lists('bank','id');//llenado selec banco
        // TAB PROFILE
        $profile = Profile::orderBy('nameProfile','ASC')->lists('nameProfile','id');//llenado select perfil
        $profile_complete = Profile::get();//llenado tabla perfiles
        $padre =Section::whereRaw('id = reference')->orderBy('order','ASC')->get();
        $hijos = Section::whereRaw('id!=reference')->orderBy('order','ASC')->get();
        // FIN TAB PROFILE
        $user->each(function($user){
            $user->profile;
            $user->bank;

        });

        $id= \Auth::user()->id;
        $users = User::find($id);
        $profiles = $users->profile_id;
        $perm = Permissions::where('profiles_id','=',$profiles)->where('sections_id','=',12)->where('view','=',1)->count();
        $perm_btn = Permissions::where('profiles_id','=',$profiles)->where('sections_id','=',12)->select('add','update','delete')->get();
          if($perm==0) {
            return redirect()->route('admin.template.main');
        } else{
            return view('admin.users.index',compact('user','bank','profile','profile_complete','padre','hijos','perm_btn'));
        }
    }
    public function store(UserRequest $request){

        if($request->ajax()){
            $user = new User($request->all());
            $user->password =bcrypt($request->password);
            $user->user_id= \Auth::user()->id;
            $user->save();
        }
        return response()->json(["success" =>  true, "data" => $request->all()]);

    }
    public function destroy($id, Request $request){
        $user = User::find($id);
        $user->delete();

        $mensaje ="Usuario eliminado exitosamente!";

        if($request->ajax()){
            return $mensaje;
        }
        return redirect()->route('admin.users.index');
    }
    public function update2(Request $request, $id){
        $user = User::find($id);

        if($user->status=="activo"){
            $user->status="inactivo";
        }else if ($user->status=="inactivo"){
            $user->status="activo";
        }
        $user->save();

        if($request->ajax()){
            return response()->json([
                'id' => $user->id,
                'statusUser' => $user->status
            ]);
        }

        return redirect()->route('admin.users.index');
    }
    public function edit($id){
        $user = User::find($id);
        return response()->json($user);
    }
    public function update(User2Request $request, $id){

        if($request->ajax()){
            $user = User::find($id);
            $user->fill($request->all());
            $user->save();

            $user_info = User::find($id);

            $profile = Profile::where('id', '=', $request->profile_id)->lists('nameProfile');
            
        }

        return response()->json(["success" =>  true, "data" => $request->all(), "info"=>$user_info,'perfil'=>$profile]);
    }
}
