@extends('layouts.front_layout')
@section('container')
<!-- Start slider -->
{{-- @if(session()->has('msg'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
	{{session('msg')}}  
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
</div> 
@endif --}}

<section id="aa-slider">
	<div class="aa-slider-area">
		<div id="sequence" class="seq">
			<div class="seq-screen">
				<ul class="seq-canvas">
					@foreach ($product as $list)
					<li>
						<div class="seq-model">
							<img data-seq src="{{ asset('public/admin_assets/images/products/'.$list->image) }}" alt="Men slide img" />
						</div>
						<div class="seq-title">                
							<h2 data-seq>{{$list->name}}</h2>                
						</div>
					</li>                  
					@endforeach
				</ul>
			</div>
			<fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
				<a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
				<a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
			</fieldset>
		</div>
	</div>
</section>

<div class="container">

	<div class="tab-content">
		<div class="tab-pane fade in active" id="men">
			<ul class="aa-product-catg">
				@foreach ($product as $list)
				<li style="margin-top: 50px;">
					<figure>
						<a class="aa-product-img" href="{{ url('product-details/'.$list->id) }}"><img width="240px" height="300px" src="{{ asset('public/admin_assets/images/products/'.$list->image) }}" alt="polo shirt img"></a>
						<figcaption>
							<h4 class="aa-product-title">{{$list->name}}</h4>
							<span class="aa-product-price">Rs : {{$list->price}}/-</span>
						</figcaption>
					</figure>
				</li>                        
				@endforeach
			</ul>
		</div>
	</div>
</div>

@endsection