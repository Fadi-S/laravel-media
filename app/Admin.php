<?php

namespace App;

use App\Notifications\AdminResetPasswordNotification;
use \File;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Storage;

class Admin extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = "admins";
    protected $dates = ['last_activity', 'last_login', 'deleted_at'];
    protected $hidden = ['password', 'remember_token'];
    protected $fillable = ['slug', 'role_id', 'active', 'name', 'phone', 'email', 'password', 'picture'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function picture()
    {
        if(!Storage::exists($this->picture))
            return "Default/default-user-img.jpg";
        return Storage::url($this->picture);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function adminLog()
    {
        return $this->morphMany('App\AdminLog' , 'logable');
    }
}
