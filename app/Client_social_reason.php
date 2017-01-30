<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_social_reason extends Model
{
    protected $table="client_social_reasons";
    protected $fillable=['nameReason','rfc','street','numberI','numberE','colony','cp','city','state','webSite','label1','label2','main'];

        public static function reasons($id){
            return  Client_social_reason::where('client_id','=',$id)->get();
        }
        public static function reasonsSingle($id){
            return  Client_social_reason::where('id','=',$id)->get();
        }
}
