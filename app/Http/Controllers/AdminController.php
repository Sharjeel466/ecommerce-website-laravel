<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;
use App\Admin;
use App\Customer;

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
        $customer  = Customer::all();
        return view('admin.dashboard', compact('customer'));
    }

}