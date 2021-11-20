<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('admin.products.list', compact('product'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.products.manage', compact('category'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'image'=>'mimes:jpeg,jpg,png',
            'name'=>'required|unique:products'
        ]);

        if ($req->hasFile('image')) {

            $image = $req->file('image');
            $image_name = $image->getClientOriginalName();
            $req->file('image')->storeAs('/public/category',$image_name);
        }

        Product::create([
            'name' => $req->name,
            'price' => $req->price,
            'description' => $req->desc,
            'image' => $image_name,
            'category_id' => $req->category_id,
        ]);

        return redirect('admin/product')->with('msg', 'New Product Added');
    }

    public function edit(Request $req, $product_id)
    {
        $product = Product::where('id', $product_id)->first();
        $category = Category::all();
        return view('admin.products.manage', compact('product', 'category'));
    }

    public function update(Request $req)
    {
        $req->validate([
            'image'=>'mimes:jpeg,jpg,png',
            'name'=>'required'
        ]);

        if ($req->hasFile('image')) {

            $arrImage = Product::where(['id' => $req->post('id')])->first();
            if(Storage::exists('/public/category'.$arrImage->image)){
                Storage::delete('/public/category'.$arrImage->image);
            }

            $image = $req->file('image');
            $image_name = $image->getClientOriginalName();
            $req->file('image')->storeAs('/public/category',$image_name);
        }

        $product = Product::find($req->id);
        $product->name = $req->name;
        $product->price = $req->price;
        $product->description = $req->desc;
        $product->category_id = $req->category_id;
        $product->image = $image_name;
        $product->update();

        return redirect('admin/product')->with('msg', 'Product Updated');
    }

    public function delete(Request $req, $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/product')->with('msg', 'Product Deleted');
    }

}