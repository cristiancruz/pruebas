<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_social_reason extends Model
{
    protected $table="company_social_reason";
    protected $fillable=['companyReason','rfc','phone','street','numberI','numberE','colony','cp','city','state','website','logoDefault','logoEnterprice','status','label1','label2','user_id'];
}
