<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function labtests()
    {
        return $this->hasMany(LabTest::class, 'record_id');
    }

    // public function currentRecord()
    // {
    //     return $this->where('year_from','=',Carbon::now()->format('Y'));
    // }

    // public function school_year()
    // {
    //     return $this->year_from.' '.'-'.' '.$this->year_to;
    // }

    public function medications()
    {
        return $this->hasMany(EmployeeMedication::class, 'record_id');
    }

    public function hospitalizations()
    {
        return $this->hasMany(Hospitalization::class, 'record_id');  
    }

    public function immunizations()
    {
        return $this->hasMany(Immunization::class, 'record_id');
    }
}
