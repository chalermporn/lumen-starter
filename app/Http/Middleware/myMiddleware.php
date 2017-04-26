<?php

namespace App\Http\Middleware;

use Closure;

class MyMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!checkAuthKey($request->header('auth-key'))) {
            return 'not authorized';
        }
        return $next($request);
    }
}
