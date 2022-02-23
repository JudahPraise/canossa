<?php

namespace App;

use App\EmployeeMedication;
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

    public function latestLabtest()
    {
       return $this->hasOne(LabTest::class, 'record_id')->latest();
    }

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

    public function history()
    {
        return $this->hasMany(MedicalHistory::class, 'record_id');
    }
}
