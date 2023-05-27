@extends('admin.master')
@section('title')
@endsection
@section('content')
    <div class="row mt-3">
        <div class="col-lg-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Edit Brand Form</h4>
                    <hr>
                    {{--                    <h6 class="card-subtitle">Use Bootstrap's predefined grid classes for horizontal form</h6>--}}
                    <form class="form-horizontal p-t-20" method="post" action="{{route('brand.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$brand->id}}">
                        <div class="form-group row">
                            <label for="Category Name" class="col-sm-3 control-label">Brand Name<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{$brand->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Category Description" class="col-sm-3 control-label">Brand Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{$brand->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="Category Image">Brand Image</label>
                            <div class="col-sm-9">
                                <img src="{{asset($brand->image)}}" alt="" srcset="" class="img-fluid my-3">
                                <input type="file" id="input-file-now" name="image" class="dropify" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Publication Status" class="col-sm-3 control-label">Brand Status</label>
                            <div class="col-sm-9">
                                @if($brand->status == 1)
                                <label class=" mx-3"><input type="radio"  name="status" value="1" checked>Publish</label>
                                <label><input type="radio"  name="status" value="2">Unpublish</label>
                                @else
                                    <label class=" mx-3"><input type="radio"  name="status" value="1" >Publish</label>
                                    <label><input type="radio"  name="status" value="2" checked>Unpublish</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Brand</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
