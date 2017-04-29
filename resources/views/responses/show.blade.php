@extends('layouts.master')

<title>Responses for: {{ $survey->title }}</title>

@section('content')

    <h1 class="row">{{ $survey->title }}</h1>

    @if(count($answer) >= 1 )


    <br/>
    <table class="small-12 large-12">
        <tr>
            <th>Answered By</th>
            <th>Question</th>
            <th>Answer</th>
        </tr>
    @foreach($answer as $answers)
            <tr>
                <td>{{$answers->answered_by}}</td>
                <td>{{$answers->question->title}}</td>
                <td>{{$answers->atext}}</td>
            </tr>
    @endforeach
    </table>
    @else
    <br/>
    <p>No Responses Yet!</p>
    @endif

@endsection