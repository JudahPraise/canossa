<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    protected $fillable = ['record_id', 'illnesses','isOther'];
    
    public function record()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}
