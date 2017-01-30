<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";
    protected $fillable=['nameCategory','classification_id'];

    public function classification(){
        return $this->belongsTo('App\Classification');
    }
}
