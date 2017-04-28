@extends('layouts.master')

@section('banner')
<a href="/"><h1 class="col-lg-12 custom-banner">Survey System</h1></a>
<div style="width: 100%; height: 4px; margin: 0; background-color:#333333;"></div>
    @endsection

@section('content')
    <br>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <br>
                <a class="button" style="float:right; background-color: greenyellow; color: black;" href="/surveys/create">Create Surveys</a>
                <h2 class="panel-body">
                    <a href="/surveys/create">Create a Survey Now!</a>
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
                    <a class="button" style="float:right;" href="/surveys">Manage Surveys</a>
                    <h2 class="panel-body">
                        <a href="/surveys">Manage Surveys!</a>
                    </h2>
                    <br>

                </div>
            </div>
        </div>
    </div>

@endsection
