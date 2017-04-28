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
    }
    public function add($id){

        $question = Question::where('id',$id)->first();
        $option = Option::all();

        return view('/surveys/options', ['question' => $question], ['option' => $option]);

    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            ]);
        $input = $request->all();

        Option::create($input);

        return back();
    }
    public function edit($id)
    {
        $option = Option::where('id', $id)->first();

        if(!$option){
            return back();
        }
        if(Auth::id() !== $option->question->creator_id){
            return back();
        }
        if(Gate::allows('see_all_users')){
            return view('/surveys/options-edit')->with('option', $option);
        }

        return view('/surveys/options-edit')->with('option', $option);



    }
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
        ]);

        $option = Option::findOrFail($id);

        $option->title = Input::get('title');
        $option->save();


        return redirect('/surveys/' . $option->question_id . '/question-edit');
    }
    public function destroy($id)
    {
        $option = Option::findOrFail($id);
        $option->delete();

        return back();
    }
}
