<?php

namespace app\Middlewares;

use Closure;
use lib\Auth;
use lib\Middleware;

class AuthMiddleware implements Middleware {

    public function peel($object, Closure $next)
    {
        if (Auth::check()) {
            return $next($object);
        }

        return header('location: login');
    }

}