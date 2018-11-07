<?php

namespace lib;

class Session {

    public static function flash($name, $message) {
        if (!empty($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }

        $_SESSION[$name] = $message;
    }

    public static function has($name) {
        return !empty($_SESSION[$name]);
    }

    public static function get($name) {
        $message = null;
        if(!empty($_SESSION[$name])) {
            $message = $_SESSION[$name];
            unset($_SESSION[$name]);
        }

        return $message;
    }
}