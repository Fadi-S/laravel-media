<?php

namespace App\Http\Middleware;

use Closure;
use \Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::guard("admin")->check()) {
            return redirect(\Config::get("admin")."/login");
        }else if(Auth::guard("admin")->check()) {
            if(!Auth::guard("admin")->user()->active) {
                Auth::guard("admin")->logout();
                return redirect(\Config::get("admin") . "/login");
            }
        }
        return $next($request);
    }
}
