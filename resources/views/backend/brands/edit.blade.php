@extends('backendtemplate')
@section('content')
<div class="container">
	<div class="d-sm-flex align-items-center justify-content-center">
		<h1 class="h3 mb-0 text-gray-800">Brand Edit Form</h1>

		
	</div>
	<form class="col-md-6 my-4" action="{{route('brands.update',$brand->id)}}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		@error('name')
		    <div class="alert alert-danger">{{$message}}</div>
		@enderror
		
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label"> Brand Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="name" value="{{$brand->name}}">
			</div>
		</div>
		@error('photo')
		    <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Photo</label>
			<div class="col-sm-10">
				<input type="file" class="form-control" name="photo" ><img src="{{asset($brand->photo)}}" class="img-fluid w-50">
				<input type="hidden" name="oldphoto" value="{{$brand->photo}}">
			</div>
		</div>
		<div class="form-group row">
			
			<input type="submit" class="btn btn-primary" value="Update" name="btnsubmit">
		</div>
	</form>
</div>
@endsection