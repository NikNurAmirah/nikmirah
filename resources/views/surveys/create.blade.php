@extends('layouts.master')

@section('title', 'Surveys - Create')

@section('content')

<h1>Add Survey</h1>


{!! Form::open(array('action' => 'SurveyController@store', 'id' => 'createsurvey')) !!}
{{ Form::hidden(csrf_token()) }}

{!! Form::hidden('creator_id', Auth::user()->id) !!}

<div class="row col-sm-12 col-lg-12">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'large-8 columns']) !!}
</div>

<div class="row col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description (optional):') !!}
    {!! Form::textarea('description', null, ['class' => 'large-8 columns']) !!}
</div>

<h3>Make active?</h3>
<div class="row col-sm-12 col-lg-12">
    {{ Form::radio('active', 1) }} Yes <br>
    {{ Form::radio('active', 0) }} No
</div>

<h3>Make results Anonymous?</h3>
<div class="row col-sm-12 col-lg-12">
    {{ Form::radio('anonymous', 1) }} Yes <br>
    {{ Form::radio('anonymous', 0) }} No
</div>

<br>

<div class="row large-4 columns">
    {!! Form::submit('Add Survey', ['class' => 'button']) !!}
</div>
{!! Form::close() !!}


@endsection