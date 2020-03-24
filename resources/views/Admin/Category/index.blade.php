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
				@if($categoris->count()>0)
					@foreach($categoris as $cat)
			
						<tr>
							<td>{{ $cat->name }}</td>
							<td><a href="{{ route('category.edit', ['id'=>$cat->id])}}" class="btn btn-success btn-sm" title="Edit">Edit</td>  
							<td><a href="{{ route('category.delete', ['id'=>$cat->id]) }}" class="btn btn-danger btn-sm" title="Delete">Delete</a></td>
						
						</tr>
									
			
					@endforeach
				@else
					<tr>
						<th colspan="5" class="text-center">No Category Found</th>
					</tr>
				@endif
		</tbody>
	</table>
</div>
@stop