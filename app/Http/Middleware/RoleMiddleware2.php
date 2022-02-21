<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Models\Role;

class RoleMiddleware2
{
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            throw UnauthorizedException::notLoggedIn();
        }
        if (Auth::user()->hasAnyRole('Admin')) {
            return $next($request);
        }

        $roles2 = Role::where('name', 'User')->first();
        if (Auth::user()->hasAnyRole($roles2)) {
            return abort(403);
        }
        else{
            throw UnauthorizedException::forRoles($roles2);
        }
    }
}
