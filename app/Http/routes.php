<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::resource('/admin/users', 'UserController' );
    Route::resource('/admin/surveys', 'AdminSurveyController' );
    Route::resource('surveys/{id}/add', 'SurveyController@add' );
    Route::resource('surveys/{id}/question-edit', 'QuestionController@edit' );
    Route::resource('surveys/index', 'QuestionController' );
    Route::resource('/responses', 'ResponseController' );
    Route::resource('responses/{id}/show', 'ResponseController@show' );
    Route::resource('surveys/index2', 'OptionController' );
    Route::resource('surveys/index3', 'AnswerController' );
    Route::resource('surveys/index4', 'AnswerCheckController' );
    Route::resource('surveys/destroy/', 'QuestionController@destroy' );
    Route::resource('surveys/{id}/options/', 'OptionController@add' );
    Route::resource('surveys/{id}/question/', 'QuestionController@show' );
    Route::resource('surveys/{id}/options-edit/', 'OptionController@edit' );
    Route::resource('surveys/{id}/take/', 'SurveyController@take' );

    Route::resource('/surveys', 'SurveyController' );

});

