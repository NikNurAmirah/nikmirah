<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Survey;
use Illuminate\Http\Request;

use App\Http\Requests;

class AnswerController extends Controller
{
    public function store(Request $request)
    {

        $input = $request->all(); //This gets all inputs on the page and adds it to the variable to be sumbitted

        $resource = Answer::create($input); //when submitted it stores all results in the answer database

        return redirect('/surveys/' . $resource->survey_id . '/take'); //This takes the user back to the list of questions to continue the survey
    }
}
