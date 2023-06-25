<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    private $customer;
    public function index(){
        return view('customer.login');
    }
    public function customerLogin(Request $request){
        $this->customer = Customer::where('email', $request->email)->first();
        if ($this->customer){
            if (password_verify($request->password, $this->customer->password)){
                Session::put('customerId', $this->customer->id);
                Session::put('customerName', $this->customer->name);
                return redirect('/customer/dashboard');
            }
            else{
                return back()->with('message', 'Invalid Password!! Please try Again') ;
            }
        }
        else{
            return back()->with('message', 'Invalid Email Address!! Please try Again') ;
        }
    }
    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }
    public function register(Request $request){
        return view('customer.register');
    }
    public function customerRegister(Request $request){
        Customer::;
    }

    public function dashboard(){
        return view('customer.dashboard');
    }
}
