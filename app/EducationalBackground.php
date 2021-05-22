<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    protected $fillable = ['name', 'elementary', 'secondary', 'college', 'graduate_study'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
