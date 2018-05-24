@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="panel panel-default">
	<div class="panel-heading">
	Edit your profile
		
	</div>


	<div class="panel-body">
		<form action="{{ route('user.profile.update', $user->id)}}" method="post" enctype="multipart/form-data">
			
		{{csrf_field()}}

		<div class="form-group">
			<label for="name">Username</label>
			<input type="text" name="name" value="{{ $user->name}}" class="form-control">
		</div>

		<div class="form-group">
			<label for="name">Email</label>
			<input type="emai" name="email" value="{{ $user->email}}" class="form-control">
		</div>

		<div class="form-group">
			<label for="name">New Password</label>
			<input type="password" name="password" value="{{ $user->password}}" class="form-control">
		</div>

		<div class="form-group">
			<label for="name">Upload new avatar</label>
			<input type="file" name="avatar" value="" class="form-control">
		</div>

		<div class="form-group">
			<label for="name">facebook Profile</label>
			<input type="url" name="facebook" value="" class="form-control">
		</div>

		<div class="form-group">
			<label for="name">Youtube Profile</label>
			<input type="url" name="youtube" value=""  class="form-control">
		</div>


		<div class="form-group">
			<label for="name">About</label>
			<textarea name="about" id="" value="" cols="6" rows="6" class="form-control"> </textarea>
		</div>

		
		
			<div class="form-group">
			 	<div class="text-center">
			 	
			 	<button class="btn btn-success" type="submit">
			 		Update User Profile
			 	</button>
			 	</div>
			 </div>
		</form>
	</div>
</div>


@stop