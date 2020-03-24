@extends('layouts.app')



@section('content')
	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			Create New Tag
		</div>
		<div class="panel-body">
			<form action="{{ route('tag.store') }}" method="post" accept-charset="utf-8">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="tag">Name of Tag</label>
					<input type="text" name="tag" class="form-control">
				</div>
				<div class="form-group">
					<div class="text-center">
					 	<button class="btn btn-success">Create Tag</button>
					</div>
					
				</div>
			</form>
		</div>
	</div>
@stop