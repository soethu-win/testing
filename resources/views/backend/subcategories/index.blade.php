@extends('backendtemplate')
@section('content')
<div class="container">
	<div class="d-sm-flex align-items-center justify-content-between">
		<h1 class="h3 mb-0 text-gray-800 ">SubCategory List</h1>

		<a href="{{route('subcategories.create')}}" class="btn btn-info ">Add New</a>
	</div>
</div>


<div class="container">
	

	<div class="row">

		<div class="col-md-12">

			<table class="table table-bordered">
				<thead class="bg-dark text-white">
					<tr>
						<th>No</th>
						
						<th>Name</th>
						

						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@php $i=1; @endphp
					@foreach ($subcategories as $subcategory)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$subcategory->name}}</td>
						
						<td>
							<a href="" class="btn btn-info">Detail</a>
							<a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-warning">Edit</a>
							<a href="" class="btn btn-danger">Delete</a>
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>


@endsection