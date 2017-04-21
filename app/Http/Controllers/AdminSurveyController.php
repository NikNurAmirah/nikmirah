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
    {
        $surveys = Survey::all();
        $users = User::all();

        if (Gate::allows('see_all_users')) {

            return view('admin/surveys/index', ['surveys' => $surveys], ['users' => $users]);
        }





    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    {
        $input = $request->all();

        Survey::create($input);
        return view('admin/surveys/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $survey = Survey::where('id',$id)->first();

        // if survey does not exist return to list
        if(!$survey){
            return view('/surveys/index');
        }
        if(Gate::allows('see_all_users')){
            return view('admin/surveys/edit')->with('survey', $survey);
        }
        return view('admin/surveys/index');
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
    {
        $survey = Survey::find($id);
        $survey->delete();

        return redirect('admin/surveys/index');
    }
}

