<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class LabtestSchedule extends Model
{
    protected $fillable = ['laboratory_name','date_from','date_to'];

    public function date_from()
    {
        return Carbon::parse($this->date_from)->toFormattedDateString();;
    }

    public function date_to()
    {
        return Carbon::parse($this->date_to)->toFormattedDateString();;
    }
}
