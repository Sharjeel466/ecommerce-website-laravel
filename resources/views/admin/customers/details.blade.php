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
						<th>Orders</th>
						<th>Date</th>
						<th>Total Amount</th>
						<th>Payment Method</th>
						<th>Orders Details</th>
					</tr>
				</thead>
				<div class="card">
					<div class="card-body">
						<label>Customer Name:</label>&nbsp;&nbsp;
						<strong>{{$customer[0]->user->name}}</strong>
					</div>
				</div>
				@php
				$n = 1;
				@endphp
				<tbody>
					@foreach ($customer as $key => $list)
					<tr>
						<td>{{$n++}}</td>
						<td>{{$list->date}}</td>
						<td>{{$list->total_amount}}</td>
						<td>{{$list->payment_method}}</td>
						<td><a class="btn btn-sm btn-info" href="{{ url('admin/order-detail/'.$list->id) }}">Details</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- END DATA TABLE-->
	</div>
</div>

@endsection