@extends('admin.layouts.master')

@section('page_title','Dashboard')
@section('page_select','Dashboard')
@section('dashboard_select','active')
@section('container')

<div class="row m-t-25">
	<div class="col-sm-6 col-lg-3">
		<div class="overview-item overview-item--c1">
			<div class="overview__inner">
				<div class="overview-box clearfix">
					<div class="icon">
						<i class="zmdi zmdi-account-o"></i>
					</div>
					<div class="text">
						<h2>{{count($customer)}}</h2>
						<span>members</span>
					</div>
				</div>
				<div class="overview-chart">
					<canvas id="widgetChart1"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection