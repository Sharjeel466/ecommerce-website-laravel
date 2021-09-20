@extends('admin.layouts.master')

@section('page_title','Categories')
@section('page_select','Categories')
@section('category_select','active')
@section('container')

{{-- <div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h3>Add Category</h3>
					</div>
					<div class="card-body">
						<form id="cat-form" action="{{url('admin/manage-category')}}" method="post">
							@csrf
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="category_name" class="control-label mb-1">Category Name</label>
										<input name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" autocomplete="off">
									</div>
								</div>
							</div> --}}

							{{-- <input type="hidden" name="id" value="{{@$id}}"/> --}}
							{{-- <div>
								<button type="submit" class="btn btn-lg btn-info btn-block">
									Submit
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>        
	</div>
</div> --}}

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
	Manage Category
</button>

<div class="row">
	<div class="col-md-12">
		<!-- DATA TABLE-->
		<div class="table-responsive m-b-40">
			<table class="table table-borderless table-data3">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody id="category_data">

				</tbody>
			</table>
		</div>
		<!-- END DATA TABLE-->
	</div>
</div>

@endsection