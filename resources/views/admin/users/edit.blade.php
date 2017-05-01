@extends('layouts.master') {{-- This calls in the master view in the layout file. This is the template --}}

<title>Edit - {{ $user->name }}</title> {{-- Title --}}

@section('content') {{-- This calls the yield function in the master view, so all content is between the 'content' tag --}}

    <h1>Edit - {{ $user->name }}</h1> {{-- Title on page --}}


    {!! Form::model($user, ['method' => 'PATCH', 'url' => '/admin/users/' . $user->id]) !!} {{-- This is the update method, and opens the form --}}

    <div>
        {!! Form::label('name', 'Username:') !!} {{-- Form title for the username field --}}
        {!! Form::text('name', null) !!} {{-- Form email input field --}}
    </div>

    <div>
        {!! Form::label('email', 'Email Address:') !!} {{-- Form title for the email field --}}
        {!! Form::text('email', null) !!} {{-- Form email input field --}}
    </div>

    <div>
        {!! Form::label('roles', 'Roles:') !!} {{-- Form title for the roles field --}}
        @foreach($roles as $role) {{-- Loop to show every role with a checkbox --}}
            {{ Form::label($role->name) }}
            {{ Form::checkbox('role[]', $role->id, $user->roles->contains($role->id), ['id' => $role->id]) }} {{-- Checkbox to decide user roles --}}
        @endforeach

    </div>

    <div>
        {!! Form::submit('Update User and Roles', ['class' => 'button']) !!} {{-- Button to submit form --}}
    </div>


    {!! Form::close() !!} {{-- Close form --}}
    @endsection