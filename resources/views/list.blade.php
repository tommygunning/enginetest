@extends('layouts.app')

@section('content')

    @if (count($profiles) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Active Profiles
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Username</th>
                        <th>Created</th>
                        <th>Email</th>
                        <th>View</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($profiles as $profile )
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $profile->username }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $profile->created_at }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $profile->user->email }}</div>
                                </td>
                                <td>
                                     <div><a href="{{ url('/admin/view') }}/{{ $profile->id }}">View</a></div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                         </table>
            </div>
        </div>
    @endif
@endsection