<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // We check two conditions:
        // 1. The request explicitly expects JSON (best practice).
        // 2. OR the current route belongs to the 'api' middleware group.
        if ($request->expectsJson() || $this->isApiRoute($request)) {
            return null; // Returning null lets the exception handler format the JSON response.
        }

        return route('login');
    }

    /**
     * Check if the current route is an API route.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function isApiRoute(Request $request): bool
    {
        // $request->route() can be null if the request doesn't match any route.
        if ($route = $request->route()) {
            // Check if the 'api' middleware group is applied to the route.
            return in_array('api', $route->middleware());
        }

        return false;
    }
}
