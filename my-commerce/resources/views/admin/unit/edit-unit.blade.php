@extends('admin.master')
@section('title')
@endsection
@section('content')
    <div class="row mt-3">
        <div class="col-lg-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Edit Unit Form</h4>
                    <hr>
                    {{--                    <h6 class="card-subtitle">Use Bootstrap's predefined grid classes for horizontal form</h6>--}}
                    <form class="form-horizontal p-t-20" method="post" action="{{route('unit.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$unit->id}}">
                        <div class="form-group row">
                            <label for="Unit Name" class="col-sm-3 control-label">Unit Name<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{$unit->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Unit Name" class="col-sm-3 control-label">Unit Code<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="code" value="{{$unit->code}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Unit Description" class="col-sm-3 control-label">Unit Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{$unit->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Publication Status" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                @if($unit->status == 1)
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
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Unit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
