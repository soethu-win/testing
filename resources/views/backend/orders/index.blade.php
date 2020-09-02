@extends('backendtemplate')
@section('content')
<div class="container">
	<div class="d-sm-flex align-items-center justify-content-between">
		<h1 class="h3 mb-0 text-gray-800 ">Order List</h1>

		
	</div>
</div>


<div class="container">
	

	<div class="row">

		<div class="col-md-12">

			<table class="table table-bordered">
				<thead class="bg-dark text-white">
					<tr>
						<th>Voucher No</th>
						<th>User</th>
						
						<th>Total</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach ($orders as $order)
					<tr>
						
						<td>{{$order->voucherno}}</td>
						<td>{{$order->user_id}}</td>
						<td>{{$order->total}}</td>
						<td>
							<a href="" class="btn btn-info">Detail</a>
							
						</td>
					</tr>
					@endforeach
					

				</tbody>
			</table>
		</div>
	</div>
</div>


@endsection