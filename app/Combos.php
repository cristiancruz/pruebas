<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Project;

class Combos extends Model
{
    public static function developments($id){

        $idDevelopments = Project::where('company_social_reason_id','=',$id)->select('development_id')->get();
        
        return
    }
}
