@extends('layouts.master')

@section('content')

    <title>{{ $survey->title }}</title>

    <h1 class="row"><u>{{ $survey->title }}</u></h1>
    <div class="panel panel-default">
    <p class="row">{{ $survey->description }}</p>
    </div>

    <table class="small-12 large-12">
        <tr>
            <th>Question</th>
            <th>Question Type</th>
        </tr>
        @foreach($question as $questions)
        <tr>
            <td>{{ $questions->title }}</td>
            <td>{{ $questions->question_type }}</td>
        </tr>
        @endforeach
    </table>

    @if($survey->creator_id == Auth::user()->id)
            <a href="/surveys/{{ $survey->id }}/add"><span class="button" style="background-color:greenyellow; color:black;">Add Question</span></a>
    @endif

@endsection