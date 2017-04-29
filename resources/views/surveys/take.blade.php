@extends('layouts.master')

<title>{{ 'take:'. $survey->title }}</title>

@section('content')

    @if($survey->active == 1)


    @if(count($question) >= 1)
    <br/>
    <p>Go through each question by clicking 'answer'. Once done click finish below all of the questions.</p>
    <table class="small-12 large-12">
        <tr>
            <th>Question</th>
            <th>Answer</th>
        </tr>
        @foreach($question as $questions)
            <tr>
                <td>{{ $questions->title }}</td>
                @if($questions->answered_by == Auth::user()->id)
                    <td><span class="label label-success">Already Answered!</span></td>
                @else
                <td><a href="/surveys/{{ $questions->id }}/question"><span class="label label-success" style="background-color:blue;">Answer</span></a></td>
            </tr>
            @endif
        @endforeach
    </table>


    <a href="/surveys/{{ $survey->id }}"><span class="button" style="background-color:greenyellow; color:black;">Finish</span></a><br/>
    @else
        <br/>

        No Questions added to this survey.
        <br/>
        <br/>
        <a href="/surveys/{{ $survey->id }}"><span class="button" style="background-color:greenyellow; color:black;">Go Back</span></a><br/>

    @endif

    @else
        <br/>
        This Survey is not available at this time.
    @endif

    @endsection