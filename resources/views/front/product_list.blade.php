@extends('layouts.front_layout')
@section('container')

<div class="container">
  <ul>
    <div class="row">
      <div class="col-md-3" style="margin-top: 50px; height: 600px;">
        <div id="aa-product-category">
          <aside class="aa-sidebar">
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                @foreach ($category as $list)
                <li><a href="{{ url('product_list/'.$list->id) }}">{{$list->name}}</a></li>
                @endforeach
              </ul>
            </div>
          </aside>
        </div>
      </div>
      @if (!empty($product))
      @foreach ($product as $list)
      <div class="col-md-3" style="margin-top: 50px;">
        <li>
          @if (Auth::user())
          @if ($list->image == null)
          <a class="aa-product-img" href="{{ url('product-details/'.$list->id) }}"><img width="240px" height="300px" src="{{ asset('public/no-image.png') }}"></a>
          @else
          <a class="aa-product-img" href="{{ url('product-details/'.$list->id) }}"><img width="240px" height="300px" src="{{ asset('storage/app/products/'.$list->image) }}"></a>
          @endif
          @else
          @if ($list->image == null)
          <a class="aa-product-img"><img width="240px" height="300px" src="{{ asset('public/no-image.png') }}"></a>
          @else
          <a class="aa-product-img"><img width="240px" height="300px" src="{{ asset('storage/app/products/'.$list->image) }}"></a>
          @endif
          @endif
          <figcaption>
            <h4 class="aa-product-title"><h3>{{$list->name}}</h3></h4>
            <span class="aa-product-price">Rs : {{$list->price}}/-</span>
            <p class="aa-product-descrip ellipsis">{{$list->desc}}</p>
          </figcaption>
        </li>
      </div>
      @endforeach
      @else
      <div class="col-md-4" style="margin-top: 50px;">
        No Products From This Category.
      </div>
      @endif
    </div>
  </ul>
</div>

@endsection