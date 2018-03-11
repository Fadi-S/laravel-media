<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function adminLog()
    {
        return $this->morphMany('App\AdminLog' , 'logable');
    }
}
