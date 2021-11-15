<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalHistory extends Model
{
    protected $fillable = ['user_id', 'illnesses'];

    protected $casts = [
        'illnesses' => 'array',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
