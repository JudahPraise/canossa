<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    protected $fillable = [
        'first_name', 'middle_name', 'surname', 'date_of_birth',
        'sex', 'citizenship', 'civil_status', 'height', 'weight', 
        'blood_type', 'address', 'zip_code', 'tel_number', 'cell_number', 
        'email_address', 'prc', 'gsis', 'sss', 'pag_ibig', 'driver_license', 'phil_health'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
