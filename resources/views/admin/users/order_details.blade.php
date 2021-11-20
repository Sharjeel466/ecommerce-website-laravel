@extends('layouts.admin_layout')

@section('page_title','User')
@section('page_select','User Details')
@section('user_select','active')
@section('container')

<div class="row my-2">
	<div class="col-md-12">
		<!-- DATA TABLE-->
		<div class="table-responsive m-b-40">
			<table class="table table-borderless table-data3">
				<thead>
					<tr>
						<th>#</th>
						<th>Product Name</th>
						<th>Product Image</th>
						<th>Product Price</th>
						<th>Product Quantity</th>
					</tr>
				</thead>
				@php
				$n = 1;
				@endphp
				<tbody>
					@foreach ($order_details as $key => $list)
					<tr>
						<td>{{$n++}}</td>
						<td>{{$list->product->name}}</td>
						<td><img style="width: 50px; height: 50px" class="img-fluid" src="{{asset('public/admin_assets/images/products/'.$list->product->image)}}"/></td>
						<td>{{$list->product->price}}</td>
						<td>{{$list->product_qty}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- END DATA TABLE-->
	</div>
</div>

@endsection