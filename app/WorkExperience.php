<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $fillable = [
        'duration', 'work_description', 'work_place',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
