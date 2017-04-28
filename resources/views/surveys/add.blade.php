@extends('layouts.master')

@section('title', 'Question Create')

@section('content')


    <h2>Create &amp; Add Question to - {{ $survey->title }}</h2>

    {!! Form::open(array('action' => 'QuestionController@store', 'id' => 'createquestion')) !!}
    {{ Form::hidden(csrf_token()) }}

    <div class="row col-sm-12 col-lg-12">
        {!! Form::hidden('survey_id', $survey->id, ['class' => 'large-8 columns']) !!}
        {!! Form::hidden('creator_id', Auth::user()->id) !!}
    </div>

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
        {{ Form::radio('question_type', 'text') }} TextBox<br>
        {{ Form::radio('question_type', 'multi') }} Multiple Choice<br>
        {{ Form::radio('question_type', 'check') }} Checkboxes <br>
    </div>


    <br>

    <div class="row large-4 columns">
        {!! Form::submit('Add Question', ['class' => 'button']) !!}
    </div>
    {!! Form::close() !!}


@endsection