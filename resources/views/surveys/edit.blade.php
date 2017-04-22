@extends('layouts.master')


@section('content')
    <title>Survey - Edit {{ $survey->title }}</title>

    <h1>Edit Survey</h1>


    {!! Form::model($survey, ['method' => 'PATCH', 'url' => '/surveys/' . $survey->id]) !!}



    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'large-8 columns']) !!}
    </div>

    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('description', 'Description:') !!}
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
        {!! Form::submit('Update Survey', ['class' => 'button']) !!}
    </div>
    {!! Form::close() !!}

@endsection