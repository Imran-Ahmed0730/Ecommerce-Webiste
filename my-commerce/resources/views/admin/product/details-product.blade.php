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
                    <tbody>
                    <tr>
                        <th>Product Id</th>
                        <td>{{$product->id}}</td>
                    </tr>
                    <tr>
                        <th>Product Name</th>
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                        <th>Category Name</th>
                        <td>{{$product->category->name}}</td>
                    </tr>
                    <tr>
                        <th>Sub-Category Name</th>
                        <td>{{$product->subcategory->name}}</td>
                    </tr>
                    <tr>
                        <th>Brand Name</th>
                        <td>{{$product->brand->name}}</td>
                    </tr>
                    <tr>
                        <th>Unit</th>
                        <td>{{$product->unit->name}}</td>
                    </tr>

                    <tr>
                        <th>Product Code</th>
                        <td>{{$product->code}}</td>
                    </tr>
                    <tr>
                        <th>Product Model</th>
                        <td>{{$product->model}}</td>
                    </tr><tr>
                        <th>Stock Amount</th>
                        <td>{{$product->stock_amount}}</td>
                    </tr>
                    <tr>
                        <th>Regular Price</th>
                        <td>{{$product->regular_price}}</td>
                    </tr>
                    <tr>
                        <th>Selling Price</th>
                        <td>{{$product->selling_price}}</td>
                    </tr>
                    <tr>
                        <th>Feature Image</th>
                        <td>
                            <img src="{{asset($product->feature_image)}}" alt="" srcset="" height="100px" width="150px">
                        </td>
                    </tr>
                    <tr>
                        <th>Other Images</th>
                        <td>
                            @foreach($product->otherImages as $other_images)
                                <img src="{{asset($other_images->image)}}" alt="" srcset="" class="mx-2" height="100px" width="150px">
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Hit Count</th>
                        <td>{{$product->hit_count}}</td>
                    </tr>
                    <tr>
                        <th>Sales Count</th>
                        <td>{{$product->sales_count}}</td>
                    </tr>
                    <tr>
                        <th>Feature Status</th>
                        <td>{{$product->feature_stauts==1 ? 'Featured': 'Not Featured'}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{$product->stauts==1 ? 'Published': 'Not Published'}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
