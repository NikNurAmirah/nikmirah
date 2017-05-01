@extends('layouts.master') {{-- This calls in the master view in the layout file. This is the template --}}

<title>{{ $survey->title }}</title> {{-- Title --}}

@section('content') {{-- This calls the yield function in the master view, so all content is between the 'content' tag --}}


    <h1 class="row"><u>{{ $survey->title }}</u></h1> {{-- On page title --}}
    @if($survey->active == 1) {{-- if survey is active show all below --}}
    <div class="panel panel-default">
    <p class="row">{{ $survey->description }}</p> {{--show survey description/cover title --}}
    </div>
    @if($survey->anonymous == 0) {{-- Inform users if the survey is not anonymous --}}
        <p>This Survey will gather your name as it is not anonymous.</p>
    @endif
    <br/>
    <a href="/surveys/{{ $survey->id }}/take"><span class="button" style="background-color:greenyellow; color:black;">Take Survey!</span></a><br/> {{-- Take survey button that will take the user to the 'take' view (to begin the survey) --}}


    @if(count($question) < 1) {{-- if there are no questions, show 'no questions added yet' --}}

        No Questions added yet!
        @else {{-- If there are questions, show this (below) --}}

        @if($survey->creator_id == Auth::user()->id) {{-- only show if logged in user matches the creator id --}}
            <p>Share: <textarea onclick="this.select();" class="small-8 large-4">localhost:8000<?php echo $_SERVER['REQUEST_URI']; ?></textarea> </p> {{--textbox that lets the user share their survey --}}
            <br/>
            <table class="small-12 large-12">  {{-- start the table --}}
                <tr>
                    <th>Question</th> {{-- Header for table --}}
                    <th>Question Type</th> {{-- Header for table --}}
                    <th>Edit Question</th> {{-- Header for table --}}
                    <th>Delete Question</th> {{-- Header for table --}}
                </tr>
                @foreach($question as $questions) {{-- for each loop to show every question matching the survey id --}}
                    <tr>
                        <td>{{ $questions->title }}</td> {{-- Shows the title question --}}
                        <td>{{ $questions->question_type }}</td> {{-- Shows the question type --}}
                        <td><a href="/surveys/{{ $questions->id }}/question-edit"><span class="label label-success" style="background-color:blue;">Edit</span></a></td> {{-- blue button to take the user to the edit question --}}
                        <td>
                            {{ Form::open(array('action' => array('QuestionController@destroy', $questions->id), 'method' => 'DELETE')) }} {{-- Button to let the user delete the question --}}
                            {{ Form::submit('Delete', ['class' => 'label label-success', 'style' => 'background-colour:red;']) }}
                            {{Form::close()}}
                        </td>

                    </tr>
                @endforeach
            </table>
        @endif


    @endif
    @else {{-- IF survey is not active, show this message (below) --}}
        This Survey is not available at this time.
    @endif

    @if($survey->creator_id == Auth::user()->id){{-- only show if logged in user matches the creator id --}}
        <br/>
        <br/>
        <a href="/surveys/{{ $survey->id }}/add"><span class="button" style="background-color:greenyellow; color:black;">Add Question</span></a><br/> {{-- add question --}}
        <a href="/surveys/{{ $survey->id }}/edit"><span class="button">Edit Survey</span></a>{{-- edit survey --}}

    @endif



@endsection