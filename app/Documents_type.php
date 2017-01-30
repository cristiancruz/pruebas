<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents_type extends Model
{
    protected $table="documents_types";
    protected $fillable=['name','type'];

}
