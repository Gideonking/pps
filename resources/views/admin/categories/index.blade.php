@extends('layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-body">
   <div class="col-lg-10">
   	

   

			<table class="table table-hover">

			<thead>
			<tr>


				<th>
						Category Name
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

			@if($categories -> count() >0)

				@foreach($categories as $category)
					<tr>
						<td>
							{{$category->name}}
						</td>
						<td>
							<a href="{{route('category.edit',['id' => $category->id])}}" class="btn btn-xs btn-info">Edit</a>

						

						</td>

						<td>
							<a href="{{route('category.delete',['id' => $category->id])}}" class="btn btn-xs btn-danger">Delete</a>

							

						</td>


					</tr>
				@endforeach

				@else


			<tr>
				
			<th colspan="5" class="text-center"> No Categories yet</th>

			</tr>


				@endif

			</table>

		
		
		
		</div>
		  	
  </div>
	

</div>


@stop