<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProfileRequest;
use App\Profile;

class ProfileController extends Controller
{
    public function store(ProfileRequest $request){
        $profile = new Profile($request->all());
        $profile->save();
        return redirect()->route('admin.users.index')->with('msjtrue',"Perfil ".$profile->nameProfile." creado exitosamente!");
    }
    public function update(Request $request, $id){

        $profile = Profile::find($id);
        if ($request->value != null) {
            $field = $request->name;
            $profile->$field = $request->value;
        } else {
            abort(501);
        }
        $profile->save();
        return $profile->$field;
    }
    public function destroy($id, Request $request){
        $profile = Profile::find($id);
        $profile->delete();

        $mensaje ="Perfil eliminado exitosamente!";

        if($request->ajax()){
            return $mensaje;
        }
        return redirect()->route('admin.users.index');

    }
}
