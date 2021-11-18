<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class AdminAuth
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
        if (Auth::user()) {
            if (Auth::user()->role->id == 1) {

            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('login')->with('msg', 'Access Denied !!!');
        }
        return $next($request);
    }
}
