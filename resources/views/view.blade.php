@extends('layouts.app')

@section('content')
        <div class="panel panel-default">
            <div class="panel-heading">
                Profile # {{$profile->id}}
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">                 
                        <tr><th>User id</th><td>{{ $profile->user->id }}</td></tr>
                        <tr><th>Email</th><td>{{ $profile->user->email }}</td></tr>
                        <tr><th>Created</th><td>{{ $profile->created_at }}</td></tr>
                        <tr><th>User joined</th><td>{{ $profile->user->created_at }}</td></tr>
                        <tr><th>Username</th><td>{{ $profile->username }}</td></tr>
                        <tr><th> Real name</th><td>{{ $profile->user->name }}</td></tr>
                        <tr><th>Description</th><td>{{ $profile->description }}</td></tr>
                </table>
                    <div><a href="{{ url('/admin/') }}">Return to profile list</a></div>

            </div>

        </div>
            
@endsection
