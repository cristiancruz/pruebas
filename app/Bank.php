<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Bank extends Model
{

    protected $table="banks";
    protected $fillable=['bank'];

    public function user()
    {
        return $this->hasMany('App\User');
    }
    public function employee()
    {
        return $this->hasMany('App\Employee');
    }
}
