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

    public function dDate()
    {
        return \Carbon\Carbon::parse($this->d_date)->format('d/m/y');
    }

    public function oDate()
    {
        if(!empty($this->o_date))
        {
            return \Carbon\Carbon::parse($this->o_date)->format('d/m/y');
        }

        return "N/A";
    }
}
