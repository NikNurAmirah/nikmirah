@extends('layouts.master') {{-- This calls in the master view in the layout file. This is the template --}}


@section('content') {{-- This calls the yield function in the master view, so all content is between the 'content' tag --}}
    <title>Survey - Edit {{ $survey->title }}</title> {{-- This indicates the title custom for the survey --}}

    <h1>Edit Survey</h1> {{-- Title --}}


    {!! Form::model($survey, ['method' => 'PATCH', 'url' => '/surveys/' . $survey->id]) !!}  {{-- This is the update method, and opens the form --}}



    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('title', 'Title:') !!}  {{-- Form title for the title field --}}
        {!! Form::text('title', null, ['class' => 'large-8 columns']) !!}  {{-- Form title input field --}}
    </div>

    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('description', 'Description:') !!} {{-- Form title for the description field --}}
        {!! Form::textarea('description', null, ['class' => 'large-8 columns']) !!} {{-- Form description input field --}}
    </div>

    <h3>Make active?</h3> {{-- Form title for the active field --}}
    <div class="row col-sm-12 col-lg-12">
        {{ Form::radio('active', 1) }} Yes <br> {{-- Form active input field --}}
        {{ Form::radio('active', 0) }} No {{-- Form active input field --}}
    </div>

    <h3>Make results Anonymous?</h3> {{-- Form title for the anonymous field --}}
    <div class="row col-sm-12 col-lg-12">
        {{ Form::radio('anonymous', 1) }} Yes <br> {{-- Form anonymous input field --}}
        {{ Form::radio('anonymous', 0) }} No {{-- Form anonymous input field --}}
    </div>

    <br>

    <div class="row large-4 columns">
        {!! Form::submit('Update Survey', ['class' => 'button']) !!} {{-- Submit button to update all fields --}}
    </div>
    {!! Form::close() !!} {{-- Close survey --}}

@endsection {{-- end 'content' section --}}