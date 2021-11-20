<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrderDetails;
use App\Models\Order;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('order')->get();
        return view('admin.users.list', compact('users'));
    }

    public function userDetail(Request $req, $user_id)
    {
        $user = Order::with('user')->where('user_id', $customer_id)->get();
        return view('admin.users.details', compact('customer'));
    }

    public function orderDetail(Request $req, $order_id)
    {
        $order_details = OrderDetails::with('product')->where('order_id', $order_id)->get();
        return view('admin.users.order_details', compact('order_details'));
    }

}