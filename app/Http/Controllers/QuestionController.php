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
    public function create(){

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
{
    $this->validate($request, [
        'title' => 'required',
        'require' => 'required',
        'question_type' => 'required',
    ]);

    $input = $request->all();

    $resource = Question::create($input);

//    return redirect('/surveys/'. $resource->survey_id);
    return redirect('/surveys/'. $resource->id . '/options');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{

    $quest = Question::all();

    $question = Question::where('id', $id)->first();
    $option = Option::where('question_id',$id)->get();

    return view('surveys/question',['option' => $option] , ['question' => $question]);

}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $question = Question::where('id',$id)->first();
    $option = Option::where('question_id', $id)->get();

    if(!$question){
        return back();
    }
    if(Auth::id() !== $question->creator_id){
        return back();
    }
    if(Gate::allows('see_all_users')){
        return view('/surveys/question-edit')->with('question', $question)->with('option', $option);
    }
    return view('/surveys/question-edit')->with('question', $question)->with('option', $option);



}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{

    $this->validate($request, [
        'title' => 'required',
        'require' => 'required',
        'question_type' => 'required',
    ]);

    $question = Question::findOrFail($id);

    $question->title = Input::get('title');
    $question->require = Input::get('require');
    $question->question_type = Input::get('question_type');
    $question->save();

    return redirect('/surveys/'. $question->survey_id);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $question = Question::find($id);
    $question->delete();
    return back();
}
}