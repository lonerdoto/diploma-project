<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminRoleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role === 'dispatcher' || auth()->user()->role === 'admin')  {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
