@extends('layouts.app') 
@section('styles')
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet"> 
@stop 
@section('content')
	@include('admin.includes.errors')
<div class="panel panel-default">
	<div class="panel-heading text-center">
		Update Your Profile
	</div>
	<div class="panel-body">
		<form action="{{ route('user.profile.update') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="tag">Name</label>
				<input type="text" name="name" value="{{$user->name}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="tag">Email</label>
				<input type="email" name="email" value="{{$user->email}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="tag">New Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label for="tag">Upload New Avatar</label>
				<input type="file" name="avatar" class="form-control">
			</div>
			<div class="form-group">
				<label for="tag">Facebook Profile</label>
				<input type="text" name="facebook" value="{{ $user->profile->facebook }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="tag">Youtube Profile</label>
				<input type="text" name="youtube" value="{{ $user->profile->youtube }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="about">About</label>
				<textarea name="about" id="about" class="form-control">{{ $user->profile->about }}</textarea>
				<script>
					$(document).ready(function() {
							$('#about').summernote();
								
							});
				</script>
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success">Update Profile</button>
				</div>

			</div>
		</form>
	</div>
</div>






@stop 
@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>





@stop