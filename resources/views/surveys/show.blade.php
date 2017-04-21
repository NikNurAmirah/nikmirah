@extends('layouts.master')

@section('content')

    <title>{{ $survey->title }}</title>

    <h1 class="row"><u>{{ $survey->title }}</u></h1>
    <p class="row">{{ $survey->description }}</p>

@endsection