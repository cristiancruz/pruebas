<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table="profiles";
    protected $fillable=['nameProfile'];

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function permissions(){
        return $this->belongsTo('App\Permissions');
    }
}
