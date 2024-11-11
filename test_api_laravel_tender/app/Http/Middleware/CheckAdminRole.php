<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->role->name === 'admin') {
            return $next($request);
        }

        return response()->json(['error' => 'You do not have admin access.'], 403);
    }
}
