<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    protected $table="sections";
    protected $fillable=['reference','section','description','url','order','haveAdd','haveUpdate','haveDelete','company_social_reason_id','documentInstruction','proccesses_id'];

    public function procces(){
        return $this->belongsToMany('App\Procces');
    }

    
}
