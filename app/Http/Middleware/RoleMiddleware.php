<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (session('role') !== $role) {
            abort(403, 'Akses ditolak.');
        }
        return $next($request);
    }
}

