@extends('layouts.master') {{-- This calls in the master view in the layout file. This is the template --}}

@section('title', 'Add Options') {{-- This indicates the title --}}

@section('content') {{-- This calls the yield function in the master view, so all content is between the 'content' tag --}}

        <h2>Edit option - {{ $option->title }}</h2> {{-- On page title, with title of current survey--}}

        {{ Form::model($option, array('action' => array('OptionController@update', $option->id), 'method' => 'PATCH')) }} {{-- Update the option using the 'update' function in the optioncontroller --}}
        {{ Form::hidden(csrf_token()) }}
        <div class="row col-sm-12 col-lg-12">
            {!! Form::label('title', 'Option:') !!} {{-- Form title for the option field --}}
            {!! Form::text('title', null, ['class' => 'large-8 columns']) !!} {{-- Form title input field --}}
        </div>
        <div class="row large-4 columns">
            {!! Form::submit('Update Option', ['class' => 'button']) !!} {{-- Submit form button --}}
        </div>
        {{ Form::close() }} {{-- close form --}}
@endsection