@extends('layouts.app')



@section('content')
	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			Update Category: {{$category->name}}
		</div>
		<div class="panel-body">
			<form action="{{ route('category.update', ['id'=>$category->id]) }}" method="post" accept-charset="utf-8">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Name of Category</label>
					<input type="text" name="name" value="{{ $category->name }}" class="form-control">
				</div>
				<div class="form-group">
					<div class="text-center">
					 	<button class="btn btn-success">Update Category</button>
					</div>
					
				</div>
			</form>
		</div>
	</div>
@stop