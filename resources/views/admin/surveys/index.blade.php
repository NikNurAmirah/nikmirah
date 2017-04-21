@extends('layouts.master')

@section('title', 'Surveys - Index')

@section('content')

    <br>
    <ul class="tabs" data-tab>
        <li class="tab-title active"><a href="#panel1">My Surveys</a></li>
        <li class="tab-title"><a href="#panel2">All Surveys</a></li>
    </ul>
    <div class="tabs-content">
        <div class="content active" id="panel1">
    <h2>My Surveys</h2>
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
            @foreach ($mysurveys as $mysurvey)
                <tr>
                    <td>{{ $mysurvey->title }}</td>
                    <td>{{ $mysurvey->description}}</td>
                    <td>
                        @if ($mysurvey->active == true)
                            <span class="label label-success" style="background-color:green;">Yes</span>
                        @else
                            <span class="label label-danger" style="background-color:red;">No</span>
                        @endif
                    </td>
                    <td>
                        @if ($mysurvey->anonymous == true)
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
        </div>


        <div class="content active" id="panel2">
        <h2>All Surveys</h2>

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
                            {{ Form::close() }}
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
        </div>
    </div>

@endsection