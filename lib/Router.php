<?php

namespace lib;

use app\Controllers\RunQuizController;
use app\Quiz;
use lib\Route;

class Router {

    private static $routes;

    public static function get($uri, $action) {
        self::$routes[] = new Route('GET', $uri, $action);
    }

    public static function post($uri, $action) {
        self::$routes[] = new Route('POST', $uri, $action);
    }

    public static function exec() {
        $uri = isset($_GET['uri']) ? '/'.$_GET['uri'] : '/';
        $notfound = true;

        foreach (self::$routes as $key => $route) {
            if ($uri == $route->getUri() && $_SERVER['REQUEST_METHOD'] == $route->getMethod() ) {
                if (is_string($route->getAction())) {
                    $action = explode('@', $route->getAction());
                    $controller = 'app\Controllers\\'.$action[0];
                    $controller = new $controller();
                    $func = $action[1];
                    $controller->$func();
                } else {
                    call_user_func($route->getAction());
                }

                $notfound = false;
            }
        }

        if ($notfound) {
            $uri = Input::get('uri');
            $quiz = Quiz::where('url', "'$uri'");

            if (!empty($quiz)) {
                $quiz = $quiz[0];
                $controller = new RunQuizController();
                $controller->run($quiz->id);
            } else {
                echo "404 Not Found";
            }
        }
    }
}