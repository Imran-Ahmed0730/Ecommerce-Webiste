@extends('admin.master')
@section('title')
    Order Details
@endsection
@section('content')
    <div class="row mt-5">
        <div class="col-md-10 offset-1">
            <h2 class="text-center mb-5">Order Information</h2>

            <form action="{{route('order.update')}}" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="" class="col-md-3">Order ID</label>
                    <div class="col-md-9">
                        <input type="text" name="order_id" value="{{$order->id}}" class="form-control" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-md-3">Order Total</label>
                    <div class="col-md-9">
                        <input type="text" name="" value="{{$order->order_total}}" class="form-control" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-md-3">Order Status</label>
                    <div class="col-md-9">
                        <select name="order_status" id="" class="form-control">
                            <option value="Pending" {{$order->order_status == 'Pending' ? 'selected' : ' '}} >Pending</option>
                            <option value="Processing" {{$order->order_status == 'Processing' ? 'selected' : ' '}}>Processing</option>
                            <option value="Complete" {{$order->order_status == 'Complete' ? 'selected' : ' '}}>Complete</option>
                            <option value="Cancel" {{$order->order_status == 'Cancel' ? 'selected' : ' '}}>Cancel</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-md-3">Order Total</label>
                    <div class="col-md-9">
                        <textarea name="delivery_address" class="form-control" >{{$order->delivery_address}}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <input type="submit" value="Update Order" class="form-control btn btn-success w-100">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
