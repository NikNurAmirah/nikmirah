<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Question;
use App\Survey;
use DB;
use Auth;
use Gate;

class ResponseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();

        $mysurveys = DB::table('survey')->where('creator_id', Auth::user()->id)->get();

        return view('/responses/index', ['mysurveys' => $mysurveys], ['users' => $users]);
    }
    public function show($id)
    {

        $survey = Survey::where('id',$id)->first();
        $answer = Answer::where('survey_id', $id)->with('question')->get();
        $question = Question::where('survey_id', $id)->get();
        // if survey does not exist return to list
        if(!$survey)
        {
            return back();
        }

        if(!$survey){
            return back();
        }
        if(Auth::id() !== $survey->creator_id){
            return back();
        }
        if(Gate::allows('see_all_users')){
            return view('/responses/show', ['survey' => $survey] , ['answer' => $answer], ['question' => $question]);
        }

        return view('/responses/show', ['survey' => $survey] , ['answer' => $answer], ['question' => $question]);
    }

}
