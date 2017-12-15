<?php

namespace App;

use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = "admins";
    protected $dates = ['last_activity', 'last_login'];
    protected $hidden = ['password', 'remember_token'];
    protected $fillable = ['name', 'role_id', 'display_name', 'phone', 'email', 'password', 'picture'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
