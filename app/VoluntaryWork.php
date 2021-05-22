<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoluntaryWork extends Model
{
    protected $fillable = [
        'name_address', 'date_from', 'date_to', 'no_hours', 'position',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
