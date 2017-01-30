<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="users";
    protected $fillable = [
        'username','name', 'email', 'password','bankAccount','status','profile_id','bank_id','employee_id','user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){
        return $this->belongsTo('App\Profile');
    }
    public function bank(){
        return $this->belongsTo('App\Bank');
    }
}
