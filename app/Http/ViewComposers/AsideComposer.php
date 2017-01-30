<?php

namespace App\Http\ViewComposers;
use Illuminate\Contracts\View\View;
use App\Section;
use App\User;
use DB;


class AsideComposer
{
    public function compose(View $view){
        $id= \Auth::user()->id;
        $users = User::find($id);
        $profile = $users->profile_id;

        $secciones = Section::lists('section','id');
        $padres =   DB::table('sections')
            ->join('permissions','sections.id','=','permissions.sections_id')
            ->where(['profiles_id'=>$profile,'view'=>1])
            ->distinct()->select('padre')->get();

        $permisos =   DB::table('sections')
            ->join('permissions','sections.id','=','permissions.sections_id')
            ->where(['profiles_id'=>$profile,'view'=>1])
            ->distinct()->orderBy('order','ASC')->get();

     
        $view->with('secciones',$secciones)
             ->with('padres',$padres)
             ->with('permisos',$permisos);
    }
}