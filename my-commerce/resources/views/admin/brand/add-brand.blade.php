@extends('admin.master')
@section('title')
@endsection
@section('content')
    <div class="row mt-3">
        <div class="col-lg-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Add Brand Form</h4>
                    <hr>
{{--                    <h6 class="card-subtitle">Use Bootstrap's predefined grid classes for horizontal form</h6>--}}
                    <form class="form-horizontal p-t-20" method="post" action="{{route('brand.new')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Brand Name<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" placeholder="Brand Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Brand Description</label>
                            <div class="col-sm-9">
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Brand Description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Brand Image</label>
                            <div class="col-sm-9">
                                    <input type="file" id="input-file-now" name="image" class="dropify" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Brand Status</label>
                            <div class="col-sm-9">
                                    <label class=" mx-3"><input type="radio"  name="status" value="1" checked>Publish</label>
                                    <label><input type="radio"  name="status" value="0">Unpublish</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create Brand</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
