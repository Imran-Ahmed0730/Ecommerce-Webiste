@extends('admin.master')
@section('title')
@endsection
@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <h4 class="card-title text-center">All Product Information</h4>
            <h6 class="card-subtitle text-center text-success">{{session('message')}}</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-striped border">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Stock Amount</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                    @foreach($products as $product)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->code}}</td>
                            <td>{{$product->stock_amount}}</td>
                            <td>
                                <img src="{{asset($product->feature_image)}}" alt="" srcset="" class="img-fluid" width="200px">
                            </td>
                            <td>
                                {{$product->status == 1 ? 'Published': 'Unpublished'}}
{{--                                @if($product->status == 1)--}}
{{--                                    <span class="text-success">Published</span>--}}
{{--                                @else--}}
{{--                                    <span class="text-warning">Unpublished</span>--}}
{{--                                @endif--}}
                            </td>
                            <td>
                                <a href="{{route('product.edit', ['id'=>$product->id])}}" class="btn btn-success">
                                    <i class="ti ti-layout-media-center"></i>
                                </a>
                                @if($product->status == 1)
                                    <a href="{{route('product.detail', ['id'=>$product->id])}}" class="btn btn-warning">
                                        <i class="ti ti-book"></i>
                                    </a>
                                @else
                                    <a href="{{route('product.status', ['id'=>$product->id])}}" class="btn btn-success">
                                        <i class="ti ti-bookmark"></i>
                                    </a>
                                @endif
                                <form action="{{route('product.delete')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <button type="submit" class="btn btn-danger" onclick="confirm('Confirm Before Deleting it!!')"><i class="ti ti-trash"></i></button>
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
