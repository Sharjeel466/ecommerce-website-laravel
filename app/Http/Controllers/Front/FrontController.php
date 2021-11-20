<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
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

    public function productList($category_id = null)
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

}