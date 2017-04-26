@extends('layouts.master')

@section('title', 'Question Edit')

@section('content')


    <h2>Edit: {{ $question->title }}</h2>
    {{ Form::model($question, array('action' => array('QuestionController@update', $question->id), 'method' => 'PATCH')) }}

    {{ Form::hidden(csrf_token()) }}


    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('title', 'Question:') !!}
        {!! Form::text('title', null, ['class' => 'large-8 columns']) !!}
    </div>

    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('require', 'Required?') !!}
        {{ Form::radio('require', 1) }} Yes <br>
        {{ Form::radio('require', 0) }} No
    </div>

    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('question_type', 'Question Type:') !!}
        {{ Form::radio('question_type', 'multi') }} Multiple Choice<br>
        {{ Form::radio('question_type', 'check') }} Checkboxes <br>
    </div>


    <br>

    <div class="row large-4 columns">
        {!! Form::submit('Update Question', ['class' => 'button']) !!}
    </div>
    {!! Form::close() !!}


@endsection