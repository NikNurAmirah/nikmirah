@extends('layouts.master')

@section('title', 'Users - Index')

@section('content')
    <h1>All Users</h1>

    <section>
        @if (isset ($users))

            <table class="small-12 large-12">
                <tr>
                    <th>Username</th>
                    <th>E-Mail</th>
                    <th>Permissions</th>
                    <th>Edit</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td><a href="/admin/users/{{ $user->id }}/edit" name="{{ $user->name }}">{{ $user->name }}</a></td>
                        <td> {{ $user->email }}</td>
                        <td>
                            <ul>
                                @foreach($user->roles as $role)
                                    <li>{{ $role->label }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td><a href="/admin/users/{{ $user->id }}/edit"><span class="label label-success" style="background-color:blue;">Edit</span></a></td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>no users</p>
        @endif
    </section>

@endsection