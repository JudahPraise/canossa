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

        switch ($guard) {
            
            case 'admin':
          
                if(Auth::guard($guard)->check()){
                    return redirect()->route('admin')->with('message', "You are now logged in");
                }

                break;

            case 'student':

                if(Auth::guard($guard)->check()){
                    return redirect()->route('student')->with('message', "You are now logged in");
                }

                break;
            
            default:
               
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('schedule.index');
                }

                break;
        }

        return $next($request);
    }
}
