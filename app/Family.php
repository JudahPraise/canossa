<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = ['family_name', 'isFilled'];

    public function user(){
        return $this->belongsTo(User::class, 'id');
    }

    public function spouse(){
        return $this->hasOne(Spouse::class, 'family_id');
    }
    
    public function children(){
        return $this->hasMany(Children::class, 'family_id');
    }

    public function father(){
        return $this->hasOne(Father::class, 'family_id');
    }

    public function mother(){
        return $this->hasOne(Mother::class, 'family_id');
    }
}
