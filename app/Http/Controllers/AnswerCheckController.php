<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Survey;
use Illuminate\Http\Request;

use App\Http\Requests;

class AnswerCheckController extends Controller
{
    public function store(Request $request)
    //This handles the store function if the question type is a checkbox
    {

        $atext = implode(", ", $request->get('atext')); //This gets every input and adds it to the database seperated by a comma and space

        $resource = Answer::create([
            'atext' => $atext, //this references the variable created just above
            'answered_by' => $request->get('answered_by'),
            'survey_id' => $request->get('survey_id'),
            'question_id' => $request->get('question_id'),
        ]); //when submitted it stores all results in the answer database

        return redirect('/surveys/' . $resource->survey_id . '/take'); //This takes the user back to the list of questions to continue the survey
    }
}
