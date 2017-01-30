<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table="employees";
    protected $fillable=['numberEmployee',
        'job_id',
        'dateStart',
        'name',
        'lastName',
        'motherLastName',
        'imss',
        'curp',
        'rfc',
        'dailySalary',
        'dailyInfonavit',
        'localCompensation',
        'foreignCompensation',
        'nomineCard',
        'bankAccount',
        'bank_id',
        'phone',
        'cellPhone',
        'email',
        'street',
        'numberI',
        'numberE',
        'colony',
        'emergencyData',
        'birthPlace',
        'birthDate',
        'observations',
        'status',
        'mainOffice',
        'user_id'];

    public function bank(){
        return $this->belongsTo('App\Bank');
    }
    public function job(){
        return $this->belongsTo('App\Job');
    }
}
