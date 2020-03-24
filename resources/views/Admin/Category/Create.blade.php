@extends('layouts.app')



@section('content')
	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			Create New Category
		</div>
		<div class="panel-body">
			<form action="{{ route('category.store') }}" method="post" accept-charset="utf-8">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Name of Category</label>
					<input type="text" name="name" value="" class="form-control">
				</div>
				<div class="form-group">
					<div class="text-center">
					 	<button class="btn btn-success">Store Category</button>
					</div>
					
				</div>
			</form>
		</div>
	</div>
@stop