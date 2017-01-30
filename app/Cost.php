<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $table="costs";
    protected $fillable=['nameCosts'];

    public function family()
    {
        return $this->hasMany('App\Family');
    }
}
