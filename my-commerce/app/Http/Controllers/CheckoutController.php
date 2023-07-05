<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Session;
use ShoppingCart;

class CheckoutController extends Controller
{
    private $customer, $order, $orderDetails;
    public function index(){
//        return Session::get('customerName');
        return view('website.checkout.checkout', [
            'customer'=>Customer::find(Session::get('customerId'))
        ]);
    }
    private function customerValidation($request){
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|unique:customers,email',
            'phone_number'=>'required|unique:customers,mobile',
            'delivery_address'=>'required'
        ]);
    }
    public function newCashOrder(Request $request){
        if (Session::get('customerId')){
            $this->customer = Customer::find(Session::get('customerId'));
        }
        else{
            $this->customerValidation($request);
            $this->customer = Customer::newCustomer($request);
            Session::put('customerId', $this->customer->id);
            Session::put('customerName', $this->customer->name);
        }

        $this->order = Order::newOrder($request, $this->customer->id);
        OrderDetail::newOrderDetails($this->order->id);

        return redirect('/complete-order')->with('message', 'Your Order Has been Submitted Please Wait for the Confirmation');
    }

    public function completeOrder(){
        return view('website.checkout.complete-order');
    }
}
