<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Survey;
use App\User;
use Auth;
use Gate;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AdminSurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
        //This function shows the index for the survey list. '/admin/surveys'
    {
        $surveys = Survey::all(); //This calls in all fields from the survey table
        $users = User::all(); //This calls in all fields from the users table

        if (Gate::allows('see_all_users')){ //Gate has been 'used' at the top of the page, it checks the users permissions and if allowed they can see the admin index

            return view('admin/surveys/index', ['surveys' => $surveys], ['users' => $users]); //this line passes the two databases to the view
        }





    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        //This takes the user to create a new survey, open to all users
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
        //This function is used in the create view, it adds all fields to the Survey table
    {
        $input = $request->all();

        Survey::create($input);
        return view('admin/surveys/index'); //Once completed, this takes the user back to the admin index
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show is handled in the survey controller
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
        //Edit gets the ID and takes the user to a form to change elemetns from a previously created survey
    {
        $survey = Survey::where('id',$id)->first(); //This gets the ID and passes it to the route

        // if survey does not exist return to list
        if(!$survey){
            return redirect('/surveys/index'); //If the survey does not exist, the user will be redirected to this page
        }
        if(Gate::allows('see_all_users')){
            return view('admin/surveys/edit')->with('survey', $survey); //If they are an admin the user will be taken to this view
        }
        return view('admin/surveys/index'); //If not they will be redirected here, which redirects if not an admin.
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    //This is basically the store function for the edit. It updates the fields in the Database
    {
        $survey = Survey::findOrFail($id);

        $survey->title = Input::get('title');
        $survey->description = Input::get('description');
        $survey->active = Input::get('active');
        $survey->anonymous = Input::get('anonymous');
        $survey->save();

        return redirect('/surveys');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    //This deletes the survey from the All Surveys index
    {
        $survey = Survey::find($id);
        $survey->delete();

        return redirect('admin/surveys');
    }
}

