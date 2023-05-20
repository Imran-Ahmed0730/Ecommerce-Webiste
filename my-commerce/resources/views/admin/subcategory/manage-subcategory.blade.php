@extends('admin.master')
@section('title')
@endsection
@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <h4 class="card-title">Data Table</h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-striped border">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Sub-Category Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                    @foreach($subcategories as $subcategory)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$subcategory->category_id}}</td>
                            <td>{{$subcategory->name}}</td>
                            <td class="col-md-3">{{$subcategory->description}}</td>
                            <td>
                                <img src="{{asset($subcategory->image)}}" alt="" srcset="" class="img-fluid" width="200px">
                            </td>
                            <td>
                                @if($subcategory->status == 1)
                                    <span class="text-success">Published</span>
                                @else
                                    <span class="text-warning">Unpublished</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('category.edit', ['id'=>$subcategory->id])}}" class="btn btn-success">
                                    <i class="ti ti-layout-media-center"></i>
                                </a>
                                @if($subcategory->status == 1)
                                    <a href="{{route('subcategory.status', ['id'=>$subcategory->id])}}" class="btn btn-warning">
                                        <i class="ti ti-book"></i>
                                    </a>
                                @else
                                    <a href="{{route('subcategory.status', ['id'=>$subcategory->id])}}" class="btn btn-success">
                                        <i class="ti ti-bookmark"></i>
                                    </a>
                                @endif
                                <form action="{{route('subcategory.delete')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$subcategory->id}}">
                                    <button type="submit" class="btn btn-danger"><i class="ti ti-trash"></i></button>
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
