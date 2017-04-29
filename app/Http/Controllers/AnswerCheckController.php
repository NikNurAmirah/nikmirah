<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Survey;
use Illuminate\Http\Request;

use App\Http\Requests;

class AnswerCheckController extends Controller
{
    public function store(Request $request)
    {

        ///


        $atext = implode(", ", $request->get('atext'));

        $resource = Answer::create([
            'atext' => $atext,
            'answered_by' => $request->get('answered_by'),
            'survey_id' => $request->get('survey_id'),
            'question_id' => $request->get('question_id'),
        ]);




        return redirect('/surveys/' . $resource->survey_id . '/take');
    }
}
