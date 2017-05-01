@extends('layouts.master') {{-- This calls in the master view in the layout file. This is the template --}}

@section('title', 'Welcome!') {{--title--}}

@section('banner') {{--banner is yielded from the master layout, it shows a nice banner to welcome the user on the welcome page --}}
<a href="/"><h1 class="col-lg-12 custom-banner">Survey System</h1></a>
<div style="width: 100%; height: 4px; margin: 0; background-color:#333333;"></div>{{--Overlays text over the banner photo--}}
    @endsection

@section('content') {{-- This calls the yield function in the master view, so all content is between the 'content' tag --}}
    <br>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <br>
                <a class="button" style="float:right; background-color: greenyellow; color: black;" href="/surveys/create">Create Surveys</a> {{--link to create a new survey--}}
                <h2 class="panel-body">
                    <a href="/surveys/create">Create a Survey Now!</a>{{--button to create new survey --}}
                </h2>
                <br>
            </div>
        </div>
    </div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <br>
                    <a class="button" style="float:right;" href="/surveys">Manage Surveys</a> {{--Link to survey index--}}
                    <h2 class="panel-body">
                        <a href="/surveys">Manage Surveys!</a> {{--button linked to survey index--}}
                    </h2>
                    <br>

                </div>
            </div>
        </div>
    </div>

@endsection
