<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

use App\Http\Requests;

class AnswerController extends Controller
{
    public function store(Request $request)
    {

        $input = $request->all();

        Answer::create($input);

        return back();
    }
}
