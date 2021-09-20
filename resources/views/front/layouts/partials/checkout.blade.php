@extends('front.layouts.master')
@section('container')

@php
use App\Http\Controllers\FrontController;

if (Session::has('user')) {
  $customer_id = Session::get('user')['id'];
}
@endphp

<!-- Cart view section -->
<section id="checkout">
 <div class="container">
   <div class="row">
     <div class="col-md-12">
      @if (!empty($cart))
      <div class="checkout-area">
        <form action="{{ route('checkout') }}" method="post">
          @csrf
          <div class="col-md-12">
            <div class="checkout-right">
              <h4>Order Summary</h4>
              <div class="aa-order-summary-area">
                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Sub-total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cart as $list)
                    <tr>
                      <input type="hidden" name="product_id[]" value="{{$list['product_id']}}">
                      <input type="hidden" name="product_qty[]" value="{{$list['product_qty']}}">
                      <td>{{$list['product']}} <strong> x  {{$list['product_qty']}}</strong></td>
                      <td>Rs: {{$list['product_price']}}/-</td>
                      <td>Rs: <span class="sub">{{$sub = $list['product_price'] * $list['product_qty']}}</span>/-</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Total</th>
                      <td>Rs: <strong><span id="tot"></span></strong>/-</td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <h4>Payment Method</h4>
              <div class="aa-payment-method">                    
                <label for="cashdelivery">
                  <input type="radio" id="cashdelivery" name="payment" value="Cash on Delivery" required> Cash on Delivery 
                </label>
                <input type="hidden" value="{{$customer_id}}" name="cust_id">
                <input type="hidden" class="tot" name="total_amt">
                <label for="paypal">
                  <input type="radio" id="paypal" name="payment" value="Via Paypal" required> Via Paypal 
                </label>
                <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">    
                <input type="submit" value="Place Order" class="aa-browse-btn">                
              </div>
            </div>
          </div>
        </form>
      </div>
      @else
      <table class="table">
        <tr>
          <th><h3 class="text-center">Select Items For Cart.</h3></th>
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