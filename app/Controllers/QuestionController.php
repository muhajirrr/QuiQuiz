<?php

namespace app\Controllers;

use app\Question;
use app\Quiz;
use lib\Auth;
use lib\BaseController;
use lib\DB;
use lib\Input;
use lib\Session;

class QuestionController extends BaseController {

    public function __construct()
    {
        $this->middleware('AuthMiddleware');
    }

    public function store() {
        $id_quiz = Input::post('id_quiz');
        $question = Input::post('question');
        $a = Input::post('a');
        $b = Input::post('b');
        $c = Input::post('c');
        $d = Input::post('d');
        $e = Input::post('e');
        $answer = Input::post('answer');

        DB::query("insert into questions (id_quiz, question, a, b, c, d, e, answer) values ($id_quiz, '$question', '$a', '$b', '$c', '$d', '$e', '$answer')");

        return header('location:quiz?id='.$id_quiz);
    }

    public function update() {
        $id_quiz = Input::post('id_quiz');
        $id_question = Input::post('id_question');
        $question = Input::post('question');
        $a = Input::post('a');
        $b = Input::post('b');
        $c = Input::post('c');
        $d = Input::post('d');
        $e = Input::post('e');
        $answer = Input::post('answer');

        DB::query("update questions set question='$question', a='$a', b='$b', c='$c', d='$d', e='$e', answer='$answer' where id=$id_question");

        return header('location:quiz?id='.$id_quiz);
    }

    public function destroy() {
        $id_question = Input::post('id_question');
        $question = Question::find($id_question);
        $quiz = Quiz::find($question->id_quiz);
        if (Auth::user()->role != 'ADMIN') {
            if ($quiz->id_user != Auth::user()->id)
                return header('location:quiz?id='.$quiz->id);
        }

        DB::query("delete from questions where id=$id_question");

        return header('location:quiz?id='.$quiz->id);
    }

}