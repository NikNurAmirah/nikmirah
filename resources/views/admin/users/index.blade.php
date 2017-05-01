@extends('layouts.master') {{-- This calls in the master view in the layout file. This is the template --}}

@section('title', 'Users - Index') {{-- This indicates the title --}}

@section('content') {{-- This calls the yield function in the master view, so all content is between the 'content' tag --}}
    <h1>All Users</h1>

    <section>
        @if (isset ($users))

            <table class="small-12 large-12"> {{-- start the table --}}
                <tr>
                    <th>Username</th> {{-- Header for table --}}
                    <th>E-Mail</th> {{-- Header for table --}}
                    <th>Permissions</th> {{-- Header for table --}}
                    <th>Edit</th> {{-- Header for table --}}
                </tr>
                @foreach ($users as $user) {{-- Table loops every user result into a new line on the table --}}
                    <tr>
                        <td><a href="/admin/users/{{ $user->id }}/edit" name="{{ $user->name }}">{{ $user->name }}</a></td> {{-- Show username, with link for admin to edit user --}}
                        <td> {{ $user->email }}</td> {{-- Users email --}}
                        <td>
                            <ul>
                                @foreach($user->roles as $role)
                                    <li>{{ $role->label }}</li> {{-- list every users role --}}
                                @endforeach
                            </ul>
                        </td>
                        <td><a href="/admin/users/{{ $user->id }}/edit"><span class="label label-success" style="background-color:blue;">Edit</span></a></td> {{-- Edit button in blue that takes the user to the edit page --}}
                    </tr>
                @endforeach
            </table>
        @else
            <p>no users</p> {{-- If no users, show 'no users' --}}
        @endif
    </section>

@endsection