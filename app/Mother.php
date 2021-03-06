<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mother extends Model
{
    protected $fillable = [
        'family_id','surname', 'firstname', 'middlename', 'occupation',
        'employer_business_name', 'business_address', 'tel_no', 
    ];

    public function motherFullname(){
        return $this->firstname . ' '. $this->middlename .' '. $this->surname;
    }

    public function family(){

        return $this->belongsTo(Family::class, 'id');
        
    }
}
