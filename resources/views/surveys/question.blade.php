@extends('layouts.master')

<title>Answer: {{$question->title}}</title>

@section('content')

    <h2>{{$question->title}}:</h2>
    {!! Form::open(array('action' => 'AnswerController@store', 'id' => 'createanswer')) !!}
    {!! Form::hidden('question_id', $question->id) !!}
    {!! Form::hidden('survey_id', $question->survey_id) !!}
    {!! Form::hidden('answered_by', Auth::user()->id) !!}
    {{ Form::hidden(csrf_token()) }}
        @if($question->question_type == 'text')
            {{ Form::text('atext', null)}}
        @elseif($question->question_type == 'multi')
            @foreach($question->options as $options)
                {!!  Form::radio('atext', $options->title) !!} {{$options->title}}<br>
            @endforeach
        @elseif($question->question_type == 'check')
            @foreach($question->options as $options)
                {{ Form::checkbox('atext', $options->title) }} {{$options->title}}<br>
            @endforeach
        @endif
    {!! Form::submit('Done', ['class' => 'button', 'style' => "background-color:greenyellow; color:black"]) !!}
    {!! Form::close() !!}



@endsection