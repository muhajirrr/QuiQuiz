<?php

namespace lib;

class Input {

    public static function get($key) {
        return isset($_GET[$key]) ? htmlspecialchars($_GET[$key]) : null;
    }

    public static function post($key) {
        return isset($_POST[$key]) ? htmlspecialchars($_POST[$key]) : null;
    }

}