<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
		if (Auth::guard($guard)->check()) {
	
			if($request->is('admin') || $request->is('admin/*')){
				
				if($guard == "admin"){
					
					return redirect('/admin/dashboard');
				}
			}else{
				
				if($guard == "web"){
					
					return redirect(RouteServiceProvider::HOME);
				}
			}
		}

        return $next($request);
    }
}
