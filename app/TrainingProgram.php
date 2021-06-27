<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    protected $fillable = [
        'training_date', 'training_title', 'training_sponsor', 'training_certificate',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
