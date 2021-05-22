<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = ['family_name'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function spouse(){
        return $this->hasOne(Spouse::class);
    }

    public function children(){
        return $this->hasMany(Children::class);
    }

    public function father(){
        return $this->hasOne(Father::class);
    }

    public function mother(){
        return $this->hasOne(Mother::class);
    }
}
