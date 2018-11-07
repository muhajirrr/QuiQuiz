<?php

require_once __DIR__.'/lib/autoload.php';

error_reporting(APP_DEBUG ? E_ALL : 0);

use lib\Router as Route;

Route::get('/', 'AuthController@showLoginForm');

Route::get('/login', 'AuthController@showLoginForm');
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::post('/logout', 'AuthController@logout');

Route::get('/dashboard', 'HomeController@index');

Route::get('/quiz', 'QuizController@index');
Route::post('/quiz', 'QuizController@store');
Route::post('/updatequiz', 'QuizController@update');
Route::post('/deletequiz', 'QuizController@destroy');

Route::post('/question', 'QuestionController@store');
Route::post('/updatequestion', 'QuestionController@update');
Route::post('/deletequestion', 'QuestionController@destroy');

Route::post('/resultquiz', 'RunQuizController@submit');

Route::exec();