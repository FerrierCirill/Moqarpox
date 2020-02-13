<?php

namespace App\Http\Middleware;

use Closure;

class AuthIsProvider
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
        if (!\Auth::check() || \Auth::user()->state != \App\User::PROVIDER) {
            return back();
        }
        return $next($request);
    }
}
