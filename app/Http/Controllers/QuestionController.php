<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\Survey;
use App\User;
use Auth;
use Gate;
use DB;

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

    return view('surveys/index', ['question' => $questions], ['users' => $users], ['survey' => $surveys]);
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

    return view('surveys/index', ['question' => $questions], ['users' => $users], ['survey' => $surveys]);

}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $input = $request->all();

    Question::create($input);
    return redirect('surveys/index');

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{


}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{


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

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{


}
}