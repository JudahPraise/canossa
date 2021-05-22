<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Father extends Model
{
    protected $fillable = [
        'family_id','surname', 'firstname', 'middlename', 'occupation',
        'employer_business_name', 'business_address', 'tel_no', 
    ];

    public function fatherFullname(){
        return $this->firstname . ' '. $this->middlename .' '. $this->surname;
    }

    public function family(){
        return $this->belongsTo(Family::class);
    }
}
