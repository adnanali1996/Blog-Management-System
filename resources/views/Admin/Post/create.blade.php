@extends('layouts.app') 
@section('styles')
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet"> 
@stop 
@section('content')
	@include('admin.includes.errors')
<div class="panel panel-default">
	<div class="panel-heading">
		Create New Post
	</div>
	<div class="panel-body">
		<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="Title">Title</label>
				<input type="text" name="title" value="" class="form-control">
			</div>
			<div class="form-group">
				<label for="Feature Image">Featured Image</label>
				<input type="file" name="featured" class="form-control">
			</div>
			<div class="form-group">
				<label for="category">Select Category</label>
				<select class="form-control" name="category_id">
							<option value="">Select Category</option>}
						@foreach($categories as $cat)
							
							<option value="{{ $cat->id }}">{{ $cat->name }}</option>}
						@endforeach
					</select>
			</div>
			<div class="form-group">
				<label for="tag">Select Tags</label> @foreach($tags as $tag)
				<div class="checkbox">
					<label><input type="checkbox" name="tags[]" value="{{ $tag->id}}"> {{ $tag->tag}}</label
						</div>
					@endforeach
				</div>
				<div class="form-group">
					<label for="content">Content</label>
					<textarea name="content" id="summernote" class="form-control summernote"></textarea>
					<script>
						$(document).ready(function() {
							$('.summernote').summernote();
							console.log("d");
						});
					</script>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success">Store Post</button>
					</div>

				</div>
		</form>
		</div>
	</div>






	
@stop 
@section('scripts')
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>


	
@stop