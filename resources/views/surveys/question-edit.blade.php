@extends('layouts.master') {{-- This calls in the master view in the layout file. This is the template --}}

@section('title', 'Question Edit') {{-- Title --}}

@section('content') {{-- This calls the yield function in the master view, so all content is between the 'content' tag --}}


    <h2>Edit: {{ $question->title }}</h2> {{-- on page title --}}
    {{ Form::model($question, array('action' => array('QuestionController@update', $question->id), 'method' => 'PATCH')) }} {{-- Update the option using the 'update' function in the optioncontroller --}}

    {{ Form::hidden(csrf_token()) }}


    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('title', 'Question:') !!} {{-- Form title for the question field --}}
        {!! Form::text('title', null, ['class' => 'large-8 columns']) !!} {{-- Form title input field --}}
    </div>

    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('require', 'Required?') !!} {{-- Form title for the require field --}}
        {{ Form::radio('require', 1) }} Yes <br> {{-- Radio button option 'yes' --}}
        {{ Form::radio('require', 0) }} No {{-- Radio button option 'no' --}}
    </div>

    <div class="row col-sm-12 col-lg-12">
        {!! Form::label('question_type', 'Question Type:') !!} {{-- Form title for the question_type field --}}
        {{ Form::radio('question_type', 'text') }} TextBox<br> {{-- Radio button option 'text' --}}
        {{ Form::radio('question_type', 'multi') }} Multiple Choice<br> {{-- Radio button option 'multi' --}}
        {{ Form::radio('question_type', 'check') }} Checkboxes <br> {{-- Radio button option 'check' --}}
    </div>


    <br>

    <div class="row large-12 columns">
        {!! Form::submit('Update Question', ['class' => 'button']) !!}  {{-- Submit form button --}}
    </div>
    {!! Form::close() !!}

    @if(count($option) < 1)
        <br />
        <br />
        <br />
            <p>No options added!</p>
            <a class='button' style="background-color: greenyellow; color: black;" href="/surveys/{{ $question->id }}/options">Add Options*</a>
            <p>*Options cannot be added to TextBox type questions!</p>
    @else
        <br />
        <br />
        <br />
    <div class="row">
    <table  class="small-12 large-12">
        <tr>
            <th>Question Options</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($option as $options)
            <tr>
                <td>{{ $options->title }}</td>
                <td><a href="/surveys/{{ $options->id }}/options-edit"><span class="label label-success" style="background-color:blue;">Edit</span></a></td>
                <td>
                    {{ Form::open(array('action' => array('OptionController@destroy', $options->id), 'method' => 'DELETE')) }}
                    {{ Form::submit('Delete', ['class' => 'label label-success', 'style' => 'background-colour:red;']) }}
                    {{Form::close()}}
                </td>
            </tr>
        @endforeach
    </table>
        <br/>
        <a style="background-color: greenyellow; color:black;" class='button' href="/surveys/{{ $question->id }}/options">Add Options</a>

    @endif


@endsection