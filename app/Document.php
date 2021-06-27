<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'id', 'file', 'extension', 'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
