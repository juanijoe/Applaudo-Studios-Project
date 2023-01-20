<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRecruiter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('recruiter')->user()) {
            return $next($request);
        }
        if (Auth::guard('admin')->user()) {
            return $next($request);
        }
        //return response([
        //    'message' => 'Only user Admin can request this route'
        //]);
        return redirect(route('login.recruiter'));
    }
}
