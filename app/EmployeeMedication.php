<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeMedication extends Model
{
    protected $casts = [
        'medicine' => 'array',
    ];

    protected $fillable = ['record_id','medicine'];

    public function record()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}
