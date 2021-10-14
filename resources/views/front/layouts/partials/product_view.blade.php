@extends('front.layouts.master')
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
											<div class="simpleLens-big-image-container"><a data-lens-image="{{ asset('public/admin_assets/images/products/'.$product->image) }}" class="simpleLens-lens-image"><img src="{{ asset('public/admin_assets/images/products/'.$product->image) }}" class="simpleLens-big-image"></a></div>
										</div>
									</div>
								</div>
							</div>
							<!-- Modal view content -->
							<div class="col-md-7 col-sm-7 col-xs-12">
								<div class="aa-product-view-content">
									<h3>{{$product->name}}</h3>
									<div class="aa-price-block">
										<span class="aa-product-view-price">Rs: {{$product->price}}/-</span>
									</div>
									<p>Desc: <span  class="ellipsis">{{$product->desc}}</span></p>
									Category: <span>{{$product->category->name}}</span>
									
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
											<button class="btn btn-lg" disabled="">Add To Cart</button>
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
									<a class="aa-product-img" href="{{ url('product-details/'.$list->id) }}"><img src="{{ asset('public/admin_assets/images/products/'.$list->image) }}" alt="polo shirt img"></a>
									<figcaption>
										<h4 class="aa-product-title"><a href="#">{{$list->name}}</a></h4>
										<span class="aa-product-price">Rs: {{$list->price}}/-</span>
									</figcaption>
								</figure>
							</li>                                                                                
							@endforeach
						</ul>
						<!-- quick view modal -->                  
						<div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
																<a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
																	<img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
																</a>
															</div>
														</div>
														<div class="simpleLens-thumbnails-container">
															<a href="#" class="simpleLens-thumbnail-wrapper"
															data-lens-image="img/view-slider/large/polo-shirt-1.png"
															data-big-image="img/view-slider/medium/polo-shirt-1.png">
															<img src="img/view-slider/thumbnail/polo-shirt-1.png">
														</a>                                    
														<a href="#" class="simpleLens-thumbnail-wrapper"
														data-lens-image="img/view-slider/large/polo-shirt-3.png"
														data-big-image="img/view-slider/medium/polo-shirt-3.png">
														<img src="img/view-slider/thumbnail/polo-shirt-3.png">
													</a>

													<a href="#" class="simpleLens-thumbnail-wrapper"
													data-lens-image="img/view-slider/large/polo-shirt-4.png"
													data-big-image="img/view-slider/medium/polo-shirt-4.png">
													<img src="img/view-slider/thumbnail/polo-shirt-4.png">
												</a>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal view content -->
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="aa-product-view-content">
										<h3>T-Shirt</h3>
										<div class="aa-price-block">
											<span class="aa-product-view-price">$34.99</span>
											<p class="aa-product-avilability">Avilability: <span>In stock</span></p>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>

										<div class="aa-prod-quantity">
											<form action="">
												<select name="" id="">
													<option value="0" selected="1">1</option>
													<option value="1">2</option>
													<option value="2">3</option>
													<option value="3">4</option>
													<option value="4">5</option>
													<option value="5">6</option>
												</select>
											</form>
											<p class="aa-prod-category">
												Category: <a href="#">Polo T-Shirt</a>
											</p>
										</div>
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
			</div>
			<!-- / quick view modal -->   
		</div>  
	</div>
</div>
</div>
</div>
</section>
<!-- / product category -->

@endsection