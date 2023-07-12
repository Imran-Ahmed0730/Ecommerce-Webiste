@extends('admin.master')
@section('title')
    Order Details
@endsection
@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <h4 class="card-title text-center">Order Information</h4>
            <h6 class="card-subtitle text-center text-success">{{session('message')}}</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-striped border">
                    <tbody>
                    <tr>
                        <th>Order Date</th>
                        <td>{{$order->order_date}}</td>
                    </tr>
                    <tr>
                        <th>Order Total</th>
                        <td>{{$order->order_total}}</td>
                    </tr>
                    <tr>
                        <th>Tax</th>
                        <td>{{$order->tax_total}}</td>
                    </tr>
                    <tr>
                        <th>Shpping Cost</th>
                        <td>{{$order->shipping_total}}</td>
                    </tr>
                    <tr>
                        <th>Order Status</th>
                        <td>{{$order->order_status}}</td>
                    </tr>

                    <tr>
                        <th>Delivery Address</th>
                        <td>{{$order->delivery_address}}</td>
                    </tr>
                    <tr>
                        <th>Delivery Status</th>
                        <td>{{$order->delivery_status}}</td>
                    </tr>
                    <tr>
                        <th>Payment Type</th>
                        <td>{{$order->payment_type == 1 ? 'Cash On Delivery':'Online'}}</td>
                    </tr>
                    <tr>
                        <th>Payment Status</th>
                        <td>{{$order->payment_status}}</td>
                    </tr>
                    @if($order->payment_type == 2)
                        <tr>
                            <th>Transaction ID</th>
                            <td>
                               {{$order->transaction_id}}
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="card-title text-center">Customer Information</h4>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-striped border">
                    <tbody>
                    <tr>
                        <th>Customer Name</th>
                        <td>{{$order->customer->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$order->customer->email}}</td>
                    </tr>
                    <tr>
                        <th>Contact No</th>
                        <td>{{$order->customer->mobile}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="card-title text-center">Ordered Products</h4>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-striped border">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->product_quantity}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
