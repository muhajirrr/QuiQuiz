<?php

namespace app\Controllers;

use app\Question;
use app\Quiz;
use lib\Auth;
use lib\BaseController;
use lib\DB;
use lib\Input;
use lib\Session;
use lib\View;

class QuizController extends BaseController {

    public function __construct()
    {
        $this->middleware('AuthMiddleware');
    }

    public function index() {
        $id_quiz = Input::get('id');
        $quiz = Quiz::find($id_quiz);

        if (empty($quiz) || ($quiz->id_user != Auth::user()->id && Auth::user()->role != 'ADMIN' ))
            header('location:dashboard');

        $questions = Question::where('id_quiz', $id_quiz);
        $results = DB::query("select * from results where id_quiz=$id_quiz");

        View::load('detailquiz', compact('quiz', 'questions', 'results'));
    }

    public function store() {
        $id_user = Auth::user()->id;
        $name = Input::post('name');
        $desc = Input::post('desc');
        $url = Input::post('url');

        DB::query("insert into quizzes (id_user, name, description, url) values ($id_user, '$name', '$desc', '$url')");

        return header('location:quiz');
    }

    public function update() {
        $id_quiz = Input::post('id_quiz');

        $quiz = Quiz::find($id_quiz);

        if (empty($quiz) || ($quiz->id_user != Auth::user()->id && Auth::user()->role != 'ADMIN' ))
            return header('location:dashboard');

        $name = Input::post('name');
        $desc = Input::post('desc');
        $url = Input::post('url');

        DB::query("update quizzes set name='$name', description='$desc', url='$url' where id=$id_quiz");

        return header('location:quiz');
    }

    public function destroy() {
        $id_quiz = Input::post('id_quiz');
        if (Auth::user()->role != 'ADMIN') {
            $quiz = Quiz::find($id_quiz);

            if ($quiz->id_user != Auth::user()->id)
                return header('location:quiz');
        }

        DB::query("delete from quizzes where id = $id_quiz");

        return header('location:quiz');
    }
}