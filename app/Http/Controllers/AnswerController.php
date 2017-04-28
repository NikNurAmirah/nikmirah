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
        $input = $request->all();

        $resource = Answer::create($input);



        return redirect('/surveys/' . $resource->survey_id . '/take');
    }
}
