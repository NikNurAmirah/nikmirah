@extends('layouts.master')

@section('title', 'Surveys - Index')

@section('content')

    <h1>All Surveys</h1>
    <div class="row">

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
                @foreach ($surveys as $survey)
                    <tr>
                        <td><a href="/admin/users/{{ $survey->creator_id }}/edit">{{ $survey->user->name}}</a></td>
                        <td><a href="/surveys/{{ $survey->id }}" name="{{ $survey->title }}">{{ $survey->title }}</a></td>
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
                        <td><a href="/admin/surveys/{{ $survey->id }}/edit"><span class="label label-success" style="background-color:blue;">Edit</span></a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.surveys.destroy', $survey->id]]) !!}
                            {{ Form::submit('Delete', ['class' => 'label label-success', 'style' => 'background-colour:red;']) }}
                            {{ Form::close() }}
                        </td>

                    </tr>
                @endforeach
            </table>
        @else
            <p> no surveys added yet </p>
        @endif
    </section>

    {{ Form::open(array('action' => 'AdminSurveyController@create', 'method' => 'get')) }}
    <div class="row">
        {!! Form::submit('Add Survey', ['class' => 'button']) !!}
    </div>
    {{ Form::close() }}
        </div>


@endsection