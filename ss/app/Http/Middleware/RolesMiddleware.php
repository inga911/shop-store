<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class RolesMiddleware
{
    public function handle(Request $request, Closure $next, string $roles)
    {
        
        $user = $request->user();
        if (!$user) {
            return redirect()->route('login');
        }
        $roles = explode('|', $roles);
        
        $userRole = User::ROLES[$user->role];

        if (!in_array($userRole, $roles)) {
            abort(401);
        }
        
        return $next($request);
    }
}
