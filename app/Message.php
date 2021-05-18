<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['send_to','send_to_all','subject','message','attachment'];
}
