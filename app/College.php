<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $fillable = ['educ_id','name_of_school','level','course_degree','level_units_earned','graduated_date_from','graduated_date_to','academic_reward',];

    public function educationalBackground(){
        return $this->belongsTo(EducationalBackground::class);
    }
}
