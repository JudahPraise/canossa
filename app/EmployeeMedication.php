<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeMedication extends Model
{
    protected $casts = [
        'medicine' => 'array',
    ];

    protected $fillable = ['record_id','name','condition','strength','frequency'];

    public function record()
    {
        return $this->belongsTo(MedicalRecord::class);
    }

    public function mg(){
        return $this->strength.' '.'mg';
    }
}
