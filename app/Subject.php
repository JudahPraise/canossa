<?php

namespace App;

use App\User;
use App\Course;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'code', 'units', 'description', 'year', 'semester', 'teacher_id'
    ];

    public function course(){

        return $this->belongsTo(Course::class);

    }

    public function teacher(){

        return $this->belongsTo(User::class);

    }
}
