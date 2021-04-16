<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'id', 'file', 'extension'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
