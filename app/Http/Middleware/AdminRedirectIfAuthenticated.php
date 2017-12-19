<?php

namespace App\Http\Middleware;

use Closure;

class AdminRedirectIfAuthenticated
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
        if (\Auth::guard("admin")->check()) {
            if(\Auth::guard("admin")->user()->active)
                return redirect(\Config::get("admin"));
            else
                \Auth::guard("admin")->logout();
        }
        return $next($request);
    }
}
