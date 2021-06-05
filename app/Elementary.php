<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elementary extends Model
{
    protected $fillable = ['educ_id','name_of_school','level','level_units_earned','sy_graduated','academic_reward',];

    public function educationalBackground(){
        return $this->belongsTo(EducationalBackground::class);
    }
}
