<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyBackground extends Model
{
    protected $fillable = [
        'user_id', 'spouse_surname', 'spouse_firstname', 'spouse_middlename', 'spouse_occupation',
        'spouse_employer_business_name', 'spouse_business_address', 'spouse_tel_no', 
        
        'father_surname', 'father_firstname', 'father_middlename', 'father_occupation',
        'father_employer_business_name', 'father_business_address', 'father_tel_no',

        'mother_surname', 'mother_firstname', 'mother_middlename', 'mother_occupation',
        'mother_employer_business_name', 'mother_business_address', 'mother_tel_no',
    ];

    public function spouseFullname(){

        return $this->spouse_firstname . ' '. $this->spouse_middlename .' '. $this->spouse_surname;
    }

    public function fatherFullname(){
        return $this->father_firstname . ' '. $this->father_middlename .' '. $this->father_surname;
    }

    public function motherFullname(){
        return $this->mother_firstname . ' '. $this->mother_middlename .' '. $this->mother_surname;
    }

    public function children()
    {
        return $this->hasMany(Children::class, 'family_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
