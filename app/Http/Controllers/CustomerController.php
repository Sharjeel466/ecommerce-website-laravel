<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\OrderDetails;
use App\Order;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = User::with('order')->get();
        // $customer = json_decode(json_encode($customer));
        // debug($customer);die();
        return view('admin.customers.list', compact('customer'));
    }

    public function customerDetail(Request $req, $customer_id)
    {
        $customer = Order::with('user')->where('user_id', $customer_id)->get();

        // $customer = json_decode(json_encode($customer));
        // debug($customer);
        // die();
        return view('admin.customers.details', compact('customer'));
    }

    public function orderDetail(Request $req, $order_id)
    {
        $order_details = OrderDetails::with('product')->where('order_id', $order_id)->get();

        // $order_details = json_decode(json_encode($order_details));
        // debug($order_details);
        // die();
        return view('admin.customers.order_details', compact('order_details'));
    }

}