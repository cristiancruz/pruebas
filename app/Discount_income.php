<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount_income extends Model
{
    protected  $table="discounts_income";
    protected  $fillable=['key','description','type'];
}
