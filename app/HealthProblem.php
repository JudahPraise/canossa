<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class HealthProblem extends Model
{
    protected $fillable = ['user_id', 'problem'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
