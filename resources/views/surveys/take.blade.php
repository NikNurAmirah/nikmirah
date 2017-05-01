@extends('layouts.master') {{-- This calls in the master view in the layout file. This is the template --}}

<title>{{ 'Take:'. $survey->title }}</title> {{-- title --}}

@section('content') {{-- This calls the yield function in the master view, so all content is between the 'content' tag --}}

    @if($survey->active == 1) {{-- if survey is active show all below --}}


    @if(count($question) >= 1) {{-- if there is 1 or more questions, show all of the below --}}
    <br/>
    <p>Go through each question by clicking 'answer'. Once done click finish below all of the questions.</p> {{-- helping the user --}}
    <table class="small-12 large-12"> {{-- start table --}}
        <tr>
            <th>Question</th>{{-- Header for table --}}
            <th>Answer</th>{{-- Header for table --}}
        </tr>
        @foreach($question as $questions){{-- foreach loop, to show each question matching the survey id to the user --}}
            <tr>
                <td>{{ $questions->title }}</td>
                @if($questions->answered_by == Auth::user()->id) {{-- loop to attempt to stop user answering twice, does not seem to work :( --}}
                    <td><span class="label label-success">Already Answered!</span></td>
                @else
                <td><a href="/surveys/{{ $questions->id }}/question"><span class="label label-success" style="background-color:blue;">Answer</span></a></td>{{--answer button to take user to the question--}}
            </tr>
            @endif
        @endforeach
    </table>


    <a href="/surveys/{{ $survey->id }}"><span class="button" style="background-color:greenyellow; color:black;">Finish</span></a><br/> {{-- button when user finishes all questions --}}
    @else {{-- if no questions, show this message (below)--}}
        <br/>

        No Questions added to this survey.
        <br/>
        <br/>
        <a href="/surveys/{{ $survey->id }}"><span class="button" style="background-color:greenyellow; color:black;">Go Back</span></a><br/> {{--show go back, for the user return to the show page--}}

    @endif

    @else
        <br/>
        This Survey is not available at this time. {{-- if survey is not active, show this message --}}
    @endif

    @endsection