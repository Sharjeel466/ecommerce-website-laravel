<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Hash;
use Session;
use Auth;
use Illuminate\Support\Facades\App;

class FrontController extends Controller
{
    public function index(Request $req)
    {

        $product = Product::with('category')->take(4)->inRandomOrder()->get();
        $category = Category::all();
// dd($product);
        return view('front.index', compact('product', 'category'));
    }

    public function productDetails(Request $req, $category_name, $product_id)
    {
        $product = Product::with('category')->find($product_id);

        $related_product = Product::where('category_id', '=', $product->category_id)
        ->where('id' ,'!=' , $product_id)
        ->get();
        // dd($related_product);
        return view('front.product_view', compact('product', 'related_product'));
    }

    public function productList(Request $request, $category_name, $category_id = null)
    {

        $categories = Category::all();
        if ($category_id != null) {
            $product = Product::with('category')->where(['category_id' => $category_id])->get();
        }
        else{
            $product = Product::with('category')->get();
        }
        $category = Category::all();

        if ($request->get('filter_price_start') !== null && $request->get('filter_price_end') !== null) {
            $product = Product::whereBetween('price',
                [
                    $request->get('filter_price_start'),
                    $request->get('filter_price_end')
                ]
            )
            ->get();
        }

        return view('front.product_list', compact('product', 'category'));
    }

    public function productSearch(Request $req)
    {
        $data = $req->all();
        $product = Product::where('name', 'like', '%'.$data['data'].'%')->get();

        $output = '';
        if ($product) {
            foreach ($product as $key => $list) {
                $output .= '<a href='.url('product_list/'.$list['category_id']).'><li>'.$list['name'].'</li></a>';
            }
            return $output;
        }
    }

    public function exchangeCurrency(Request $req)
    {
        // code...
    }

}