<?php

namespace App;

use App\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];

    public static function createDefault()
    {
        $role = static::create(['name'=>'مدير']);

        $permissions = Permission::permissionsArray();

        foreach($permissions as $perm)
        {
            $perm = Permission::create(
                [
                    'group' => $perm['group'],
                    'name'  => $perm['name'],
                    'label' => $perm['label'] 
                ]);

            $role->permissions()->attach($perm->id);
        }
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission' , 'permission_role' , 'role_id' , 'permission_id');
    }

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function adminLog()
    {
        return $this->morphMany('App\AdminLog' , 'logable');
    }
}
