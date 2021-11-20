<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.list');
    }

    public function fetchCategory(Request $req, $id = null)
    {
        if ($id != null) {
            $category = Category::where('id', '=', $id)->first();
            $category = json_decode(json_encode($category));
            return response()->json([
                'name'=>$category
            ]);
        }
        else{   
            $category = Category::all();
            return response()->json([
                'name'=>$category
            ]);
        }
    }
    
    public function manageCategory(Request $req)
    {
        $req->validate([
            'name' => 'required|unique:categories'
        ]);

        $category = new Category;
        $category->name = $req->name;
        $category->save();

        return response()->json($category); 
    }

    public function updateCategory(Request $req)
    {
        $data = $req->all();
        $category = Category::where('id', '=', $data['id'])->first();
        $category->name = $data['name'];
        $category->update(); 
        return response()->json($category); 
    }

    // public function deleteCategory(Request $req)
    // {
    //     $data = $req->all();
    //     $category = Category::find($data['id']);
    //     $category->delete();
    //     // return response()->json($category);
    // }

}
