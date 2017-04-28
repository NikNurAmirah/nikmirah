@extends('layouts.master')

<title>{{ 'take:'. $survey->title }}</title>

@section('content')



    <br/>
    <table class="small-12 large-12">
        <tr>
            <th>Question</th>
            <th>Answer</th>
        </tr>
        @foreach($question as $questions)
            <tr>
                <td>{{ $questions->title }}</td>
                @if($questions->answered_by == Auth::user()->id)
                    <span class="label label-success">Already Answered!</span>
                @else
                <td><a href="/surveys/{{ $questions->id }}/question"><span class="label label-success" style="background-color:blue;">Answer</span></a></td>
            </tr>
            @endif
        @endforeach
    </table>


    <a href="/surveys/{{ $survey->id }}"><span class="button" style="background-color:greenyellow; color:black;">Finish</span></a><br/>

    @endsection