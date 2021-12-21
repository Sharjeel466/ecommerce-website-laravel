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
							@if ($list->image == null)
							<img data-seq src="{{ asset('public/no-image.png') }}" alt="Men slide img" />
							@else
							<img data-seq src="{{ asset('storage/app/products/'.$list->image) }}" alt="Men slide img" />
							@endif
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

						@if ($list->image == null)
						<a class="aa-product-img" href="javascript:void(0)"><img width="240px" height="300px" src="{{ asset('public/no-image.png') }}" alt="polo shirt img"></a>
						@else
						<a class="aa-product-img" href="{{ url('product-details/'.$list->category->name.'/'.$list->id) }}"><img width="240px" height="300px" src="{{ asset('storage/app/products/'.$list->image) }}" alt="polo shirt img"></a>
						@endif

						<figcaption>
							<h4 class="aa-product-title">{{$list->name}}</h4>
							<span class="aa-product-price">Rs : {{$list->price}}/-</span>
						</figcaption>

					</figure>
					<div class="aa-product-hvr-content">
						<a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal-{{$list->id}}"><span class="fa fa-search"></span></a>                          
					</div>
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
										@if ($list->image == null)
										<a class="simpleLens-lens-image" data-lens-image="{{ asset('public/no-image.png')}}">
											<img src="{{ asset('public/no-image.png')}}" class="simpleLens-big-image">
										</a>
										@else
										<a class="simpleLens-lens-image" data-lens-image="{{ asset('storage/app/products/'.$list->image)}}">
											<img src="{{ asset('storage/app/products/'.$list->image)}}" class="simpleLens-big-image">
										</a>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Modal view content -->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="aa-product-view-content">
							<h3>{{$list->name}}</h3>
							<div class="aa-price-block">
								<span class="aa-product-price">Rs : {{$list->price}}/-</span>
							</div>
							<p>{{$list->description}}</p>

							<p class="aa-prod-category">
								<strong>Category</strong>: <u><a href="{{ url('product_list/'.$list->category->name.'/'.$list->category_id) }}">{{$list->category->name}}</a></u>
							</p>
							<div class="aa-prod-quantity">
								<form action="{{ url('add-to-cart/'.$list->id) }}" method="POST">
									@csrf
									<div class="aa-prod-quantity">
										<select name="product_qty">
											@for ($i = 1; $i <= 6; $i++)
											<option value="{{$i}}">{{$i}}</option>
											@endfor
										</select>
									</div>
									<input type="hidden" name="product_id" value="{{$list->id}}">
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
			</div>                        
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
@endforeach

@endsection