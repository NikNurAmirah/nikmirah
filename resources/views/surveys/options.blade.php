@extends('layouts.master') {{-- This calls in the master view in the layout file. This is the template --}}

@section('title', 'Add Options') {{-- Title --}}

@section('content') {{-- This calls the yield function in the master view, so all content is between the 'content' tag --}}
    @if($question->question_type == 'text')
        <script type="text/javascript">
            window.location = "{{ url('/surveys/' . $question->survey_id) }}"; {{-- if the question type is 'text', redirect the user to the question edit page--}}
        </script>
    @else  {{--If question is any other than text, show this --}}

    <h2>Add options to - {{ $question->title }}</h2> {{-- on page title --}}

    <p>To add an option to your question, type the option text into the textbox and select 'Add Option'. Once finished adding all options, click finish.</p> {{-- Instructions for the user --}}
    {!! Form::open(array('action' => 'OptionController@store', 'id' => 'createoption')) !!} {{-- Open form with store function from optioncontroller  --}}
    {{ Form::hidden(csrf_token()) }}
    {!! Form::hidden('question_id', $question->id, ['class' => 'large-8 columns']) !!} {{-- Hidden form to store the question id with the id of the question --}}
    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('title', 'Option:') !!} {{-- Form title for the Option field --}}
        {!! Form::text('title', null, ['class' => 'large-8 columns']) !!} {{-- Form title input field --}}
    </div>
    <div class="row large-4 columns">
        {!! Form::submit('Add Option', ['class' => 'button'], ['style' => "background-color:greenyellow; color:black"]) !!} {{-- submit form to add the option --}}
    </div>
    {{ Form::close() }} 
    <div class="row col-sm-12 col-lg-12">
    <a class='button'  style="float: bottom;" href="/surveys/{{ $question->survey_id }}">Finish</a> {{-- when this is clicked they leave the add option page. this is to be clicked when the user has finished adding options --}}
    </div>

    @endif
@endsection