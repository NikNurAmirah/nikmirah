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
//The home page, open to everyone
Route::get('/', function () {
    return view('welcome');
});

//This group shows all protected routes, so if a user wants to look at these they will have to create an account
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    //Takes the user home
    Route::get('/home', 'HomeController@index');
    //Takes an admin level user to the index of all the users
    Route::resource('/admin/users', 'UserController' );
    //Handles the admin level users view of all of the surveys
    Route::resource('/admin/surveys', 'AdminSurveyController' );
    //Handles the adding of questions to the survey with the ID passed to the route
    Route::resource('surveys/{id}/add', 'SurveyController@add' );
    //Handles the editing of the question, using the @edit function on the question controller, and getting the question ID in the route
    Route::resource('surveys/{id}/question-edit', 'QuestionController@edit' );
    //This route does nothing, for some reason the Question controller would not work without it (I think it is because the controller was not created with '--resource-'
    Route::resource('surveys/index', 'QuestionController' );
    Route::resource('/responses', 'ResponseController' );
    Route::resource('responses/{id}/show', 'ResponseController@show' );
    //This route does nothing, for some reason the Option controller would not work without it (I think it is because the controller was not created with '--resource-'
    Route::resource('surveys/index2', 'OptionController' );
    //This route does nothing, for some reason the Answer controller would not work without it (I think it is because the controller was not created with '--resource-'
    Route::resource('surveys/index3', 'AnswerController' );
    //This route does nothing, for some reason the AnswerCheck controller would not work without it (I think it is because the controller was not created with '--resource-'
    Route::resource('surveys/index4', 'AnswerCheckController' );
    //This handles deleting the question in the survey show view
    Route::resource('surveys/destroy/', 'QuestionController@destroy' );
    //This handles Adding options to a question
    Route::resource('surveys/{id}/options/', 'OptionController@add' );
    //This handles showing a question to the user
    Route::resource('surveys/{id}/question/', 'QuestionController@show' );
    //This handles editing options for a question
    Route::resource('surveys/{id}/options-edit/', 'OptionController@edit' );
    //This handles the user taking and completing the survey
    Route::resource('surveys/{id}/take/', 'SurveyController@take' );
    //This handles the survey index of all surveys to a standard user
    Route::resource('/surveys', 'SurveyController' );

});

