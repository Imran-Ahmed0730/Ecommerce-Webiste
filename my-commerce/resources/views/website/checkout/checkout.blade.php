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
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#cash" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Cash On Delivery</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#online" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Online</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="cash" role="tabpanel" aria-labelledby="pills-home-tab">
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
                        </div>
                        <div class="tab-pane fade" id="online" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Full name</label>
                                        <input type="text" name="name" class="form-control" id="customer_name" placeholder="Your Name" required>
                                        <div class="invalid-feedback">
                                            Valid customer name is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="mobile">Mobile</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">+88</span>
                                        </div>
                                        <input type="text" name="phone_number" class="form-control" id="mobile" placeholder="Your Mobile Number" required>
                                        <div class="invalid-feedback" style="width: 100%;">
                                            Your Mobile number is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                           placeholder="Your Email Address" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <textarea type="text" class="form-control" name="delivery_address" id="address" placeholder="Your Address"
                                              required> </textarea>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <label for="country">Country</label>
                                        <select class="custom-select d-block w-100 form-control" id="country" required>
                                            <option value="">Choose...</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="state">State</label>
                                        <select class="custom-select d-block w-100 form-control" id="state" required>
                                            <option value="">Choose...</option>
                                            <option value="Dhaka">Dhaka</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="zip">Zip</label>
                                        <input type="text" class="form-control" id="zip" placeholder="">
                                        <div class="invalid-feedback">
                                            Zip code required.
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <div class="col-md-12">
                                    <div class="single-form form-default">
                                        <label>Payment method</label>
                                        <div class="">
                                            <input type="radio" name="payment_type" value="2" class="mx-2" checked>Online
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="single-checkbox checkbox-style-3">
                                        <input type="checkbox" id="checkbox-33" checked>
                                        <label for="checkbox-33"><span></span></label>
                                        <p>I accept All terms and Conditions</p>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Confirm Order</button>
                            </form>
                        </div>
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
                                    @if($totalAmount!=0)
                                        <p class="price">{{$shipping_amount = 100}} TK</p>
                                    @else
                                        <p class="price">{{$shipping_amount = 0}} TK</p>
                                    @endif

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
