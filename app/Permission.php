<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name'];
    protected $table = "permissions";

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role', 'perm_id', 'role_id');
    }
}
