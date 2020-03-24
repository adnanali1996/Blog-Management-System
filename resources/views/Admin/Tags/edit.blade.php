@extends('layouts.app')



@section('content')
	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			Update Category: {{$tag->name}}
		</div>
		<div class="panel-body">
			<form action="{{ route('tag.update', ['id'=>$tag->id]) }}" method="post" accept-charset="utf-8">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Name of Tag</label>
					<input type="text" name="tag" value="{{ $tag->tag }}" class="form-control">
				</div>
				<div class="form-group">
					<div class="text-center">
					 	<button class="btn btn-success">Update Tag</button>
					</div>
					
				</div>
			</form>
		</div>
	</div>
@stop