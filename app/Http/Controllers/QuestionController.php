<?php

namespace App\Http\Controllers;

use App\Option;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\User;
use App\Survey;
use Auth;
use Gate;
use DB;
use Illuminate\Support\Facades\Input;

class QuestionController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function index()
    //This does nothing and is not neccessary.
    {
    $questions = Question::all();
    $users = User::all();

    $surveys = DB::table('survey')->where('id', 'survey_id')->get();

    return view('surveys', ['question' => $questions], ['users' => $users], ['survey' => $surveys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    //This does nothing and is not neccessary. the create is handled on the 'add' function on the survey controller
    {

    $questions = Question::all();
    $users = User::all();

    $surveys = DB::table('survey')->where('id', 'survey_id')->get();

    return view('surveys', ['question' => $questions], ['users' => $users], ['survey' => $surveys]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //This stores all fields from the add view to the database
    {
    $this->validate($request, [
        'title' => 'required',
        'require' => 'required',
        'question_type' => 'required',
    ]); //This requires the user to have an input on title, require and question_tupe

    $input = $request->all();

    $resource = Question::create($input); //This stores it in the DB

//    return redirect('/surveys/'. $resource->survey_id);
    return redirect('/surveys/'. $resource->id . '/options'); //This takes the user to add options
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    //This shows the question, allowing a user to answer it
    {
    $question = Question::where('id', $id)->with('survey')->first(); //This gets the question ID
    $option = Option::where('question_id',$id)->get();//This gets all options where the ID matched the Question ID on the options table

    if(!$question){
        return back(); //If Question does not exist, take the user to the view they were already on.
    } else {
        return view('surveys/question', ['option' => $option], ['question' => $question]); //if it exists, show the question. Active or not will be handled on the view
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    //This lets the user edit the quesrtion
    {
    $question = Question::where('id',$id)->first(); //Gets the ID for the question
    $option = Option::where('question_id', $id)->get(); //Gets all options matching the question ID

    if(!$question){
        return back(); //If question does not exist, redirect to original view user was on
    }
    if(Auth::id() !== $question->creator_id){
        return back(); //If logged in user does not match creator id, do not allow edit view
    }
    if(Gate::allows('see_all_users')){
        return view('/surveys/question-edit')->with('question', $question)->with('option', $option); //if admin, allow access
    }
    return view('/surveys/question-edit')->with('question', $question)->with('option', $option); //If else, allow access



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    //This handles the updating from the edit view
    {
    $this->validate($request, [
        'title' => 'required',
        'require' => 'required',
        'question_type' => 'required',
    ]); //Makes sure fields are not left blank

    $question = Question::findOrFail($id);

    $question->title = Input::get('title');
    $question->require = Input::get('require');
    $question->question_type = Input::get('question_type');
    $question->save();

    return redirect('/surveys/'. $question->survey_id); //When updated, return to question show.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    //This deletes the question
    {
    $question = Question::find($id);
    $question->delete();
    return back();
    }
}