@extends('layouts.app')
<?php
        $is_admin = Auth::user()->admin;
        
?>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><?php if( $is_admin ) echo "Admin "; ?>Dashboard</div>

                <div class="panel-body">
                @if (session('status'))
    <div class="alert alert-warning">
        {{ session('status') }}
    </div>
@endif
               
                    You are logged in!
                    <?php if( empty( $profile->id )): ?>
                    <div>You haven't created a profile yet! <a class="btn btn-link" href="{{ url('/profile/create') }}">Create one now</a></div>
                    <?php endif; ?>
                       <?php if( !empty( $is_admin )): ?>
                    <div>View Profiles:  <a class="btn btn-link" href="{{ url('/admin') }}">here</a></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
