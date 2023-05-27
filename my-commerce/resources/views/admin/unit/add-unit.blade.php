@extends('admin.master')
@section('title')
@endsection
@section('content')
    <div class="row mt-3">
        <div class="col-lg-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Add Unit Form</h4>
                    <hr>
{{--                    <h6 class="card-subtitle">Use Bootstrap's predefined grid classes for horizontal form</h6>--}}
                    <form class="form-horizontal p-t-20" method="post" action="{{route('unit.new')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Unit Name<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" placeholder="Unit Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputunit3" class="col-sm-3 control-label">Unit Code<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="code" placeholder="Unit Code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Unit Description</label>
                            <div class="col-sm-9">
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Unit Description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Unit Status</label>
                            <div class="col-sm-9">
                                    <label class=" mx-3"><input type="radio"  name="status" value="1" checked>Publish</label>
                                    <label><input type="radio"  name="status" value="0">Unpublish</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create Unit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
