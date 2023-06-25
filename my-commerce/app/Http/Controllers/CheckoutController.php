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
        return view('website.checkout.checkout');
    }
    public function newCashOrder(Request $request){
//
        $this->customer = new Customer();
        $this->customer->name = $request->name;
        $this->customer->email = $request->email;
        $this->customer->mobile = $request->phone_number;
        $this->customer->password = bcrypt($request->phone_number);
        $this->customer->save();

        Session::put('customerId', $this->customer->id);
        Session::put('customerName', $this->customer->name);

        $this->order = new Order();
        $this->order->customer_id = $this->customer->id;
        $this->order->order_date = date('Y-m-d');
        $this->order->order_timestamp = strtotime(date('Y-m-d'));
        $this->order->order_total = Session::get('order_total');
        $this->order->tax_total = Session::get('tax_total');
        $this->order->shipping_total = Session::get('shipping_total');
        $this->order->payment_type = $request->payment_type;
        $this->order->delivery_address = $request->delivery_address;
        $this->order->save();

        foreach (ShoppingCart::all() as $item){
            $this->orderDetails = new OrderDetail();
            $this->orderDetails->order_id = $this->order->id;
            $this->orderDetails->product_id = $item->id;
            $this->orderDetails->product_name = $item->name;
            $this->orderDetails->product_quantity = $item->qty;
            $this->orderDetails->product_price = $item->price;
            $this->orderDetails->save();
            ShoppingCart::remove($item->__raw_id);
        }

        return redirect('/complete-order')->with('message', 'Your Order Has been Submitted Please Wait for the Confirmation');
    }

    public function completeOrder(){
        return view('website.checkout.complete-order');
    }
}
