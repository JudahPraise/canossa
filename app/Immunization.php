<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Immunization extends Model
{
    protected $fillable = ['record_id','vaccine_recieved','status','brand','date'];

    public function record()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}
