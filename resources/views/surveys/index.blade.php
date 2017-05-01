@extends('layouts.master') {{-- This calls in the master view in the layout file. This is the template --}}

@section('title', 'My Surveys - Index') {{-- This indicates the title --}}

@section('content') {{-- This calls the yield function in the master view, so all content is between the 'content' tag --}}
    <h1>My Surveys</h1> {{-- title on page --}}


    <section>
        @if (count($mysurveys) < 1) {{-- If there is less than 1 survey, 'No Surveys Found--}}
            <p>No Surveys found...</p>
        @else {{--if there are surveys --}}


            <table class="small-12 large-12"> {{-- start the table --}}
                <tr>
                    <th>Title</th> {{-- Header for table --}}
                    <th>Description</th> {{-- Header for table --}}
                    <th>Active</th> {{-- Header for table --}}
                    <th>Anonymous</th> {{-- Header for table --}}
                    <th>Edit</th> {{-- Header for table --}}
                    <th>Add Questions</th> {{-- Header for table --}}
                    <th>Delete</th> {{-- Header for table --}}
                </tr>
                @foreach ($mysurveys as $survey)
                    <tr>
                        <td><a href="/surveys/{{ $survey->id }}" name="{{ $survey->title }}">{{ $survey->title }}</a></td>  {{-- Show survey title, with link to the survey --}}
                        <td>{{ $survey->description}}</td>  {{-- Show survey description --}}
                        <td>
                            @if ($survey->active == true)
                                <span class="label label-success" style="background-color:green;">Yes</span> {{-- If the survey is active, show 'Yes' inside of a green label --}}
                            @else
                                <span class="label label-danger" style="background-color:red;">No</span>  {{-- If the survey is not active, show 'No' inside of a red label --}}
                            @endif
                        </td>
                        <td>
                            @if ($survey->anonymous == true)
                                <span class="label label-success" style="background-color:green;">Yes</span> {{-- If the survey results are anonymous, show 'Yes' inside of a green label --}}
                            @else
                                <span class="label label-danger" style="background-color:red;">No</span> {{-- If the survey results are  not anonymous, show 'No' inside of a red label --}}
                            @endif
                        </td>
                        <td><a href="/surveys/{{ $survey->id }}/edit"><span class="label label-success" style="background-color:blue;">Edit</span></a></td> {{-- Edit button in blue that takes the user to the edit page --}}
                        <td><a href="/surveys/{{ $survey->id }}/add"><span class="label label-success" style="background-color:greenyellow; color:black;">Add</span></a></td> {{-- Add button in green that lets the user add a question to the survey --}}
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['surveys.destroy', $survey->id]]) !!}
                            {{ Form::submit('Delete', ['class' => 'label label-success', 'style' => 'background-colour:red;']) }} {{-- Delete button to delete the entry with the destroy function in the surveycontroller --}}
                            {{Form::close()}}
                        </td>
                    </tr>
                @endforeach
            </table>
    </section>
    @endif
    {{ Form::open(array('action' => 'SurveyController@create', 'method' => 'get')) }}
    <div class="row">
        {!! Form::submit('Add Survey', ['class' => 'button', 'style' => 'background-color: greenyellow; color: black']) !!}
    </div>
    {{ Form::close() }}

@endsection