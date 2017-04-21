@extends('layouts.master')

@section('title', 'My Surveys - Index')

@section('content')
    <h1>My Surveys</h1>

    <section>
        @if (isset ($surveys))

            <table class="small-12 large-12">
                <tr>
                    <th>Creator</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Active</th>
                    <th>Anonymous</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($mysurveys as $survey)
                    <tr>
                        <td>{{ $survey->user->name }}</td>
                        <td>{{ $survey->title }}</td>
                        <td>{{ $survey->description}}</td>
                        <td>
                            @if ($survey->active == true)
                                <span class="label label-success" style="background-color:green;">Yes</span>
                            @else
                                <span class="label label-danger" style="background-color:red;">No</span>
                            @endif
                        </td>
                        <td>
                            @if ($survey->anonymous == true)
                                <span class="label label-success" style="background-color:green;">Yes</span>
                            @else
                                <span class="label label-danger" style="background-color:red;">No</span>
                            @endif
                        </td>
                        <td><a><span class="button">Edit</span></a></td>
                        <td><a><span class="button">Delete</span></a></td>
                    </tr>
                @endforeach
            </table>
        @else
            <p> no surveys added yet </p>
        @endif
    </section>

    {{ Form::open(array('action' => 'SurveyController@create', 'method' => 'get')) }}
    <div class="row">
        {!! Form::submit('Add Survey', ['class' => 'button']) !!}
    </div>
    {{ Form::close() }}

@endsection