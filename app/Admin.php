<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = "admins";
    protected $dates = ['last_activity', 'last_login'];
    protected $hidden = ['password', 'remember_token'];
    protected $fillable = ['name', 'display_name', 'phone', 'email', 'password', 'picture'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}