@extends('layouts.admin_layout')

@section('page_title','User')
@section('page_select','User')
@section('user_select','active')
@section('container')

<div class="row my-2">
	<div class="col-md-12">
		<div class="table-responsive m-b-40">
			<table class="table table-borderless table-data3">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php
					$n = 1;
					@endphp
					@foreach($users as $list)
					<tr>
						<td>@php echo $n++; @endphp</td>
						<td>{{$list->name}}</td>
						<td>{{$list->email}}</td>
						@if ($list['order'] == '')
						<td>No Orders Yet</td>
						@else
						<td><a class="btn btn-sm btn-warning" href="{{ url('admin/user-detail/'.$list->id) }}">View</a></td>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection