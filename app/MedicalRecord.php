<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $fillable = ['user_id','year_from','year_to'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function labtests()
    {
        return $this->hasMany(LabTest::class, 'record_id');
    }
}
