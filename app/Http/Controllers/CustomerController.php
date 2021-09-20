<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Order;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return view('admin.customers.list', compact('customer'));
    }

    // public function customerDetail(Request $req, $customer_id)
    // {
    //     $customer = Order::with('customer', 'orderDetail')
    //     ->where('customer_id', $customer_id)
    //     ->first();

    //     $customer = json_decode(json_encode($customer));
    //     debug($customer);die();
    //     return view('admin.customers.details', compact('customer'));
    // }

}