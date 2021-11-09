<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    protected $fillable = ['record_id','type','file','extension'];

    public function record()
    {
        return $this->belongsTo(MedicalRecord::class, 'record_id');
    }
}
