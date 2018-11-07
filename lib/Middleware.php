<?php

namespace lib;

use Closure;

interface Middleware {

    public function peel($object, Closure $next);

}