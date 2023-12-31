<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsNotAdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_as != 1) {
            return $next($request);
        }
    
        abort(403, 'Unauthorized');
    }
}
