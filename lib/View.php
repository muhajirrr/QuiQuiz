<?php

namespace lib;

use lib\BladeOne;

class View {

    private static $blade;

    public static function init() {
        $views = __DIR__.'/../resources/views';
        $cache = __DIR__.'/../storage/cache';
        self::$blade = new BladeOne($views, $cache);
        self::$blade->baseUrl = APP_URL.'/resources/assets/';
    }

    public static function load($view, $data = []) {
        if (!isset(self::$blade)) {
            self::init();
        }

        echo self::$blade->run($view, $data);
    }
}