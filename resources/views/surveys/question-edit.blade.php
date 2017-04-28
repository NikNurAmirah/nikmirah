@extends('layouts.master')

@section('title', 'Question Edit')

@section('content')


    <h2>Edit: {{ $question->title }}</h2>
    {{ Form::model($question, array('action' => array('QuestionController@update', $question->id), 'method' => 'PATCH')) }}

    {{ Form::hidden(csrf_token()) }}


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

    <div class="row large-12 columns">
        {!! Form::submit('Update Question', ['class' => 'button']) !!}
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