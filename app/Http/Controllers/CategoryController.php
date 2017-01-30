<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Category;
use App\Classification;
use App\Permissions;
use App\User;
class CategoryController extends Controller
{
    public function  index(){
        $category = Category::orderBy('nameCategory', 'ASC')->get();
        $classification = Classification::orderBy('nameClassification','ASC')->lists('nameClassification','id');//contenido - value

         $category->each(function($category){
              $category->classification;
          });


        $id= \Auth::user()->id;
        $users = User::find($id);
        $profile = $users->profile_id;
        $perm = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',285)->where('view','=',1)->count();
        $perm_btn = Permissions::where('profiles_id','=',$profile)->where('sections_id','=',285)->select('add','update','delete')->get();
        if($perm==0) {
            return redirect()->route('admin.template.main');
        } else{
            return view('admin.categories.index')
                ->with('category',$category)
                ->with('classification',$classification)
                ->with('perm_btn',$perm_btn);
        }
    }
    public function destroy($id, Request $request){
        $category = Category::find($id);
        $category->delete();

        $mensaje="Categoria eliminada exitosamente!";

        if($request->ajax()){
            return $mensaje;
        }
        return redirect()->route('admin.categories.index');
    }
    public function update(Request $request, $id){
        $category = Category::find($id);
        if ($request->value!=null){
            $field = $request->name;
            $category->$field = $request->value;
        }else{
            abort(501);
        }
        $category->save();
        return $category->$field;
    }
    public function store(CategoryRequest $request){
        $category = new Category($request->all());
        $category->save();
        return redirect()->route('admin.categories.index')->with('msjtrue',"Categoria ".$category->nameCategory." creada exitosamente!");
    }
}
