@extends('front.layouts.master')
@section('container')
@php
use App\Http\Controllers\FrontController;

if (Session::has('user')) {
  $cart_items = FrontController::showUserCart(); 
  $cart = Session::get('cart');
  // debug($cart);die();
}
@endphp

<!-- Cart view section -->
<section id="cart-view">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="cart-view-area">
          @if (!empty($cart))
          <div class="cart-view-table">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub-total</th>
                  </tr>
                </thead>
                <tbody>
                  @if (Session::has('user'))
                  @php $n = 1; @endphp
                  @foreach ($cart as $list)
                  <tr>
                    <td>@php echo $n++; @endphp</td>
                    <td><img src="{{ asset('public/admin_assets/images/products/'.$list['image']) }}" alt="img"></td>
                    <td>{{$list['product']}}</td>
                    <td>Rs: <span id="product-price-{{$list['product_id']}}">{{$list['product_price']}}</span>/-</td>
                    <td id="product-quantity-{{$list['product_id']}}">{{$list['product_qty']}}</td>
                    <td>Rs: <span class="sub" id="sub-{{$list['product_id']}}">{{$list['product_qty'] * $list['product_price']}}</span>/-</td>
                  </tr>
                  @endforeach 
                  @endif
                </tbody>
              </table>
            </div>
            <!-- Cart Total view -->
            <div class="cart-view-total">
              <h4>Cart Total</h4>
              <table class="aa-totals-table">
                <tbody>
                  <tr>
                    <th>Total</th>
                    <td>Rs: <span id="tot"></span> /-</td>
                  </tr>
                </tbody>
              </table>
              <a href="{{ url('checkout') }}" class="aa-cart-view-btn">Proced to Checkout</a>
            </div>
          </div>
          @else
          <table class="table">
            <tr>
              <th><h3 class="text-center">No Product in the Cart.</h3></th>
            </tr>
          </table>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Cart view section -->

@endsection