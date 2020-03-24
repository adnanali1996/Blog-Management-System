@extends('layouts.app')


@section('content')
<div class="panel panel-default">
	<table class="table table-hover">
		<!-- <caption>Categories</caption> -->
		<thead>
			<tr>
				<th>Image</th>
				<th>Title</th>
				<th>Edit</th>
				<th>Trash</th>
			</tr>
		</thead>
		
		<tbody>
			@if($posts->count()>0)
						
				@foreach($posts as $post)
					
						<tr>
							<th><img src="{{ $post->featured }}" width="110px" height="80px" alt="{{ $post->title }}"></th>
							<td>{{ $post->title }}</td>
							<td><a href="{{ route('post.edit', ['id'=>$post->id])}}" class="btn btn-success btn-sm" title="Edit">Edit</td>  
							<td><a href="{{ route('post.delete', ['id'=>$post->id]) }}" class="btn btn-danger btn-sm" title="Trash">Trash</a></td>
						
						</tr>	
				@endforeach
			@else
						<tr>
							<th colspan="5" class="text-center"> No Published Post</th>
						</tr>
			@endif
		</tbody>
	</table>
</div>
@stop