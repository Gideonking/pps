@extends('layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-body">
   <div class="col-lg-10">
   	
   		All Posts
   

			<table class="table table-hover">

			<thead>
				
				<th>
					Image
				</th>

				<th>
					Title
				</th>  

				<th>
					Edit
				</th>
				<th>
					Trashed
				</th>

			</thead>

			<tbody>
				@if($post->count() >0)

				@foreach($post as $post)
					<tr>


					    <td><img src="{{ $post->featured }}" width="90px" height="50px"> </td>
						<td>
							{{$post->title}}
						</td>
						<td>
							<a href="{{ route('post.edit', ['id'=>$post->id])}}" class="btn btn-info">Edit</a>
						</td>
						<td>
							<a href="{{route('post.delete', ['id'=>$post->id])}}" class="btn btn-danger">Trashed</a>
						</td>

						@endforeach

						@else

						<tr>
				
			<th colspan="5" class="text-center"> No Published Posts</th>

			</tr>

						@endif

			</tbody>
				
						

			</table>

		
		
		
		</div>
		  	
  </div>
	

</div>


@stop