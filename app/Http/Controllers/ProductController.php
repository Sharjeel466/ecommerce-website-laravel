<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use File;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
// debug($product);die();
        return view('admin.products.list', compact('product'));
    }

    public function productManage(Request $req, $id = null)
    {
        if ($id > 0) {
            $arr = Product::where('id','=', $id)->first();
            $product['id'] = $arr['id'];
            $product['name'] = $arr['name'];
            $product['price'] = $arr['price'];
            $product['desc'] = $arr['desc'];
            $product['image'] = $arr['image'];
            $product['category_id'] = $arr['category_id'];
// debug($product);die();
        }
        else{
            $product['id'] = '';
            $product['name'] = '';
            $product['price'] = '';
            $product['desc'] = '';
            $product['image'] = '';
            $product['category_id'] = '';
        }

        if ($req->isMethod('post')) {

            if ($req->post('id') > 0) {
                $product = Product::where(['id'=>$req->post('id')])->first();
            }
            else{
                $product = new Product;
            }

            if (File::exists('public/admin_assets/images/products/'.$product['image'])) { 
                File::delete('public/admin_assets/images/products/'.$product['image']);
            }

            $product->name = $req->name;
            $product->price = $req->price;
            $product->description = $req->desc;
            $product->category_id = $req->category;

            if ($req->hasfile('image')) {

                $file = $req->file('image');
                $ext = $file->getClientOriginalExtension();
                $file_name = time().'.'.$ext;
                $file->move('public/admin_assets/images/products/', $file_name);

            }

            $product->image = $file_name;

            if ($req->post('id') > 0) {
                $product->update();
            }
            else{
                $product->save();
            }

            return redirect('admin/product');
        }

        $category = Category::all();
        return view('admin.products.manage', compact('category', 'product'));
    }

    public function productDelete(Request $req, $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/product');
    }

}