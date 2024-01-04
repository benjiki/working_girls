<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

use Closure;

class CustomAuthenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->user_type === 3) {
            return $next($request);
        }

        return redirect()->route('login');
    }
}
