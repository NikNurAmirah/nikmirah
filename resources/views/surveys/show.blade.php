@extends('layouts.master')

<title>{{ $survey->title }}</title>

@section('content')


    <h1 class="row"><u>{{ $survey->title }}</u></h1>
    @if($survey->active == 1)
    <div class="panel panel-default">
    <p class="row">{{ $survey->description }}</p>
    </div>
    @if($survey->anonymous == 0)
        <p>This Survey will gather your name as it is not anonymous.</p>
    @endif
    <br/>
    <a href="/surveys/{{ $survey->id }}/take"><span class="button" style="background-color:greenyellow; color:black;">Take Survey!</span></a><br/>


    @if(count($question) < 1)

        No Questions added yet!
        @else

        @if($survey->creator_id == Auth::user()->id)
            <p>Share: <textarea onclick="this.select();" class="small-8 large-4">localhost:8000<?php echo $_SERVER['REQUEST_URI']; ?></textarea> </p>
            <br/>
            <table class="small-12 large-12">
                <tr>
                    <th>Question</th>
                    <th>Question Type</th>
                    <th>Edit Question</th>
                    <th>Delete Question</th>
                </tr>
                @foreach($question as $questions)
                    <tr>
                        <td>{{ $questions->title }}</td>
                        <td>{{ $questions->question_type }}</td>
                        <td><a href="/surveys/{{ $questions->id }}/question-edit"><span class="label label-success" style="background-color:blue;">Edit</span></a></td>
                        <td>
                            {{ Form::open(array('action' => array('QuestionController@destroy', $questions->id), 'method' => 'DELETE')) }}
                            {{ Form::submit('Delete', ['class' => 'label label-success', 'style' => 'background-colour:red;']) }}
                            {{Form::close()}}
                        </td>

                    </tr>
                @endforeach
            </table>
        @endif


    @endif
    @else
        This Survey is not available at this time.
    @endif

    @if($survey->creator_id == Auth::user()->id)
        <br/>
        <br/>
        <a href="/surveys/{{ $survey->id }}/add"><span class="button" style="background-color:greenyellow; color:black;">Add Question</span></a><br/>
        <a href="/surveys/{{ $survey->id }}/edit"><span class="button" color:black;">Edit Survey</span></a>

    @endif



@endsection