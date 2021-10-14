<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // debug(Auth::user()->role->name);die();
        if (Auth::user()->role->name == 'customer') {
            return redirect('/');
        }
        return $next($request);
    }
}
