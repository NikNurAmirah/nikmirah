@extends('layouts.master') {{-- This calls in the master view in the layout file. This is the template --}}

@section('title', 'Surveys - Index') {{-- This indicates the title --}}

@section('content') {{-- This calls the yield function in the master view, so all content is between the 'content' tag --}}

    <h1>All Surveys</h1> {{-- This is the title for the page --}}
    <div class="row">

    <section>
        @if (count($surveys) >= 1) {{-- If there are 1 or more surveys, show the table --}}

            <table class="small-12 large-12"> {{-- start the table --}}
                <tr>
                    <th>Creator</th> {{-- Header for table --}}
                    <th>Title</th> {{-- Header for table --}}
                    <th>Description</th> {{-- Header for table --}}
                    <th>Active</th> {{-- Header for table --}}
                    <th>Anonymous</th> {{-- Header for table --}}
                    <th>Edit</th>{{-- Header for table --}}
                    <th>Delete</th> {{-- Header for table --}}
                </tr>
                @foreach ($surveys as $survey) {{-- Table loops every survey result into a new line on the table --}}
                    <tr>
                        <td><a href="/admin/users/{{ $survey->creator_id }}/edit">{{ $survey->user->name}}</a></td> {{-- Show creators username, with link for admin to edit user --}}
                        <td><a href="/surveys/{{ $survey->id }}" name="{{ $survey->title }}">{{ $survey->title }}</a></td> {{-- Show survey title, with link to the survey --}}
                        <td>{{ $survey->description}}</td> {{-- Show the survey description --}}
                        <td>
                            @if ($survey->active == true)
                                <span class="label label-success" style="background-color:green;">Yes</span> {{-- If the survey is active, show 'Yes' inside of a green label --}}
                            @else
                                <span class="label label-danger" style="background-color:red;">No</span> {{-- If the survey is not active, show 'No' inside of a red label --}}
                            @endif
                        </td>
                        <td>
                            @if ($survey->anonymous == true)
                                <span class="label label-success" style="background-color:green;">Yes</span> {{-- If the survey results are anonymous, show 'Yes' inside of a green label --}}
                            @else
                                <span class="label label-danger" style="background-color:red;">No</span> {{-- If the survey results are  not anonymous, show 'No' inside of a red label --}}
                            @endif
                        </td>
                        <td><a href="/admin/surveys/{{ $survey->id }}/edit"><span class="label label-success" style="background-color:blue;">Edit</span></a></td> {{-- Edit button in blue that takes the user to the edit page --}}
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.surveys.destroy', $survey->id]]) !!} {{-- Delete button to delete the entry with the destroy function in the adminsurveycontroller --}}
                            {{ Form::submit('Delete', ['class' => 'label label-success', 'style' => 'background-colour:red;']) }}
                            {{ Form::close() }}
                        </td>

                    </tr>
                @endforeach
            </table>
        @else {{-- If less than 1 survey, shot 'no surveys added yet' --}}
            <p> no surveys added yet </p>
        @endif
    </section>

    {{ Form::open(array('action' => 'AdminSurveyController@create', 'method' => 'get')) }}
    <div class="row">
        {!! Form::submit('Add Survey', ['class' => 'button', 'style' => 'background-color: greenyellow; color: black']) !!} {{-- Green button to take the user to 'surveys/create/' --}}
    </div>
    {{ Form::close() }}
        </div>







@endsection {{-- End 'content' section --}}