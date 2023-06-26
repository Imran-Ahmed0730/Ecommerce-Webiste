@extends('website.master')
@section('title')
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#cash" type="button" role="tab" aria-controls="home" aria-selected="true">Cash On Delivery</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#online" type="button" role="tab" aria-controls="profile" aria-selected="false">Online</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="cash" role="tabpanel" aria-labelledby="home-tab">

                                    <form action="{{route('new.cash-order')}}" method="post">
                                        @csrf
                                            <div class="row">
                                                @if($customer)
                                                <div class="col-md-12">
                                                    <div class="single-form form-default">
                                                        <label>Full Name</label>
                                                        <div class="row">
                                                            <div class="col-md-12 form-input form">
                                                                <input type="text" required name="name" value="{{$customer->name}}" readonly>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Email Address</label>
                                                        <div class="form-input form">
                                                            <input type="email" required name="email" value="{{$customer->email}}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Phone Number</label>
                                                        <div class="form-input form">
                                                            <input type="text" required name="phone_number" value="{{$customer->mobile}}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Full Name</label>
                                                    <div class="row">
                                                        <div class="col-md-12 form-input form">
                                                            <input type="text" required name="name" placeholder="Full Name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address</label>
                                                    <div class="form-input form">
                                                        <input type="email" required name="email" placeholder="Email Address">
                                                        <span class="text-danger">{{$errors->has('email')? $errors->first('email') : ''}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number</label>
                                                    <div class="form-input form">
                                                        <input type="text" required name="phone_number" placeholder="Phone Number">
                                                        <span class="text-danger">{{$errors->has('phone_number') ? $errors->first('phone_number') : ''}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Delivery Address</label>
                                                <div class="form-input form">
                                                    <textarea type="text" style="padding-top: 10px; height: 100px" name="delivery_address" placeholder="Delivery Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Payment method</label>
                                                <div class="">
                                                    <input type="radio" name="payment_type" value="1" class="mx-2" checked>Cash On Delivery

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-checkbox checkbox-style-3">
                                                <input type="checkbox" id="checkbox-3" checked>
                                                <label for="checkbox-3"><span></span></label>
                                                <p>I accept All terms and Conditions</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form button">
                                                <button class="btn" type="submit">Confirm Order</button>
                                            </div>
                                        </div>

                                    </form>

                            </div>
                            <div class="tab-pane fade" id="online" role="tabpanel" aria-labelledby="profile-tab">...</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">

                        <div class="checkout-sidebar-price-table">
                            <h5 class="title">Cart Summary</h5>
                            <div class="sub-total-price">
                                @php $totalAmount=0; @endphp
                                @foreach(ShoppingCart::all() as $cartProduct)
                                    <div class="total-price">
                                        <p class="value">
                                            {{$cartProduct->name}}
                                            ({{$cartProduct->qty}} * {{$cartProduct->price}})
                                        </p>
                                        <p class="price">{{$cartProduct->total}} TK</p>
                                        @php $totalAmount += $cartProduct->total @endphp
                                    </div>
                                @endforeach

                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Total Price:</p>
                                    <p class="price">{{$totalAmount}} TK</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Tax:</p>
                                    <p class="price">{{$tax = round($totalAmount * 0.15)}} TK</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Shipping Amount:</p>
                                    <p class="price">{{$shipping_amount = 100}} TK</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Total Payable:</p>
                                    <p class="price">{{$totalAmount+= $tax}} TK</p>
                                </div>

                                @php
                                    Session::put('order_total',$totalAmount);
                                    Session::put('tax_total', $tax);
                                    Session::put('shipping_total', $shipping_amount);
                                @endphp
                            </div>
                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{asset('website')}}/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
