<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipalities extends Model
{
    protected $table="municipalities";
    protected $fillable=['name','state_id'];

    public function state(){
        return $this->belongsTo('App\state');
    }
    public static function municipalities($id){
       return  Municipalities::where('state_id','=',$id)->get();
    }
}
