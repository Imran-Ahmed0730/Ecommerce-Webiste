@extends('admin.master')
@section('title')
@endsection
@section('content')
    <div class="row mt-3">
        <div class="col-lg-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Edit Product Form</h4>
                    <hr>
                    {{--                    <h6 class="card-subtitle">Use Bootstrap's predefined grid classes for horizontal form</h6>--}}
                    <form class="form-horizontal p-t-20" method="post" action="{{route('product.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                <select name="category_id" id="CategoryId" class="form-control">
                                    <option value="Choose A Category" disabled selected>Choose A Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                            {{$category->id == $product->category_id ? 'selected': ''}}>
                                            {{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Sub-Category Name<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                <select name="subcategory_id" id="SubCategoryId" class="form-control">
                                    <option value="" disabled selected>Choose A Sub-Category</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}"
                                            {{$subcategory->id == $product->subcategory_id ? 'selected': ''}}
                                        >{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Brand Name<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                <select name="brand_id" id="" class="form-control">
                                    <option value="" disabled selected>Choose A Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}"
                                            {{$brand->id == $product->brand_id ? 'selected': ''}}
                                        >{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Unit Type<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                <select name="unit_id" id="" class="form-control">
                                    <option value="" disabled selected>Choose A Unit</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}"
                                            {{$unit->id == $product->unit_id ? 'selected': ''}}
                                        >{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Name<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{$product->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Code<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="code" value="{{$product->code}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Model<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="model" value="{{$product->model}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Stock Amount<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="stock_amount" value="{{$product->stock_amount}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Price Price<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="regular_price" value="{{$product->regular_price}}">
                                    <input type="number" class="form-control" name="selling_price" value="{{$product->selling_price}}">
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea name="short_description" id="" cols="30" rows="5" class="form-control" placeholder="Short Description">
                                    {{$product->short_description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea name="long_description" id="" cols="30" rows="10" class="form-control summernote" placeholder="Long Description">
                                    {{$product->long_description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Feature Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now" name="feature_image" class="dropify" accept="image/*"/>
                                <img src="{{asset($product->feature_image)}}" alt="" srcset="" class="img-fluid m-2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Other Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now" multiple name="other_image[]" class="dropify" accept="image/*"/>
                                @foreach($product->otherImages as $other_images)
                                    <img src="{{asset($other_images->image)}}" alt="" srcset="" class="m-2" height="100px" width="150px">
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Product Status</label>
                            <div class="col-sm-9">
                                <label class=" mx-3"><input type="radio"  name="status" value="1" {{$product->status == 1 ? 'checked': ''}}>Published</label>
                                <label><input type="radio"  name="status" value="0" {{$product->status == 0 ? 'checked': ''}}>Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
