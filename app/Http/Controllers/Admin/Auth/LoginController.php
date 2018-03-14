<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use \Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function username()
    {
        return 'login';
    }

    protected function attemptLogin(Request $request)
    {
        if (is_numeric($request->input($this->username())))
            $field = 'phone';
        else if (filter_var($request->input($this->username()), FILTER_VALIDATE_EMAIL))
            $field = 'email';
        else
            $field = "slug";

        $admin = \App\Admin::where($field, $request->input("login"));
        if($admin->exists()) {
            if (!$admin->first()->active)
                return false;
        }
        $request->merge([$field => $request->input('login')]);
        return $this->guard()->attempt(
            $request->only($field, 'password'), $request->filled('remember')
        );
    }

    protected function authenticated(Request $request, $user)
    {
        $user->last_login = Carbon::now();
        $user->save();
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect(\Config::get("admin").'/login');
    }

    protected function guard()
    {
        return Auth::guard("admin");
    }

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->redirectTo = \Config::get("admin");
        $this->middleware('admin_guest')->except('logout');
    }
}
