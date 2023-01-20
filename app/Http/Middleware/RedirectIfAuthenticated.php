<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, ...$guards)
    {


        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (in_array($guard, ['admin', 'candidate', 'company', 'recruiter'])) {
                    return redirect($guard);
                }
            }
        }
        return $next($request);
    }
}
