<?php

namespace app\Controllers;

use app\Question;
use app\Quiz;
use lib\BaseController;
use lib\DB;
use lib\Input;
use lib\View;

class RunQuizController extends BaseController {

    public function run($id_quiz) {
        $quiz = Quiz::find($id_quiz);
        $questions = Question::where('id_quiz', $id_quiz);

        View::load('quiz', compact('quiz', 'questions'));
    }

    public function submit() {
        $id_quiz = Input::post('id_quiz');
        $name = Input::post('name');
        $questions = Question::where('id_quiz', $id_quiz);
        $quiz = Quiz::find($id_quiz);

        $score = 0;
        $numberOfQuestion = 0;
        foreach ($questions as $question) {
            $useranswer = Input::post($question->id);

            if($question->answer == $useranswer) $score++;
            $numberOfQuestion++;
        }

        $floatscore = $score / $numberOfQuestion;

        DB::query("insert into results (id_quiz, name, score) values ($id_quiz, '$name', $floatscore)");

        View::load('result', compact('quiz', 'name', 'score', 'numberOfQuestion'));
    }

}