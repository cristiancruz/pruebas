<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ClassificationRequest;
use App\Classification;

class ClassificationController extends Controller
{
    public function index() {
        $classification = Classification::orderBy('nameClassification', 'ASC')->get();
        return view('admin.classification.index')->with('classification',$classification);
    }
    public function destroy($id, Request $request){
        $classification = Classification::find($id);
        $classification->delete();

         $mensaje ="Clasificación eliminada exitosamente!";

        if($request->ajax()){
            return $mensaje;
        }
    return redirect()->route('admin.classification.index');
    }

    public function update(Request $request, $id){

        $classification = Classification::find($id);
        if ($request->value != null) {
            $field = $request->name;
            $classification->$field = $request->value;
        } else {
            abort(501);
        }
        $classification->save();
        return $classification->$classification;
    }


      public function store(ClassificationRequest $request){
          $classification = new Classification($request->all());
          $classification->save();
        return redirect()->route('admin.classification.index')->with('msjtrue',"Clasificación ".$classification->nameClassification." creado exitosamente!");
    }


}
