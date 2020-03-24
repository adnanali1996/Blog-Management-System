@extends('layouts.app')



@section('content')
	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			Create New User
		</div>
		<div class="panel-body">
			<form action="{{ route('user.store') }}" method="post" accept-charset="utf-8">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="tag">Name</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="tag">Email</label>
					<input type="email" name="email" class="form-control">
				</div>
				<div class="form-group">
					<div class="text-center">
					 	<button class="btn btn-success">Create User</button>
					</div>
					
				</div>
			</form>
		</div>
	</div>
@stop