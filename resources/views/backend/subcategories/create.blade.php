@extends('backendtemplate')
@section('content')
<div class="container">
	<div class="d-sm-flex align-items-center justify-content-center">
		<h1 class="h3 mb-0 text-gray-800">SubCategory Create Form</h1>

		
	</div>
	<form class="col-md-6 my-4" action="{{route('subcategories.store')}}" method="post" enctype="multipart/form-data">
		@csrf
		@error('name')
		    <div class="alert alert-danger">{{$message}}</div>
		@enderror
		
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Subategory Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="name">
			</div>
		</div>
		
		
		@error('category')
		    <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Category</label>
			<div class="col-sm-10">
				<select class="form-control form-control-md" id="inputCategory" name="category">
					<optgroup label="Choose Category">
						@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
						
					</optgroup>
					
				</select>
			</div>
		</div>
		
		<div class="form-group row">
			
			<input type="submit" class="btn btn-primary" value="Create" name="btnsubmit">
		</div>
	</form>
</div>
@endsection