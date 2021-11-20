@extends('layouts.admin_layout')

@section('page_title','Categories')
@section('page_select','Categories')
@section('category_select','active')
@section('container')

<button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#add_category">
	Add Category
</button>

<div class="row">
	<div class="col-md-12">
		<div class="table-responsive m-b-40">
			<table class="table table-borderless table-data3">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="category_data">

				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection