<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday_day extends Model
{

    protected $table="holidays_days";
    protected $fillable=['date','description','status'];
}
