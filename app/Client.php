<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table="clients";
    protected $fillable=['name','numberClient','raiting','comments','status','logoDefault','logoClient','nameContact','jobContact',
        'phoneContact','cellContact','email','nameReason','rfc','street','numberE','numberI','colony','cp','city','state',
        'webSite','label1','label2'];

public function project()
    {
        return $this->hasMany('App\Project');
    }

    public function reasons()
    {
        return $this->hasMany('App\Client_social_reasons');
    }
}
