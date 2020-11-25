<?php

namespace App\Http\Middleware;

use App\View\Components\Layouts\Auth;
use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && ! auth()->user()->isAdmin()) {
            throw new AuthorizationException();
        }

        return $next($request);
    }
}
