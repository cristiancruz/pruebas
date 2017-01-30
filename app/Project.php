<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table="projects";
    protected $fillable=['nameProject',
    'location',
    'client_id',
    'client_social_reason_id',
    'company_social_reason_id',
    'dateStart',
    'dateEnd',
    'alias',
    'commentJobs',
    'street',
    'numberE',
    'numberI',
    'nameContact',
    'phone',
    'email',
    'manager',
    'coordinator',
    'resident',
    'estimation',
    'estimationDay',
    'invoice',
    'invoiceDay',
    'pay',
    'payDay',
    'label1',
    'label2',
    'user_id',
    'developments_id',
    'status'
    ];

    public function client(){
    return $this->belongsTo('App\Client');
    }
}
