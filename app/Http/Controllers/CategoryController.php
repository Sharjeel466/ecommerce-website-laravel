<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        // $category = Category::all();
        // return response()->json($category);
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
            'name' => 'unique:categories'
        ]);
        // if ($req->ajax()) {
            // $data = $req->all();
        $category = new Category;
        $category->name = $req->name;
        $category->save(); 
        return response()->json($category); 
        // }
        // else{
        //     return 'else';
        // }
        // return view('admin.categories.list');
    }

    public function updateCategory(Request $req)
    {
        $data = $req->all();
        $category = Category::where('id', '=', $data['id'])->first();
        $category->name = $data['name'];
        $category->update(); 
        return response()->json($category); 
    }

    public function deleteCategory(Request $req)
    {
        $data = $req->all();
        $category = Category::find($data['id']);
        $category->delete();
        return response()->json($category);
    }

}
