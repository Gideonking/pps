@extends('layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-body">
   <div class="col-lg-10">
   	

   

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
					Restore
				</th>
				<th>
					Destroy
				</th>

			</thead>

			<tbody>

			 @if($post->count() > 0 )
				
				@foreach($post as $post)
					<tr>

					    <td>
							<img src="{{$post->featured}}" width="90px" height="50px">
						</td>
						<td>
							{{$post->title}}
						</td>
						<td>
							<a href="{{ route('post.edit', ['id'=>$post->id])}}" class="btn btn-xs  btn-success">Edit</a>
						</td>
						<td>
							<a href="{{route ('post.restore', ['id'=>$post->id])}}" class="btn btn-xs btn-success">Restore</a>
						</td>
						<td>
							<a href="{{route ('post.kashe', ['id'=>$post->id])}}" class="btn btn-xs btn-danger">Delete</a>
						</td>

				@endforeach

			@else
			<tr>
				
			<th colspan="5" class="text-center"> No trashed posts</th>

			</tr>



			@endif
			</tbody>
				
						

			</table>

		
		
		
		</div>
		  	
  </div>
	

</div>


@stop