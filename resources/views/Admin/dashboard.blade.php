@extends('layouts.app') 
@section('content') {{--
<div class="card ">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif You are logged in!
    </div> --}}
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                POSTED
            </div>
            <div class="panel-body">
                <h1 class="text-center">{{ $posted_count }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-danger">
            <div class="panel-heading text-center">
                TRASHED POSTS
            </div>
            <div class="panel-body">
                <h1 class="text-center">{{ $trashed_count }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                USERS
            </div>
            <div class="panel-body">
                <h1 class="text-center">{{ $users_count }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                CATEGORIES
            </div>
            <div class="panel-body">
                <h1 class="text-center">{{ $categories_count }}</h1>
            </div>
        </div>
    </div>
@endsection