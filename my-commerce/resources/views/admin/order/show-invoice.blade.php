@extends('admin.master')
@section('title')
    Order Invoice
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container mb-5 mt-3">
                        <div class="row d-flex align-items-baseline">
                            <div class="col-md-9">
                                <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: #000{{$order->id}}</strong></p>
                            </div>
                            <div class="col-md-3 float-end">
                                <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                        class="ti ti-printer text-primary"></i> Print</a>
                                <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                        class="ti ti-export text-primary"></i> Export</a>

                            </div>
                            <hr>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12" >
                                    <div class="text-center">
                                        <img src="{{asset('/')}}/website/assets/images/company-logo.jpg" alt="" srcset="" height="100px" width="100px">
                                        <p class="pt-0">MDBootstrap.com</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-muted">Invoice</p>
                                    <ul class="list-unstyled">
                                        <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                                class="fw-bold">Invoice ID:</span>#000{{$order->id}}</li>
                                        <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                                class="fw-bold">Creation Date: </span>{{date('Y-m-d')}}</li>
                                        <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                                class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                                                {{$order->payment_status}}</span></li>
                                    </ul>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-8">
                                    <ul class="list-unstyled">
                                        <li class="text-muted"><i class="ti ti-user"></i>Customer Name: <span style="color:#5d9fc5 ;">{{$order->customer->name}}</span></li>
                                        <li class="text-muted"><i class="ti ti-car"></i> Delivery Address: {{$order->delivery_address}}</li>
                                        <li class="text-muted"><i class="ti ti-mobile"></i>Contact No: {{$order->customer->mobile}}</li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-muted fw-bold">MDBootstrap.com</p>
                                    <ul class="list-unstyled">
                                        <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                                class="">Karwan Bazar, Dhaka-1207 </span></li>
                                        <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                                class="">+880123456789</span></li>
                                        <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                                class="me-1"></span><span class="">
                                                MDBootstrap12@gmail.com</span></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row my-2 mx-1 justify-content-center">
                                <table class="table table-striped table-borderless">
                                                                    <thead style="background-color:#84B0CA ;" class="text-white">
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Description</th>
                                                                        <th scope="col">Qty</th>
                                                                        <th scope="col">Unit Price</th>
                                                                        <th scope="col" style="text-align: end">Amount (TK)</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @php $i=1 @endphp
                                                                    @php $subTotal=0 @endphp
                                                                    @foreach($order->orderDetail as $item)
                                                                        <tr>
                                                                            <th scope="row">{{$i++}}</th>
                                                                            <td>{{$item->product_name}}</td>
                                                                            <td>{{$item->product_quantity}}</td>
                                                                            <td>{{$item->product_price}}</td>
                                                                            <td align="right">{{ $total = $item->product_quantity * $item->product_price}} TK</td>
                                                                            @php $subTotal+= $total@endphp
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>

                                                                </table>
                                <hr>
                            </div>
                            <div class="row mx-2">
                                <div class="col-md-8">
                                    <p class="ms-3"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                            class="me-1 fw-bold">Payment Method:</span><span class="badge bg-warning text-black fw-bold">
                                            {{$order->payment_type == 1 ? 'Cash':'Online'}}</span></p>

                                </div>
                                <div class="col-md-4 text-end">
                                    <ul class="list-unstyled">
                                        <li class="text-muted ms-3"><span class="text-black me-4">SubTotal:</span>{{$subTotal}} TK</li>
                                        <li class="text-muted ms-3"><span class="text-black me-4">Tax(15%):</span> {{$order->tax_total}} TK</li>
                                        <li class="text-muted ms-3"><span class="text-black me-4">Shipping Total: </span> {{$order->shipping_total}} TK</li>
                                        <li class="text-muted ms-3 mt-3 fw-bold"><span class="text-black me-4">Total Amount: </span> {{$order->order_total}} TK</li>
                                    </ul>
                                </div>

                                <div class="row mt-5 text-center">
                                    <div class="col-md-4">
                                        <hr>
                                        <span>Prepared By</span>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <hr >
                                        <span>Received By</span>
                                    </div>
                                </div>

                                <hr class="mt-5">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p>Thank you for your purchase</p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
