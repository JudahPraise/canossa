<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use App\Notifications\AdminResetPasswordNotification;

class Nurse extends Authenticatable
{
    use Notifiable;

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new AdminResetPasswordNotification($token));
    // }

    protected $guard = 'nurse';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 
    ['name', 'email', 'password', 'role','image'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
