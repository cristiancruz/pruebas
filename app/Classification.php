<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    protected $table="classification";
    protected $fillable=['nameClassification'];

    public function category()
    {
        return $this->hasMany('App\Category');
    }
}
