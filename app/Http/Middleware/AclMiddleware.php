<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class AclMiddleware
{
    use AuthorizesRequests;

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function handle(Request $request, Closure $next)
    {
        $resourcesIgnore = config('acl');

        if (!in_array($request->route()->getName(), $resourcesIgnore)) {
            $this->authorize($request->route()->getName());
        }
        
        return $next($request);
    }
}
