<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Models\Permission;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, $permission)
    {
        //make sure the user is logged in
        if (!Auth::check()) {
            abort(403, 'Unauthorized access.');
        }
         //make sure the user has the required permission
        // if (!Auth::user()->can($permission)) {
        //     throw UnauthorizedException::forPermissions([$permission]);
        // }

        return $next($request);
    }
}
