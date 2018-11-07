<?php

namespace lib;

class Auth {

    public static function login($username, $password) {
        $user = DB::query("select * from users where username='$username'");
        if (password_verify($password, $user[0]->password))
            $_SESSION['userId'] = $user[0]->id;
        else
            Session::flash('error', 'Username / Password Incorrect!');

        return header('location:dashboard');
    }

    public static function logout() {
        session_destroy();

        return header('location:login');
    }

    public static function user() {
        $id = $_SESSION['userId'];
        $user = DB::query("select * from users where id=$id");

        return $user[0];
    }

    public static function check() {
        return isset($_SESSION['userId']);
    }

}