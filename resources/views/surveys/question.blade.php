@extends('layouts.master') {{-- This calls in the master view in the layout file. This is the template --}}

<title>Answer: {{$question->title}}</title> {{-- Title --}}

@section('content') {{-- This calls the yield function in the master view, so all content is between the 'content' tag --}}


    @if($question->survey->active == 1) {{-- If the parent survey for this question is active, show the questions  --}}
    <h2>{{$question->title}}:</h2>


        @if($question->question_type == 'text')
            {!! Form::open(array('action' => 'AnswerController@store', 'id' => 'createanswer')) !!} {{-- If question is type text, open form using AnswerController store function --}}
            {!! Form::hidden('question_id', $question->id) !!} {{-- Hidden field to store the question id--}}
            @if($question->survey->anonymous == 0)
                {!! Form::hidden('answered_by', Auth::user()->email) !!} {{-- If survey is not anonymous, store the user email in the answered_by field on the db table --}}
            @endif
            {!! Form::hidden('survey_id', $question->survey_id) !!}{{-- store survey id --}}
            {{ Form::hidden(csrf_token()) }}
            {{ Form::text('atext', null)}} {{-- store the answer in the atext field in the db --}}
        @elseif($question->question_type == 'multi')
            {!! Form::open(array('action' => 'AnswerController@store', 'id' => 'createanswer')) !!} {{-- If question is type multi, open form using AnswerController store function --}}
            {!! Form::hidden('question_id', $question->id) !!} {{-- Hidden field to store the question id--}}
            @if($question->survey->anonymous == 0)
                {!! Form::hidden('answered_by', Auth::user()->email) !!} {{-- If survey is not anonymous, store the user email in the answered_by field on the db table --}}
            @endif
            {!! Form::hidden('survey_id', $question->survey_id) !!} {{-- store survey id --}}
            {{ Form::hidden(csrf_token()) }}
            @foreach($question->options as $options)
                {!!  Form::radio('atext', $options->title) !!} {{$options->title}}<br>{{-- for each loop to show all questions as radio button, and store the radio button value in the atext field in the db--}}
            @endforeach
        @elseif($question->question_type == 'check')
            {!! Form::open(array('action' => 'AnswerCheckController@store', 'id' => 'createanswer')) !!} {{-- If question is type check, open form using AnswerCheckController store function --}}
            {!! Form::hidden('question_id', $question->id) !!} {{-- Hidden field to store the question id--}}
            @if($question->survey->anonymous == 0)
                {!! Form::hidden('answered_by', Auth::user()->email) !!} {{-- If survey is not anonymous, store the user email in the answered_by field on the db table --}}
            @endif
            {!! Form::hidden('survey_id', $question->survey_id) !!} {{-- store survey id --}}
            {{ Form::hidden(csrf_token()) }}
            @foreach($question->options as $options)
                {{ Form::checkbox('atext[]', $options->title) }} {{$options->title}}<br> {{-- for each loop to show all questions as checkboxes, and store the checkbox button values in the atext field as an array in the db--}}
            @endforeach
        @endif
    {!! Form::submit('Done', ['class' => 'button', 'style' => "background-color:greenyellow; color:black"]) !!} {{-- submit button  once question is answered, and it stores values --}}
    {!! Form::close() !!}
    @else {{-- If not active, show this message --}}
        <br/>
        The survey that this question belongs to is no longer active.
    @endif



@endsection