@extends('layouts.app')


@section('content')
<div class="panel panel-default">
	
	<table class="table table-hover">
		<!-- <caption>Categories</caption> -->
		<thead>
			<tr>
				<th>Category</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
			<tbody>
				@if($tags->count()>0)
					@foreach($tags as $tag)
			
						<tr>
							<td>{{ $tag->tag }}</td>
							<td><a href="{{ route('tag.edit', ['id'=>$tag->id])}}" class="btn btn-success btn-sm" title="Edit">Edit</td>  
							<td><a href="{{ route('tag.delete', ['id'=>$tag->id]) }}" class="btn btn-danger btn-sm" title="Delete">Delete</a></td>
						
						</tr>
									
			
					@endforeach
				@else
					<tr>
						<th colspan="5" class="text-center">No Tag Found</th>
					</tr>
				@endif
		</tbody>
	</table>
</div>
@stop