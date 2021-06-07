<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoluntaryWork extends Model
{
    protected $fillable = [
        'name_address', 'duration', 'no_hours', 'position',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
