<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    protected $fillable = [
        'family_id' ,'name', 'date_of_birth',
    ];

    public function family(){
        return $this->belongsTo(Family::class, 'id');
    }
}
