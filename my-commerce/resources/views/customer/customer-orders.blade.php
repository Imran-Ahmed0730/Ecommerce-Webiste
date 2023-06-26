@extends('website.master')
@section('title')
@endsection
@section('content')
    <div class="row m-5">
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{route('customer.dashboard')}}" class="list-group-item list-group-item-action active">Dashboard</a>
                <a href="{{route('customer.profile')}}" class="list-group-item list-group-item-action">My Profile</a>
                <a href="{{route('customer.orders')}}" class="list-group-item list-group-item-action">My Orders</a>
                <a href="{{route('customer.account')}}" class="list-group-item list-group-item-action disabled">Account</a>
                <a href="{{route('customer.change.password')}}" class="list-group-item list-group-item-action disabled">Change Password</a>
                <a href="{{route('customer.logout')}}" class="list-group-item list-group-item-action disabled">Logout</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Order No</th>
                            <th>Order Date</th>
                            <th>Order Total</th>
                            <th>Delivery Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $i=1 @endphp
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$order->id}}</td>
                            <td>{{$order->order_date}}</td>
                            <td>{{$order->tax_total}}</td>
                            <td>{{$order->delivery_address}}</td>
                            <td>{{$order->order_status}}</td>
                            <td>
                                <a href="" class="btn btn-info">Details</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
