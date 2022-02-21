<?php

namespace App;

use App\User;
use App\Admin;
use Illuminate\Database\Eloquent\Model;

class PasswordRequest extends Model
{
    protected $fillable = ['employee_id', 'admin_id', 'dob', 'category', 'status', 'name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

}
