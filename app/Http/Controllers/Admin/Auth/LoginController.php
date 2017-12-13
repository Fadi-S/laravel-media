<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Traits\AuthenticatesAdmins;

class LoginController extends Controller
{
    use AuthenticatesAdmins;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('admin_guest')->except('logout');
    }
}
