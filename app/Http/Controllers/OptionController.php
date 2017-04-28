<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\Option;
use Illuminate\Support\Facades\DB;


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
}
