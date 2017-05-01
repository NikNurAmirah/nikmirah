@extends('layouts.master') {{-- This calls in the master view in the layout file. This is the template --}}

@section('title', 'Question Create') {{-- Title --}}

@section('content') {{-- This calls the yield function in the master view, so all content is between the 'content' tag --}}


    <h2>Create &amp; Add Question to - {{ $survey->title }}</h2> {{-- Title on page --}}

    {!! Form::open(array('action' => 'QuestionController@store', 'id' => 'createquestion')) !!} {{-- Opens form with action 'store' inside the question controller --}}
    {{ Form::hidden(csrf_token()) }}

    <div class="row col-sm-12 col-lg-12">
        {!! Form::hidden('survey_id', $survey->id, ['class' => 'large-8 columns']) !!} {{-- hidden form field to store the survey id --}}
        {!! Form::hidden('creator_id', Auth::user()->id) !!} {{-- hidden form field to store the creator id --}}
    </div>

    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('title', 'Question:') !!} {{-- Form title for the Question field --}}
        {!! Form::text('title', null, ['class' => 'large-8 columns']) !!} {{-- Form title input field --}}
    </div>

    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('require', 'Required?') !!} {{-- Form title for the Required field --}}
        {{ Form::radio('require', 1) }} Yes <br>{{-- Radio button option 'yes' --}}
        {{ Form::radio('require', 0) }} No {{-- Radio button option 'no' --}}
    </div>

    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('question_type', 'Question Type:') !!} {{-- Form title for the question type field --}}
        {{ Form::radio('question_type', 'text') }} TextBox<br> {{-- Radio button option 'text' --}}
        {{ Form::radio('question_type', 'multi') }} Multiple Choice<br> {{-- Radio button option 'multi' --}}
        {{ Form::radio('question_type', 'check') }} Checkboxes <br> {{-- Radio button option 'check' --}}
    </div>


    <br>

    <div class="row large-4 columns">
        {!! Form::submit('Add Question', ['class' => 'button']) !!} {{-- Submit form button --}}
    </div>
    {!! Form::close() !!}


@endsection {{-- ends the 'content' section --}}