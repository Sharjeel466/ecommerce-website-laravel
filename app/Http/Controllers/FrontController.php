<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Customer;
use App\Cart;
use App\Order;
use App\OrderDetails;
use Hash;
use Session;

class FrontController extends Controller
{
    public function index(Request $req)
    {
        if ($req->session()->has('user')) {

            $product = Product::with('category')->take(4)->inRandomOrder()->get();
            $category = Category::all();

            return view('front.layouts.partials.index', compact('product', 'category'));
        }
        else{
            $product = Product::with('category')->take(4)->inRandomOrder()->get();
            $category = Category::all();

            return view('front.layouts.partials.index', compact('product', 'category'));
        }
    }

    public function productDetails(Request $req, $id)
    {
        $product = Product::with('category')->find($id);

        $related_product = Product::where('category_id', '=', $product->category_id)
        ->where('id' ,'!=' ,$id)
        ->get();
        return view('front.layouts.partials.product_view', compact('product', 'related_product'));
    }

    public function registerUser(Request $req)
    {

        $password = $req->post('password');
        $hash_papssword = Hash::make($password);

        $user = Customer::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => $hash_papssword,
            'address' => $req->address,
            'phone_number' => $req->number,
        ]);

        return redirect('/');
    }

    public function loginUser(Request $req)
    {
        $data = $req->all();
        $customer = Customer::where(['email'=>$data['email']])->first();

        if ($customer) {
            if (Hash::check($req->post('password'), $customer['password'])) {
                $req->session()->put('user', $customer);
                return redirect('/');
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
    }

    public function logOut(Request $req)
    {
        $req->session()->forget('user');
        return redirect('/');  
    }

    public function addToCart(Request $req, $product_id)
    {
        $product = Product::find($product_id);
        $customer_id = $req->session()->get('user')['id'];
        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $product_id =>[
                    'product_id' => $product_id,
                    'customer' => $customer_id,
                    'product'  => $product->name,
                    'product_price'  => $product->price,
                    'product_qty' => $req->product_qty,
                    'image' => $product->image,
                ] 
            ];

            session()->put('cart', $cart);
            return redirect('/');
        }

        if (isset($cart[$product_id])) {

            $cart[$product_id]['product_qty'] = $req->product_qty;

            session()->put('cart', $cart);
            return redirect('/');
        }

        $cart[$product_id] = [
            'product_id' => $product_id,
            'customer' => $customer_id,
            'product'  => $product->name,
            'product_price'  => $product->price,
            'product_qty' => $req->product_qty,
            'image' => $product->image,
        ];

        $req->session()->put('cart', $cart);

        return redirect('/');

    }

    public static function showUserCart()
    {
        $cart = Session::get('cart');
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
        $user_data = Session::get('user')['id'];
        $cart = Cart::with('product')->where(['customer_id'=>$user_data])->get();
        return $cart;
    }

    public function checkout(Request $req)
    {
        if ($req->isMethod('post')) {

            date_default_timezone_set('Asia/Karachi');
            $date =  date("Y-m-d | h:i:s A") ;
            
            $order = Order::create([
                'customer_id'    => $req->cust_id,
                'date'           => $date,
                'payment_method' => $req->payment,
                'total_amount'   => $req->total_amt
            ]);

            foreach ($req->product_id as $key => $value) {
                OrderDetails::create([
                    'order_id'    => $order['id'],
                    'product_id'  => $value,
                    'product_qty' => $req->product_qty[$key]
                ]);                
            }

            $req->session()->forget('cart');

            return redirect('/');
        }
        $cart = Session::get('cart');
        return view('front.layouts.partials.checkout', compact('cart'));
    }

    public function cartDetails(Request $req)
    {
        return view('front.layouts.partials.cart');
    }

    public function productList()
    {
        $categories = Category::all();
        $product = Product::with('category')->where(['category_id' => $categories[0]['id']])->get();
        $category = Category::all();
        // $product = json_decode(json_encode($product));
        // debug($product);die();
        return view('front.layouts.partials.product_list', compact('product', 'category'));
    }

    public function category(Request $req, $category_id)
    {
        $category = Category::all();
        $product = Product::where(['category_id'=>$category_id])->get();
        // $product = json_decode(json_encode($product));
        // debug($product);die();
        return view('front.layouts.partials.product_list', compact('product', 'category'));
    }

}