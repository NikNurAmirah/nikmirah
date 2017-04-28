@extends('layouts.master')

@section('title', 'Add Options')

@section('content')
    @if($question->question_type == 'text')
        <script type="text/javascript">
            window.location = "{{ url('/surveys/' . $question->survey_id) }}";//here double curly bracket
        </script>
    @else

    <h2>Add options to - {{ $question->title }}</h2>

    <p>To add an option to your question, type the option text into the textbox and select 'Add Option'. Once finished adding all options, click finish.</p>
    {!! Form::open(array('action' => 'OptionController@store', 'id' => 'createoption')) !!}
    {{ Form::hidden(csrf_token()) }}
    {!! Form::hidden('question_id', $question->id, ['class' => 'large-8 columns']) !!}
    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('title', 'Option:') !!}
        {!! Form::text('title', null, ['class' => 'large-8 columns']) !!}
    </div>
    <div class="row large-4 columns">
        {!! Form::submit('Add Option', ['class' => 'button']) !!}
    </div>
    {{ Form::close() }} 
    <div class="row col-sm-12 col-lg-12">
    <a class='button'  style="float: bottom;" href="/surveys/{{ $question->survey_id }}">Finish</a>
    </div>

    @endif
@endsection