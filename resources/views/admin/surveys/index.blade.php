@extends('layouts.master')

@section('title', 'Surveys - Index')

@section('content')
    <h1>All Surveys</h1>

    <section>
        @if (isset ($surveys))

            <table class="small-12 large-12">
                <tr>
                    <th>Creator</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Active</th>
                    <th>Anonymous</th>
                </tr>
                @foreach ($surveys as $survey)
                    <tr>
                        <td>{{ $survey->creator_id}}</td>
                        <td>{{ $survey->title }}</td>
                        <td>{{ $survey->description}}</td>
                        <td>{{ $survey->active}}</td>
                        <td>{{ $survey->anonymous}}</td>
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