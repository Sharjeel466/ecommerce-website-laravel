<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CartAuth
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

        }
        else{
            return redirect('/')->with('msg', 'Login to See Your Cart !!!');
        }
        return $next($request);
    }
}
