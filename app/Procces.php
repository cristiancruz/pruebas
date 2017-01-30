<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procces extends Model
{


    protected $table="proccesses";
    protected $fillable=['nameProccess'];

    public function section(){
        return $this->belongsToMany('App\Section');
    }
}
