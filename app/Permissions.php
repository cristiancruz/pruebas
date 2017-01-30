<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table="permissions";
    protected $fillable=['profiles_id','sections_id','view','add','update','delete'];


    public function profile()
    {
        return $this->hasMany('App\Profile');
    }
}
