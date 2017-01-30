<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $table="families";
    protected $fillable=['key','nameFamily','description','type','cost_id'];

    public function cost(){
    return $this->belongsTo('App\Cost');
    }
}
