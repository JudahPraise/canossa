<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $fillable = ['nurse', 'diagnosis'];

    protected $casts = [
        'problems' => 'array',
        'medications' => 'array'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
