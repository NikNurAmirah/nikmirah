@extends('layouts.master')

<title>Edit - {{ $user->name }}</title>

@section('content')
    <h1>Edit - {{ $user->name }}</h1>


    <!-- form goes here -->
    {!! Form::model($user, ['method' => 'PATCH', 'url' => '/admin/users/' . $user->id]) !!}

    <div>
        {!! Form::label('name', 'Username:') !!}
        {!! Form::text('name', null) !!}
    </div>

    <div>
        {!! Form::label('email', 'Email Address:') !!}
        {!! Form::text('email', null) !!}
    </div>

    <div>
        {!! Form::label('roles', 'Roles:') !!}
        @foreach($roles as $role)
            {{ Form::label($role->name) }}
            {{ Form::checkbox('role[]', $role->id, $user->roles->contains($role->id), ['id' => $role->id]) }}
        @endforeach

    </div>

    <div>
        {!! Form::submit('Update User and Roles') !!}
    </div>


    {!! Form::close() !!}
    @endsection