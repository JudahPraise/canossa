<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospitalization extends Model
{
    protected $fillable = ['record_id','disease','d_date','operation','o_date'];

    public function record()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}
