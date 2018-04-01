<?php

namespace App\Http\Middleware;

use Closure;

class AdminRequired
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
        if (auth()->check() === false || auth()->user()->isAdmin() === false) {
            return redirect()->route('home.index');
        }

        return $next($request);
    }
}
