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
    //This shows the index of all of the users surveys, same as the admin survey index and the survey index
    {
        $users = User::all();

        $mysurveys = DB::table('survey')->where('creator_id', Auth::user()->id)->get(); //This gets all surveys with creator ID matching logged in user ID

        return view('/responses/index', ['mysurveys' => $mysurveys], ['users' => $users]); //Passes in defined variables values to the responses index
    }

    public function show($id)
    //Shows all responses to selected survey
    {

        $survey = Survey::where('id',$id)->first(); //get survey ID results
        $answer = Answer::where('survey_id', $id)->with('question')->get(); //gets all answers where the survey id matches the ID of the page.
        $question = Question::where('survey_id', $id)->get(); //Get the questions where survey Id matches iD of page

        if(!$survey){
            return back(); //If survey does not exist, redirect user to original view
        }
        if(Auth::id() !== $survey->creator_id){
            return back(); //If current logged in user does not match creator ID, redirect user to original view
        }
        if(Gate::allows('see_all_users')){
            return view('/responses/show', ['survey' => $survey] , ['answer' => $answer], ['question' => $question]); //if admin allow access
        }

        return view('/responses/show', ['survey' => $survey] , ['answer' => $answer], ['question' => $question]); //else, allow access
    }

}
