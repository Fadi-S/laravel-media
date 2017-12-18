<?php

namespace App\Providers;

use App\Permission;
use App\Role;
use Illuminate\Support\ServiceProvider;

class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->AdminTitleComposer();
        $this->AdminsFormComposer();
        $this->RolesFormComposer();
    }

    public function AdminTitleComposer()
    {
        view()->composer('admin.layout', function ($view) {
            $title = \Route::current()->parameter("title");
            if(is_null($title)) $title = "Stgtube Backend";
            $view->with([
                'title' => $title,
            ]);
        });
    }

    public function AdminsFormComposer()
    {
        view()->composer('admin.admins.form', function ($view) {
            $view->with([
                'roles' => array_merge(['0'=>"-"], Role::pluck("name", "id")->toArray()),
            ]);
        });
    }

    public function RolesFormComposer()
    {
        view()->composer('admin.roles.form', function ($view) {
            $view->with([
                'permissions' => Permission::pluck('name', 'id'),
            ]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
