<?php


Route::get('/', function () {
    return view('welcome');
});

Route::prefix(Config::get("admin"))->group(function() {
    Route::get('/', 'Admin\PagesController@index')->name("dashboard");

    /* Login */
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm');
    Route::post('login', 'Admin\Auth\LoginController@login');
    Route::post('logout', 'Admin\Auth\LoginController@logout');

    /* Rest Passwords */
    Route::get('reset/send', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('reset/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('reset/change/{token}', 'Admin\Auth\ResetPasswordController@showResetForm');
    Route::post('reset/change', 'Admin\Auth\ResetPasswordController@reset');

    /* Admins */
    Route::resource("admins", 'Admin\AdminsController');
    Route::post('admins/deleteAll', 'Admin\AdminsController@deleteAll');
    Route::match(['GET', 'POST'], 'admins/{admin}/picture', 'Admin\AdminsController@picture');

    /* Roles */
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles/deleteAll', 'Admin\RolesController@deleteAll');

    /* Permissions */
    Route::resource('permissions', 'Admin\PermissionsController');

    /* Publishers */
    Route::resource('publishers', 'Admin\PublishersController');
    Route::post('publishers/deleteAll', 'Admin\PublishersController@deleteAll');

    /* People Types */
    Route::resource('people/types', 'Admin\PeopleTypesController');
    Route::post('people/types/deleteAll', 'Admin\PeopleTypesController@deleteAll');
});
