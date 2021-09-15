<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospitalization extends Model
{
    protected $fillable = ['employee_id','disease','d_date','operation','o_date','medication'];
}
