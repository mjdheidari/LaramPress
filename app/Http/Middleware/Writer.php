<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Writer
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
        if (Auth::user()->level=='writer' || Auth::user()->level=='admin' || Auth::user()->level=='manager'){
            return $next($request);
        }else{
            abort(404);
        }
    }
}
