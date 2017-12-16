<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     */
    protected $redirectTo;

    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.auth.reset.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function resetPassword($user, $password)
    {
        $user->password = $password;
        $user->setRememberToken(Str::random(60));
        $user->save();
        event(new PasswordReset($user));
        $this->guard()->login($user);
    }

    public function broker()
    {
        return Password::broker("admins");
    }

    protected function guard()
    {
        return Auth::guard("admin");
    }

    public function __construct()
    {
        $this->redirectTo = \Config::get("admin");
        $this->middleware('admin_guest');
    }
}
