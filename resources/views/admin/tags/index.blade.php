@extends('layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-body">
   <div class="col-lg-10">
   	

   

			<table class="table table-hover">

			<thead>
			<tr>


				<th>
						Tag Name
					</th>

					<th>
						Editing 
					</th>  

					<th>
						Deleting 
					</th>
					
				</tr>
				
				

			</thead>

			<tbody>
				

			</tbody>

			@if($tags -> count() >0)

				@foreach($tags as $tag)
					<tr>
						<td>
							{{$tag->tag}}
						</td>
						<td>
							<a href="{{route('tag.edit',['id' => $tag->id])}}" class="btn btn-xs btn-info">Edit</a>

						

						</td>

						<td>
							<a href="{{route('tag.delete',['id' => $tag->id])}}" class="btn btn-xs btn-danger">Delete</a>

							

						</td>


					</tr>
				@endforeach

				@else


			<tr>
				
			<th colspan="5" class="text-center"> No tags yet</th>

			</tr>


				@endif

			</table>

		
		
		
		</div>
		  	
  </div>
	

</div>


@stop