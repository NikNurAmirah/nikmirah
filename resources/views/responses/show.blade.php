@extends('layouts.master') {{-- This calls in the master view in the layout file. This is the template --}}

<title>Responses for: {{ $survey->title }}</title>{{--Title--}}

@section('content') {{-- This calls the yield function in the master view, so all content is between the 'content' tag --}}

    <h1 class="row">{{ $survey->title }}</h1> {{--on page title--}}

    @if(count($answer) >= 1 ){{--If there is one or more responses, show this (below)--}}


    <br/>
    <table class="small-12 large-12">{{--table start --}}
        <tr>
            <th>Answered By</th>{{-- Header for table --}}
            <th>Question</th> {{-- Header for table --}}
            <th>Answer</th> {{-- Header for table --}}
        </tr>
    @foreach($answer as $answers)
            <tr>
                <td>{{$answers->answered_by}}</td> {{--Show who the response was made by--}}
                <td>{{$answers->question->title}}</td>{{--Show the question that the response was answering--}}
                <td>{{$answers->atext}}</td>{{--Show the answer--}}
            </tr>
    @endforeach
    </table>
    @else
    <br/>
    <p>No Responses Yet!</p> {{--if no responses, display this message--}}
    @endif

@endsection