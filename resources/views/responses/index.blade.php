@extends('layouts.master') {{-- This calls in the master view in the layout file. This is the template --}}

@section('title', 'My Responses - Index') {{-- This indicates the title --}}

@section('content') {{-- This calls the yield function in the master view, so all content is between the 'content' tag --}}
    <h1>My Responses</h1>


    <section>
        @if (count($mysurveys) < 1) {{--IF there are no surveys show this (below)--}}
            <p>No Surveys found...</p>
        @else{{--If there are surveys, show this--}}


            <table class="small-12 large-12">{{--table start--}}
                <tr>
                    <th>Title</th> {{-- Header for table --}}
                    <th>Description</th> {{-- Header for table --}}
                    <th>Active</th> {{-- Header for table --}}
                    <th>See Responses</th> {{-- Header for table --}}
                </tr>
                @foreach ($mysurveys as $survey) {{--For each loop, each line shows a different survey--}}
                    <tr>
                        <td><a href="/responses/{{ $survey->id }}/show" name="{{ $survey->title }}">{{ $survey->title }}</a></td> {{-- Show survey title, with link to the survey --}}
                        <td>{{ $survey->description}}</td>
                        <td>
                            @if ($survey->active == true)
                                <span class="label label-success" style="background-color:green;">Yes</span> {{-- If the survey is active, show 'Yes' inside of a green label --}}
                            @else
                                <span class="label label-danger" style="background-color:red;">No</span> {{-- If the survey is not active, show 'No' inside of a red label --}}
                            @endif
                        </td>
                        <td><a href="/responses/{{ $survey->id }}/show"><span class="label label-success" style="background-color:blue;">GO!</span></a></td> {{--user clicks this to see the responses to the survey--}}
                    </tr>
                @endforeach
            </table>
    </section>
    @endif
    {{ Form::open(array('action' => 'SurveyController@create', 'method' => 'get')) }}
    <div class="row">
        {!! Form::submit('Add Survey', ['class' => 'button', 'style' => 'background-color: greenyellow; color: black']) !!} {{--option to add another survey --}}
    </div>
    {{ Form::close() }}

@endsection