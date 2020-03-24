@extends('layouts.app') 
@section('content')
    @include('admin.includes.errors')
<div class="panel panel-default">
    <div class="panel-heading text-center">
        Update Blog Setting
    </div>
    <div class="panel-body">
        <form action="{{ route('settings.update') }}" method="post" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="Site Name">Name</label>
                <input type="text" name="site_name" class="form-control" value="{{ $settings->site_name }}">
            </div>
            <div class="form-group">
                <label for="Address">Email</label>
                <input type="text" name="address" class="form-control" value="{{ $settings->address }}">
            </div>
            <div class="form-group">
                <label for="Contact Number">Email</label>
                <input type="text" name="contact_number" class="form-control" value="{{ $settings->contact_number }}">
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" name="contact_email" class="form-control" value="{{ $settings->contact_email }}">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success">Update Site Settings</button>
                </div>

            </div>
        </form>
    </div>
</div>









































@stop