<?php

namespace App;

use App\Day;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['day_id', 'title', 'description', 'time_from', 'time_to'];

    public function day(){
        return $this->belongsTo(Day::class);
    }
}
