<?php

namespace lib;

class BaseController {

    private $_middleware;

    public function middleware($middleware) {
        $this->_middleware = new MiddlewareHandler();

        $middleware = explode(',', $middleware);

        $middleware_list  = array();
        foreach ($middleware as $mid) {
            $name = 'app\Middlewares\\'.$mid;
            $middleware_list[] = new $name();
        }

        $this->_middleware->layer($middleware_list)->peel(null, function () {});
    }

}