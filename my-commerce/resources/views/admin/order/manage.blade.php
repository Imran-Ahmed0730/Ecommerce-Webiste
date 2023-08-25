@extends('admin.master')
@section('title')
    Manage Order
@endsection
@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <h4 class="card-title text-center">Manage order</h4>
            <h6 class="card-subtitle text-success text-center">{{session('message')}}</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-striped border">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Customer Info</th>
                        <th>Order Total</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$order->id}}</td>
                            <td class="">{{$order->order_date}}</td>
                            <td>
                                {{$order->customer->name}} ({{$order->customer->mobile}})
                            </td>
                            <td>{{$order->order_total}}</td>
                            <td>{{$order->order_status}}</td>
                            <td>
                                {{$order->payment_status}}
                            </td>
                            <td class="btn-group">
                                <a href="{{route('order.details', ['id'=>$order->id])}}" class="btn btn-info">
                                    <i class="ti ti-info"></i>
                                </a>
                                <a href="{{route('order.edit', ['id'=>$order->id])}}" class="btn btn-success mx-2 {{$order->order_status == 'Complete' ? 'disabled':''}}">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <a href="{{route('order.invoice.show', ['id'=>$order->id])}}" class="btn btn-warning">
                                    <i class="ti ti-layout-media-overlay-alt-2"></i>
                                </a>
                                <a href="{{route('order.invoice.print', ['id'=>$order->id])}}" target="_blank" class="btn btn-primary mx-2">
                                    <i class="ti ti-printer"></i>
                                </a>
                                <form action="{{route('order.delete')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$order->id}}">
                                    <button type="submit" class="btn btn-danger {{$order->order_status == 'Cancel' ? '':'disabled'}}" onclick=" return confirm('Confirm Before Deleting it!!')"><i class="ti ti-trash"></i></button>
                                </form>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
