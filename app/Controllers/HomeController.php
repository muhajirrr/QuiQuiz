<?php

namespace app\Controllers;

use app\Quiz;
use lib\Auth;
use lib\BaseController;
use lib\View;

class HomeController extends BaseController {

    public function __construct()
    {
        $this->middleware('AuthMiddleware');
    }

    public function index() {
        if (Auth::user()->role == 'ADMIN')
            $quizzes = Quiz::all();
        else
            $quizzes = Quiz::where('id_user', Auth::user()->id);

        View::load('dashboard', compact('quizzes'));
    }

}