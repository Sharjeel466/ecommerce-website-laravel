<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Request $req)
    {
        if (Auth::user()) {
            return redirect('admin/dashboard');
        }
        else{
            return redirect('login');
        }
    }

    public function dashboard()
    {
        $customer  = User::all();
        return view('admin.dashboard', compact('customer'));
    }

}