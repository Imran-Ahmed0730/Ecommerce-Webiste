@extends('admin.master')
@section('title')
@endsection
@section('content')
    <div class="row mt-3">
        <div class="col-lg-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Add Sub-Category Form</h4>
                    <hr>
                    <form class="form-horizontal p-t-20" method="post" action="{{route('subcategory.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$subcategory->id}}">
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                <select name="category_id" id="" class="form-control">
                                    <option value="Choose A Category" disabled selected>Choose A Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $subcategory->category_id ? 'selected':''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Sub-Category Name<span class="text-danger"></span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{$subcategory->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Category Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$subcategory->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Category Image</label>
                            <div class="col-sm-9">
                                <img src="{{asset($subcategory->image)}}" alt="" srcset="" class="img-fluid my-3">
                                <input type="file" id="input-file-now" name="image" class="dropify" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class=" mx-3"><input type="radio"  name="status" value="1" {{$subcategory->status == 1 ? 'checked':''}}>Publish</label>
                                <label><input type="radio"  name="status" value="0" {{$subcategory->status == 0 ? 'checked':''}}>Unpublish</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
