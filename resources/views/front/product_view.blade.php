@extends('layouts.front_layout')
@section('container')
<!-- product category -->
<section id="aa-product-details">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="aa-product-details-area">
					<div class="aa-product-details-content">
						<div class="row">
							<!-- Modal view slider -->
							<div class="col-md-5 col-sm-5 col-xs-12">                              
								<div class="aa-product-view-slider">                                
									<div id="demo-1" class="simpleLens-gallery-container">
										<div class="simpleLens-container">
											@if ($product->image == null)
											<div class="simpleLens-big-image-container"><a data-lens-image="{{ asset('public/no-image.png') }}" class="simpleLens-lens-image"><img src="{{ asset('public/no-image.png') }}" class="simpleLens-big-image"></a>
											</div>
											@else
											<div class="simpleLens-big-image-container"><a data-lens-image="{{ asset('storage/app/products/'.$product->image) }}" class="simpleLens-lens-image"><img src="{{ asset('storage/app/products/'.$product->image) }}" class="simpleLens-big-image"></a>
											</div>
											@endif
										</div>
									</div>
								</div>
							</div>
							<!-- Modal view content -->
							<div class="col-md-7 col-sm-7 col-xs-12">
								<div class="aa-product-view-content">
									<h3><strong>{{$product->name}}</strong></h3>
									<div class="aa-price-block">
										<span class="aa-product-view-price"><strong>Rs:</strong> {{$product->price}}/-</span>
									</div>
									<p><strong>Description</strong>: <span>{{$product->description}}</span></p>
									<strong>Category</strong>: <u><a href="{{ url('product_list/'.$product->category_id) }}">{{$product->category->name}}</a></u>
									
									<form action="{{ url('add-to-cart/'.$product->id) }}" method="POST">
										@csrf
										<div class="aa-prod-quantity">
											<select name="product_qty">
												@for ($i = 1; $i <= 6; $i++)
												<option value="{{$i}}">{{$i}}</option>
												@endfor
											</select>
										</div>
										<input type="hidden" name="product_id" value="{{$product->id}}">
										<div class="aa-prod-view-bottom">
											@if (Auth::user())
											<button class="aa-add-to-cart-btn" type="submit">Add To Cart</button>
											@else
											<a href="javascript:void(0)" class="aa-add-to-cart-btn" data-toggle="modal" data-target="#login-modal">Login to Purchase Product</a>
											@endif
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>
					<!-- Related product -->
					<div class="aa-product-related-item">
						<h3>Related Products</h3>
						<ul class="aa-product-catg aa-related-item-slider">
							<!-- start single product item -->
							@foreach ($related_product as $list)
							<li>
								<figure>
									@if ($list->image == null)
									<a class="aa-product-img" href="javascript:void(0)"><img width="240px" height="300px" src="{{ asset('public/no-image.png') }}" alt="polo shirt img">
									</a>
									@else
									<a class="aa-product-img" href="{{ url('product-details/'.$list->name.'/'.$list->id) }}"><img width="240px" height="300px" src="{{ asset('storage/app/products/'.$list->image) }}" alt="polo shirt img">
									</a>
									@endif
									<figcaption>
										<h4 class="aa-product-title"><a href="#">{{$list->name}}</a></h4>
										<span class="aa-product-price">Rs: {{$list->price}}/-</span>
									</figcaption>
								</figure>
							</li>                                                                                
							@endforeach
						</ul>   
					</div>  
				</div>
			</div>
		</div>
	</div>
</section>
<!-- / product category -->

@endsection