@extends('front.layouts.master')
@section('container')
<!-- Start slider -->
<section id="aa-slider">
	<div class="aa-slider-area">
		<div id="sequence" class="seq">
			<div class="seq-screen">
				<ul class="seq-canvas">
					@foreach ($product as $list)
					<!-- single slide item -->
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
			<!-- slider navigation btn -->
			<fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
				<a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
				<a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
			</fieldset>
		</div>
	</div>
</section>
<!-- / slider -->
<!-- Products section -->

<div class="container">

	<div class="tab-content">
		<!-- Start men product category -->
		<div class="tab-pane fade in active" id="men">
			<ul class="aa-product-catg">
				@foreach ($product as $list)
				<li style="margin-top: 50px;">
					<figure>
						@if (Session::has('user'))
						<a class="aa-product-img" href="{{ url('product-details/'.$list->id) }}"><img width="240px" height="300px" src="{{ asset('public/admin_assets/images/products/'.$list->image) }}" alt="polo shirt img"></a>
						@else
						<a class="aa-product-img"><img width="240px" height="300px" src="{{ asset('public/admin_assets/images/products/'.$list->image) }}" onclick="login()" alt="polo shirt img"></a>
						@endif
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

@foreach ($product as $list)
<div class="modal fade" id="quick-view-modal-{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">                      
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<div class="row">
					<!-- Modal view slider -->
					<div class="col-md-6 col-sm-6 col-xs-12">                              
						<div class="aa-product-view-slider">                                
							<div class="simpleLens-gallery-container" id="demo-1">
								<div class="simpleLens-container">
									<div class="simpleLens-big-image-container">
										<a class="simpleLens-lens-image" data-lens-image="{{ asset('public/admin_assets/images/products/'.$list->image) }}">
											<img src="{{ asset('public/admin_assets/images/products/'.$list->image) }}" class="simpleLens-big-image">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Modal view content -->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="aa-product-view-content">
							<p>Product Name: <strong>{{$list->name}}</strong></p>
							<div class="aa-price-block">
								<span class="aa-product-view-price">Price: <strong>{{$list->price}}</strong>/-</span>
							</div>
							<p>Description: <strong>{{$list->desc}}</strong></p>
							<div class="aa-prod-view-bottom">
								<a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
								<a href="#" class="aa-add-to-cart-btn">View Details</a>
							</div>
						</div>
					</div>
				</div>
			</div>                        
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- / quick view modal -->
@endforeach

@endsection