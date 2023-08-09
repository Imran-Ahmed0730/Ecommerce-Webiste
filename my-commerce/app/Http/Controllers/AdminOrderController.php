<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    private $order;
    public function index(){
        return view('admin.order.manage', [
            'orders'=>Order::orderBy('id', 'desc')->get()
        ]);
    }

    public function details($id){
        return view('admin.order.details', [
            'order'=>Order::find($id),
            'products' =>OrderDetail::where('order_id', $id)->get()
        ]);
    }
    public function edit($id){
//        return Order::find($id);
        return view('admin.order.edit', [
            'order'=>Order::find($id)
        ]);
    }

    public function update(Request $request){
        $this->order = Order::find($request->order_id);
        if ($request->order_status == 'Pending'){
           return back()->with('message', 'Order Status Changed Successfully');
        }
        elseif ($request->order_status == 'Processing'){
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->delivery_address = $request->delivery_address;
        }
        elseif ($request->order_status == 'Complete'){
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
        }
        elseif ($request->order_status == 'Cancel'){
            
        }

        $this->order->save();
        return redirect('/order/manage')->with('message', 'Order Status Changed Successfully!!');
    }
    public function showInvoice($id){
        return view('admin.order.show-invoice', [
            'order'=>Order::find($id)
        ]);
    }
    public function printInvoice($id){
        return view('admin.order.print-invoice', [
            'order'=>Order::find($id)
        ]);
    }

}
