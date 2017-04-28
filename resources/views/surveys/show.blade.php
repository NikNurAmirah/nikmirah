@extends('layouts.master')

@section('content')



    <title>{{ $survey->title }}</title>

    <h1 class="row"><u>{{ $survey->title }}</u></h1>
    <div class="panel panel-default">
    <p class="row">{{ $survey->description }}</p>
    </div>

    @if($survey->creator_id == Auth::user()->id)
        <p>Share: <textarea onclick="this.select();" class="small-8 large-4">localhost:8000<?php echo $_SERVER['REQUEST_URI']; ?></textarea> </p>

        <br>

        <a href="/surveys/{{ $survey->id }}/add"><span class="button" style="background-color:greenyellow; color:black;">Add Question</span></a>
    @endif

    @if(count($question) < 1)

        No Questions added yet!

        @else
    <table class="small-12 large-12">
        <tr>
            <th>Question</th>
            <th>Question Type</th>
            <th>Edit Question</th>
            <th>Delete Question</th>
        </tr>
        @foreach($question as $questions)
        <tr>
            <td>{{ $questions->title }}</td>
            <td>{{ $questions->question_type }}</td>
            <td><a href="/surveys/{{ $questions->id }}/question-edit"><span class="label label-success" style="background-color:blue;">Edit</span></a></td>
            <td>
                {{ Form::open(array('action' => array('QuestionController@destroy', $questions->id), 'method' => 'DELETE')) }}
                {{ Form::submit('Delete', ['class' => 'label label-success', 'style' => 'background-colour:red;']) }}
                {{Form::close()}}
            </td>

        </tr>
        @endforeach
    </table>
    @endif



@endsection