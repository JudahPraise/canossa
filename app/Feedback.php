<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['user_id', 'feedback', 'suggestion',];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
