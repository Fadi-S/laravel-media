<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	protected $guarded = [];

	public function roles()
    {
    	return $this->belongsToMany('App\Role' , 'permission_role');
    }

    public function hasRole($roleId)
    {
    	return $this->roles()->where('role_id' , $roleId)->exists();
    }
    
    public static function groups()
    {
    	return DB::table('permissions')->distinct()->get(['group']);
    }

    public static function permissionsByGroup($group)
    {
    	return static::where('group' , $group)->orderBy('id' , 'asc')->get();
    }

    public static function permissionsArray()
    {
    	$permissions = [

    			////////////////////////////////////////////////////////////////////////////////////
				// Roles
				////////////////////////////////////////////////////////////////////////////////////

	    		[
	    			'group'  => 'الادوار',
	    			'name'   => 'add_role',
		    		'label'  => 'اضافة دور',
	    		],
	    		[
	    			'group'  => 'الادوار',
	    			'name'   => 'edit_role',
		    		'label'  => 'تعديل دور',
	    		],
	    		[
	    			'group'  => 'الادوار',
	    			'name'   => 'delete_role',
		    		'label'  => 'حذف دور',
	    		],
	    		[
	    			'group'  => 'الادوار',
	    			'name'   => 'view_role',
		    		'label'  => 'عرض الادوار',
                ],

	    		////////////////////////////////////////////////////////////////////////////////////////
				// Admins
				////////////////////////////////////////////////////////////////////////////////////////

	    		[
	    			'group'  => 'المديرين',
	    			'name'   => 'add_admin',
		    		'label'  => 'اضافة مدير',
	    		],
	    		[
	    			'group'  => 'المديرين',
	    			'name'   => 'edit_admin',
		    		'label'  => 'تعديل مدير',
	    		],
	    		[
	    			'group'  => 'المديرين',
	    			'name'   => 'delete_admin',
		    		'label'  => 'حذف مدير',
	    		],
	    		[
	    			'group'  => 'المديرين',
	    			'name'   => 'view_admin',
		    		'label'  => 'عرض المديرين',
                ],

    	];

    	return $permissions;
    }


}
