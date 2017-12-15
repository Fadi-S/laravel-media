<?php

namespace App\Providers;

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
        $this->AdminFormComposer();
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

    public function AdminFormComposer()
    {
        view()->composer('admin.admins.form', function ($view) {
            $view->with([
                'roles' => Role::pluck("name", "id"),
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
