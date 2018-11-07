<?php

namespace app\Controllers;

use lib\Auth;
use lib\DB;
use lib\Input;
use lib\View;

class AuthController {

    public function showLoginForm() {
        if (Auth::check()) header('location:dashboard');

        View::load('auth.login');
    }

    public function login() {
        if (Auth::check()) header('location:dashboard');

        Auth::login(Input::post('username'), Input::post('password'));
    }

    public function logout() {
        Auth::logout();
    }

    public function register() {
        if (Auth::check()) header('location:dashboard');

        $name = Input::post('name');
        $email = Input::post('email');
        $username = Input::post('username');
        $password = password_hash(Input::post('password'), PASSWORD_DEFAULT);
        $role = "USER";

        DB::query("insert into  users (username, email, name, password, role) values ('$username', '$email', '$name', '$password', '$role')");

        return header('location:login');
    }

}