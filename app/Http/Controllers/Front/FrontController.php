<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use Hash;
use Session;
use Auth;

class FrontController extends Controller
{
    public function index(Request $req)
    {

        $product = Product::with('category')->take(4)->inRandomOrder()->get();
        $category = Category::all();

        return view('front.index', compact('product', 'category'));
    }

    public function productDetails(Request $req, $product_id)
    {
        $product = Product::with('category')->find($product_id);

        $related_product = Product::where('category_id', '=', $product->category_id)
        ->where('id' ,'!=' , $product_id)
        ->get();
        
        return view('front.product_view', compact('product', 'related_product'));
    }

    public function addToCart(Request $req, $product_id)
    {
        $product = Product::find($product_id);
        $customer_id = Auth::user()->id;
        $cart = Cart::where('product_id', $product_id)->where('customer_id', $customer_id)->first();

        if ($cart != '') {

            $cart->product_qty = $req->product_qty;
            $cart->update();
            $req->session()->flash('msg', 'Product Quantity Updated');
            return redirect('/');
        }
        else{

            Cart::create([
                'customer_id' => $customer_id,
                'product_id'  => $product_id,
                'product_qty' => $req->product_qty,
            ]);
            $req->session()->flash('msg', 'Product Added to Cart');
            return redirect('/');
        }

    }

    public function updateCart(Request $req, $product_id)
    {
        $customer_id = Auth::user()->id;
        $cart = Cart::where('product_id', $product_id)->where('customer_id', $customer_id)->first();
        $cart->product_qty =$req->product_qty; 
        $cart->update();
        $req->session()->flash('msg', 'Product Quantity Updated');
        return response()->json($cart);
    }

    public function cartRemove(Request $req)
    {
        $customer_id = Auth::user()->id;
        $cart = Cart::where('product_id', $req->product_id)->where('customer_id', $customer_id)->first();
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

            Cart::where('customer_id', $req->cust_id)->delete();

            return redirect('thankyou');
        }
        $user_data = Auth::user()->id;
        $cart = Cart::with('product')->where(['customer_id'=>$user_data])->get();

        return view('front.checkout', compact('cart'));
    }

    public function cartDetails(Request $req)
    {
        return view('front.layouts.partials.cart');
    }

    public function productList($category_id=null)
    {
        $categories = Category::all();
        if ($category_id != null) {
            $product = Product::with('category')->where(['category_id' => $category_id])->get();
        }
        else{
            $product = Product::with('category')->where(['category_id' => $categories[0]['id']])->get();
        }
        $category = Category::all();
        return view('front.product_list', compact('product', 'category'));
    }

    public function thankyou()
    {
        return view('front.thankyou');
    }

}