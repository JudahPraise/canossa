<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject;

class Course extends Model
{
    protected $fillable = [
        'acronym', 'course_title', 'description'
    ];

    public function subjects(){

        return $this->hasMany(Subject::class);

    }
    public function teachers(){

        return $this->hasMany(User::class);

    }
}
