@extends('layouts.admin_layout')

@section('page_title','Products')
@section('page_select','Products')
@section('product_select','active')
@section('container')

@if(session()->has('msg'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
	{{session('msg')}}  
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
</div> 
@endif                     

<a href="{{url('admin/product-create')}}">
	<button type="button" class="btn btn-success">
		Add Product
	</button>
</a>
<div class="row my-2">
	<div class="col-md-12">
		<!-- DATA TABLE-->
		<div class="table-responsive m-b-40">
			<table class="table table-borderless table-data3">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php
					$n = 1;
					@endphp
					@foreach($product as $list)
					<tr>
						<td>@php echo $n++; @endphp</td>
						<td>{{$list->name}}</td>
						{{-- {{dd($list)}} --}}
						@if ($list->image == null)
						<td><img style="width: 50px; height: 50px" class="img-fluid" src="{{asset('public/no-image.png')}}"/></td>
						@else
						<td><img style="width: 50px; height: 50px" class="img-fluid" src="{{asset('storage/app/products/'.$list->image)}}"/></td>
						@endif
						<td>
							<a href="{{url('admin/product-edit')}}/{{$list->id}}"><button type="button" class="btn btn-success btn-sm">Edit</button></a>

							<a href="{{url('admin/product-delete')}}/{{$list->id}}"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- END DATA TABLE-->
	</div>
</div>

@endsection