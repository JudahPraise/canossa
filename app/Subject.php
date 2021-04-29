<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'code', 'units', 'description', 'year', 'semester'
    ];

    public function course(){

        return $this->belongsTo(Course::class);

    }
}
