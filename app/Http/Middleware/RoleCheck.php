<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Check if user has any of the specified roles
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }

        // If user doesn't have the required role, return a custom 403 view
        return response()->assertForbidden();
    }
}
