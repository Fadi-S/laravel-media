<?php


Route::get('/', function () {
    //Mail::send("welcome", [], function($message) { $message->to('fadisarwat@yahoo.com')->subject("Test"); });
    return view('welcome');
});

Route::prefix('admin')->group(function() {
    Route::get('/', 'Admin\AdminsController@index')->name("dashboard");

    /* Login */
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm');
    Route::post('login', 'Admin\Auth\LoginController@login');
    Route::post('logout', 'Admin\Auth\LoginController@logout');

    /* Rest Passwords */
    Route::get('reset/send', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('reset/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('reset/change/{token}', 'Admin\Auth\ResetPasswordController@showResetForm');
    Route::post('reset/change', 'Admin\Auth\ResetPasswordController@reset');
});