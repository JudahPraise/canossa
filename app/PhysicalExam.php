<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicalExam extends Model
{
    protected $fillable = ['employee_id','school_year','height','weight','bmi','bp','rr','hr'];
}
