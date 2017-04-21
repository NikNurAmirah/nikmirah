@extends('layouts.master')

@section('title', 'My Surveys - Index')

@section('content')
    <h1>My Surveys</h1>

    <section>
        @if (isset ($mysurveys))

            <table class="small-12 large-12">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Active</th>
                    <th>Anonymous</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($mysurveys as $survey)
                    <tr>
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
                        <td><a href="/surveys/{{ $survey->id }}/edit"><span class="label label-success" style="background-color:blue;">Edit</span></a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['surveys.destroy', $survey->id]]) !!}
                            {{ Form::submit('Delete', ['class' => 'label label-success', 'style' => 'background-colour:red;']) }}
                            {{Form::close()}}
                        </td>
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