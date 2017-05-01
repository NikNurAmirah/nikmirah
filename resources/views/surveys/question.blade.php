@extends('layouts.master')

<title>Answer: {{$question->title}}</title>

@section('content')


    @if($question->survey->active == 1)
    <h2>{{$question->title}}:</h2>


        @if($question->question_type == 'text')
            {!! Form::open(array('action' => 'AnswerController@store', 'id' => 'createanswer')) !!}
            {!! Form::hidden('question_id', $question->id) !!}
            @if($question->survey->anonymous == 0)
                {!! Form::hidden('answered_by', Auth::user()->email) !!}
            @endif
            {!! Form::hidden('survey_id', $question->survey_id) !!}
            {{ Form::hidden(csrf_token()) }}
            {{ Form::text('atext', null)}}
        @elseif($question->question_type == 'multi')
            {!! Form::open(array('action' => 'AnswerController@store', 'id' => 'createanswer')) !!}
            {!! Form::hidden('question_id', $question->id) !!}
            @if($question->survey->anonymous == 0)
                {!! Form::hidden('answered_by', Auth::user()->email) !!}
            @endif
            {!! Form::hidden('survey_id', $question->survey_id) !!}
            {{ Form::hidden(csrf_token()) }}
            @foreach($question->options as $options)
                {!!  Form::radio('atext', $options->title) !!} {{$options->title}}<br>
            @endforeach
        @elseif($question->question_type == 'check')
            {!! Form::open(array('action' => 'AnswerCheckController@store', 'id' => 'createanswer')) !!}
            {!! Form::hidden('question_id', $question->id) !!}
            @if($question->survey->anonymous == 0)
                {!! Form::hidden('answered_by', Auth::user()->email) !!}
            @endif
            {!! Form::hidden('survey_id', $question->survey_id) !!}
            {{ Form::hidden(csrf_token()) }}
            @foreach($question->options as $options)
                {{ Form::checkbox('atext[]', $options->title) }} {{$options->title}}<br>
            @endforeach
        @endif
    {!! Form::submit('Done', ['class' => 'button', 'style' => "background-color:greenyellow; color:black"]) !!}
    {!! Form::close() !!}
    @else
        <br/>
        The survey that this question belongs to is no longer active.
    @endif



@endsection