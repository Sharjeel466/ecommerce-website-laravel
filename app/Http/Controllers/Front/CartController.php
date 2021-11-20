<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;
use Auth;

class CartController extends Controller
{
    public function addToCart(Request $req, $product_id)
    {
        $product = Product::find($product_id);
        $user_id = Auth::user()->id;
        $cart = Cart::where('product_id', $product_id)->where('user_id', $user_id)->first();

        if ($cart != '') {

            $cart->product_qty = $req->product_qty;
            $cart->update();
            // $req->session()->flash('msg', 'Product Quantity Updated');
        }
        else{

            Cart::create([
                'user_id' => $user_id,
                'product_id'  => $product_id,
                'product_qty' => $req->product_qty,
            ]);
            // $req->session()->flash('msg', 'Product Added to Cart');
        }
        return redirect('cart');

    }

    public function updateCart(Request $req, $product_id)
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where('product_id', $product_id)->where('user_id', $user_id)->first();
        $cart->product_qty =$req->product_qty; 
        $cart->update();
        $req->session()->flash('msg', 'Product Quantity Updated');
        return response()->json($cart);
    }

    public function cartRemove(Request $req)
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where('product_id', $req->product_id)->where('user_id', $user_id)->first();
        $cart->delete();
        $req->session()->flash('msg', 'Product Removed from Cart');
        return redirect('cart');
    }

    public static function showUserCart()
    {
        $user_data = Auth::user()->id;
        $cart = Cart::with('product')->where(['user_id'=>$user_data])->get();

        if ($cart != '') {
            $cart = count($cart);
        }
        else{
            $cart = 0;
        }
        return $cart;
    }

    public static function cart()
    {
        $user_data = Auth::user()->id;
        $cart = Cart::with('product')->where(['user_id'=>$user_data])->get();
        return $cart;
    }

    public function checkout(Request $req)
    {
        if ($req->isMethod('post')) {
            $data = $req->all();

            $product = Product::where('id', $data['product_id'])->first();

            date_default_timezone_set('Asia/Karachi');
            $date =  date("Y-m-d | h:i:s A") ;

            $order = Order::create([
                'user_id'        => $data['cust_id'],
                'date'           => $date,
                'payment_method' => $req->payment,
                'total_amount'   => $req->total_amt
            ]);

            foreach ($req->product_id as $key => $value) {
                OrderDetails::create([
                    'order_id'      => $order['id'],
                    'product_id'    => $value,
                    'product_price' => $product['price'],
                    'product_qty'   => $req->product_qty[$key]
                ]);                
            }

            Cart::where('user_id', $req->cust_id)->delete();

            return redirect('thankyou');
        }
        $user_data = Auth::user()->id;
        $cart = Cart::with('product')->where(['user_id'=>$user_data])->get();

        return view('front.checkout', compact('cart'));
    }

    public function cartDetails(Request $req)
    {
        return view('front.cart');
    }

    public function thankyou()
    {
        return view('front.thankyou');
    }
}