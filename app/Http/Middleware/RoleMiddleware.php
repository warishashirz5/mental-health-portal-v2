<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): mixed
    {
        $user = session('auth_user');

        if (!$user || $user['role'] !== $role) {
            return redirect()->route('login')->with('error', 'Access denied. Please login.');
        }

        return $next($request);
    }
}