<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Job extends Model
{

    protected $table="job";
    protected $fillable=['nameJob'];
    public function employee()
    {
        return $this->hasMany('App\Employee');
    }
}
