<?php

namespace app\Middlewares;

use Closure;
use lib\Auth;
use lib\Middleware;

class AdminMiddleware implements Middleware {

    public function peel($object, Closure $next)
    {
        if (Auth::user()->role == 'ADMIN') {
            return $next($object);
        }

        return header('location:home');
    }

}