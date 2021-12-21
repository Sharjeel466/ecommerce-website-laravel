@extends('layouts.front_layout')
@section('container')

<div class="container">
  <ul>
    <div class="row">
      <div class="col-md-3">
        <div id="aa-product-category">
          <aside class="aa-sidebar">
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                @foreach ($category as $list)
                <li><a href="{{ url('product_list/'.$list->name.'/'.$list->id) }}">{{$list->name}}</a></li>
                @endforeach
              </ul>
            </div>

            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
                <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val"></span>
                  <span id="skip-value-upper" class="example-val"></span>
                  <button class="aa-filter-btn" type="button" onclick="sort_price_filter()">Filter</button>
                </form>
              </div>              
            </div>

          </aside>
        </div>
      </div>

      <div class="col-md-9" style="padding: 30px 0px;">
        @if (!empty($product))
        <div class="row">
          @foreach ($product as $list)
          <div class="col-md-4">
            <li>
              @if (Auth::user())
              @if ($list->image == null)
              <a class="aa-product-img" href="javascript:void(0)"><img width="240px" height="300px" src="{{ asset('public/no-image.png') }}"></a>
              @else
              <a class="aa-product-img" href="{{ url('product-details/'.$list->category->name.'/'.$list->id) }}"><img width="240px" height="300px" src="{{ asset('storage/app/products/'.$list->image) }}"></a>
              @endif
              @else
              @if ($list->image == null)
              <a class="aa-product-img"><img width="240px" height="300px" src="{{ asset('public/no-image.png') }}"></a>
              @else
              <a class="aa-product-img"><img width="240px" height="300px" src="{{ asset('storage/app/products/'.$list->image) }}"></a>
              @endif
              @endif
              <figcaption class="text-center">
                <h4 class="aa-product-title"><h4>{{$list->name}}</h4></h4>
                <span class="aa-product-price">Rs : {{$list->price}}/-</span>
                <p class="aa-product-descrip ellipsis">{{$list->desc}}</p>
              </figcaption>
            </li>
          </div>
          @endforeach
        </div>
        @else
        <div class="col-md-12">
          <h1>No Products From This Category.</h1>
        </div>
        @endif
      </div>
    </div>
  </ul>
</div>

<form id="categoryFilter">
  <input type="hidden" id="filter_price_start" name="filter_price_start"/>
  <input type="hidden" id="filter_price_end" name="filter_price_end"/>
</form>

@endsection