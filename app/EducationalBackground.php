<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    protected $fillable = ['name', 'elementary', 'secondary', 'college', 'graduate_study'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function elem(){
        return $this->hasOne(Elementary::class, 'educ_id');
    }

    public function sec(){
        return $this->hasOne(Secondary::class, 'educ_id');
    }

    public function col(){
        return $this->hasOne(College::class, 'educ_id');
    }

    public function grad(){
        return $this->hasOne(GraduateStudy::class, 'educ_id');
    }
}
