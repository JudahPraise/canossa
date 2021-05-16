<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ['date_from','date_to','time_from','time_to','affected_employees','announcement_title','announcement_description','link', 'attachment'];

}
