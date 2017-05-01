<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\Option;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Gate;
use Auth;


class OptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //There is no index for the options, just create and edit.
    }
    public function add($id){

        $question = Question::where('id',$id)->first(); //This gets the ID of the question and allows an option to be added to the question
        $option = Option::all(); //This gets all elements from the option survey

        return view('/surveys/options', ['question' => $question], ['option' => $option]); //The view is opened with the option and question elements needed

    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            ]); //This blocks the users input if they leave the title field blanks

        $input = $request->all();

        Option::create($input); //This stores all results in the Option db

        return back(); //this returns the same view, as the user can add as many as they want, once done they click finish which will take them away from the option add view
    }
    public function edit($id)
    //This lets the user edit the option
    {
        $option = Option::where('id', $id)->first(); //this gets the ID of the option and will later pass the results from the option with the current ID to the view

        if(!$option){
            return back();
        } // IF option does not exist, return original view
        if(Auth::id() !== $option->question->creator_id){
            return back();
        } // If the current logged in user does not match the ID of the creator of the question, redirect original view
        if(Gate::allows('see_all_users')){
            return view('/surveys/options-edit')->with('option', $option);
        } //if admin allow access

        return view('/surveys/options-edit')->with('option', $option); //If the current user matches the ID of the creator, allow access



    }
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
        ]); //Again, make the title field required to be filled in.

        $option = Option::findOrFail($id); //Get the ID

        $option->title = Input::get('title');
        $option->save(); //Update option db row


        return redirect('/surveys/' . $option->question_id . '/question-edit'); // Return back to question edit
    }
    public function destroy($id)
    //This deletes the entry and returns the view the user was already on
    {
        $option = Option::findOrFail($id);
        $option->delete();

        return back();
    }
}
