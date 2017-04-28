@extends('layouts.master')

@section('title', 'Add Options')

@section('content')

        <h2>Add options to - {{ $option->title }}</h2>

        {{ Form::model($option, array('action' => array('OptionController@update', $option->id), 'method' => 'PATCH')) }}
        {{ Form::hidden(csrf_token()) }}
        <div class="row col-sm-12 col-lg-12">
            {!! Form::label('title', 'Option:') !!}
            {!! Form::text('title', null, ['class' => 'large-8 columns']) !!}
        </div>
        <div class="row large-4 columns">
            {!! Form::submit('Update Option', ['class' => 'button']) !!}
        </div>
        {{ Form::close() }}
@endsection