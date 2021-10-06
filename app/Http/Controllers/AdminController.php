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
        if ($req->session()->has('admin')) {
            return redirect('admin/dashboard');
        }
        else{
            return view('admin.auth.login');
        }
    }

    public function auth(Request $req)
    {
        if ($req->isMethod('post')) {
            $email = $req->post('email');
            $password = $req->post('password');
            $data = Admin::where(['email'=>$email])->first();

            if ($data) {
                if (Hash::check($password, $data['password'])) {
                    $req->session()->put('admin', $data);
                    return redirect('admin/dashboard');
                }
                else{
                    $req->session()->flash('error','Enter correct password');
                    return redirect('admin');
                }
            }
            else{
                $req->session()->flash('error','Invalid Credentials');
                return redirect('admin');
            }
        }
        return view('admin.auth.login');
    }

    public function dashboard()
    {
        $customer  = Customer::all();
        return view('admin.dashboard', compact('customer'));
    }

    public function logout()
    {
        session()->forget('admin');
        session()->flash('error','Logout sucessfully');
        return redirect('admin');
    }

}