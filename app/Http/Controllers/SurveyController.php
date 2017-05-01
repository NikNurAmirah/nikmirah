<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Survey;
use App\User;
use App\Question;
use App\Option;
use Auth;
use Gate;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
        //Shows all surveys in a list
    {
        $users = User::all();//Gets all users from DB

        $mysurveys = DB::table('survey')->where('creator_id', Auth::user()->id)->get(); //This gets all surveys where the creator_id matches the logged in users id

        return view('/surveys/index', ['mysurveys' => $mysurveys], ['users' => $users]); //passes variables to the view




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
        //Takes the user to create a new survey, on this view the store function is used to store details
    {
        return view('surveys/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //this stores all requests originally, used in the create function/view
    {
        $this->validate($request, [
            'title' => 'required',
            'active' => 'required',
            'anonymous' => 'required',
        ]); //outlines title, active and anonymous as required fields


        $input = $request->all();

        $survey = Survey::create($input); //stores data in DB

        return redirect('/surveys/'. $survey->id);//takes the user to the show blade with the ID of the newly created survey.
//        return view('surveys/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    //Show shows the title and description of the survey
    {

        $survey = Survey::where('id',$id)->first();// gets the survey info where the ID matches the ID
        $question = Question::where('survey_id', $id)->with('options')->get(); //Gets all questions and options matching the survey ID.

        if(!$survey)
        {
            return redirect('/surveys'); // if article does not exist return to list
        }

            return view('/surveys/show', ['survey' => $survey] , ['question' => $question]); //passes variables values to the show page.

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    //Allows the user to edit the survey
    {
        $survey = Survey::where('id',$id)->first(); //gets all survey data where the id matches the ID row on the db table entry

        if(!$survey){
            return back(); //if survey does not exist, return to original view
        }
        if(Auth::id() !== $survey->creator_id){
            return back(); //if logged in user id does not match creator id, redirect to original view/page
        }
        if(Gate::allows('see_all_users')){
            return view('/surveys/edit')->with('survey', $survey); //if admin allow access
        }
        return view('/surveys/edit')->with('survey', $survey); //else, allow access

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
        //This handles the updates created in the edit page
    {
        $this->validate($request, [
            'title' => 'required',
            'active' => 'required',
            'anonymous' => 'required',
        ]); //makes sure the required filed are filled in

        $survey = Survey::findOrFail($id); //gets the survey ID entry already created

        $survey->title = Input::get('title');
        $survey->description = Input::get('description');
        $survey->active = Input::get('active');
        $survey->anonymous = Input::get('anonymous');
        $survey->save(); //uploads to DB

        return redirect('/surveys'); //redirects user to index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    //Deletes the survey, available from the index
    {
        $survey = Survey::find($id);
        $survey->delete();

        return back();
    }
    public function add($id)
    //this handles adding the questions
    {
        $survey = Survey::where('id',$id)->first(); //gets the survey id

        if(!$survey){
            return back(); //if survey does not exist, return user to original view
        }
        if(Auth::id() !== $survey->creator_id){
            return back(); //If creator_id does not match the id of the logged in user, redirect the user to the page they were originally on
        }
        if(Gate::allows('see_all_users')){
            return view('/surveys/add')->with('survey', $survey); //if admin, allow access
        }
        return view('/surveys/add')->with('survey', $survey); //else, allow access
    }
    public function take($id)
    //This shows a list of questions that belong to the survey, it is what is seen when the user takes the survey
    {
        $survey = Survey::where('id',$id)->first(); //gets the survey where the id matches the survey id
        $question = Question::where('survey_id', $id)->with('answers')->get(); //gets the question where the survey id matches the surveys id


        if(!$survey)
        {
            return back(); //if survey does not exist, return user to original view
        }

        return view('/surveys/take', ['survey' => $survey] , ['question' => $question]); //pass variables to the view

    }


}
