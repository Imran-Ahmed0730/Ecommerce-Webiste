<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerOrderController extends Controller
{
    public function index(){
//        return Order::where('customer_id', Session::get('customerId'))->get();
        return view('customer.customer-orders', [
            'orders'=> Order::where('customer_id', Session::get('customerId'))->get()
        ]);
    }
}
