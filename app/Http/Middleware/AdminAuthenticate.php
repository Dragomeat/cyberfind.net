<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param string|null $guard
     * @return mixed
     * @throws AuthorizationException
     */
    public function handle(Request $request, Closure $next, string $guard = null)
    {
        if (!Auth::guard($guard)->user()->isAdmin()) {
            throw new AuthorizationException('You are not authorized to view this page.');
        }

        return $next($request);
    }
}
