<?php


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('backend')->group(function() {
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
});
