@extends('admin.layouts.master')

@section('page_title','Customer')
@section('page_select','Customer Details')
@section('customer_select','active')
@section('container')

<div class="row my-2">
	<div class="col-md-12">
		<!-- DATA TABLE-->
		<div class="table-responsive m-b-40">
			<table class="table table-borderless table-data3">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{$customer->customer['name']}}</td>
						<td>{{$customer->customer['email']}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- END DATA TABLE-->
	</div>
</div>

@endsection