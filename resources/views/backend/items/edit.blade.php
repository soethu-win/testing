@extends('backendtemplate')
@section('content')
<div class="container">
	<div class="d-sm-flex align-items-center justify-content-center">
		<h1 class="h3 mb-0 text-gray-800">Item Edit Form</h1>

		
	</div>
	<form class="col-md-6 my-4" action="{{route('items.update',$item->id)}}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		@error('codeno')
		    <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Code No</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="codeno" value="{{$item->codeno}}" readonly="readonly">
			</div>
		</div>
		@error('name')
		    <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="name" value="{{$item->name}}">
			</div>
		</div>
		@error('photo')
		    <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Photo</label>
			<div class="col-sm-10">
				<input type="file" class="form-control" name="photo" ><img src="{{asset($item->photo)}}" class="img-fluid w-50">
				<input type="hidden" name="oldphoto" value="{{$item->photo}}">
			</div>
		</div>
		@error('price')
		    <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Price</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" name="price" value="{{$item->price}}">
			</div>
		</div>
		@error('discount')
		    <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Discount</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" name="discount" value="{{$item->discount}}">
			</div>
		</div>
		@error('description')
		    <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Description</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="description">{{$item->description}}</textarea>
			</div>
		</div>
		@error('brand')
		    <div class="alert alert-danger">{{$message}}</div>
		@enderror
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Brand</label>
			<div class="col-sm-10">
				<select class="form-control form-control-md" id="inputBrand" name="brand">
					<optgroup label="Choose Brand">
						@foreach($brands as $brand)

						{{-- @if (old('brand') == $brand->id)
						<option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
						@else
						<option value="{{ $brand->id }}">{{ $brand->name }}</option>
						@endif --}}



						{{-- <option value="{{ $brand->id}}" {{ (Input::old("brand") == $brand->id ? "selected":"") }}>{{ $brand->name }}</option> --}}

						<option {{ old('brand',$brand->id) == $brand->id? "selected" : "" }} value="{{ $brand->id }}">{{$brand->name}}</option>

						{{--  <option value="{{$brand->id}}" {{(old('brand')==$brand->id)? 'selected':''}}>{{$brand->name}}</option> --}}

						{{--  <option value="{{$brand->id}}"  {{ old('brand',$brand) == '$brand->id' ? 'selected' : '' }}>
                                {{$brand->name}}
                          </option>
 --}}
                          {{-- <option value="{{$brand->id}}" @if (old('brand') == '$brand->id') selected="selected" @endif>{{$brand->name}}</option> --}}
                          
                         {{--  <option value="{{$brand->id}}" {{in_array($brand->id, old("brand") ?: []) ? "selected": ""}}>{{$brand->name}}</option> --}}
                         
						@endforeach
						

					</optgroup>

				</select>
			</div>
		</div>
		@error('subcategory')
		    <div class="alert alert-danger">{{$message}}</div>
		@enderror

		<div class="form-group row">

			<label class="col-sm-2 col-form-label">Subcategory</label>

			<div class="col-sm-10">
				<select class="form-control form-control-md" id="inputSubcategory" name="subcategory">
					<optgroup label="Choose Subcategory">
						@foreach($subcategories as $subcategory)
						<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
						@endforeach

					</optgroup>

				</select>
			</div>
		</div>
		<div class="form-group row">
			
			<input type="submit" class="btn btn-primary" value="Update" name="btnsubmit">
		</div>
	</form>
</div>
@endsection