<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['sender','sender_image','send_to','send_to_all','subject','message','attachment'];
}
