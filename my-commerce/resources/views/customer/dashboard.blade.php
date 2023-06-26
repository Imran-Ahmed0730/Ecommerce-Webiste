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
            <h2>Dashboard</h2>
        </div>
    </div>
@endsection
