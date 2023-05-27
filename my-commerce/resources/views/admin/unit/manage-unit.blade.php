@extends('admin.master')
@section('title')
@endsection
@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <h4 class="card-title text-center">Manage Unit</h4>
            <h6 class="card-subtitle text-success text-center">{{session('message')}}</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-striped border">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Unit Name</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                    @foreach($units as $unit)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$unit->name}}</td>
                            <td class="col-md-3">{{$unit->code}}</td>
                            <td class="col-md-3">{{$unit->description}}</td>
                            <td>
                                @if($unit->status == 1)
                                    <span class="text-success">Published</span>
                                @else
                                    <span class="text-warning">Unpublished</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('unit.edit', ['id'=>$unit->id])}}" class="btn btn-success">
                                    <i class="ti ti-layout-media-center"></i>
                                </a>
                                @if($unit->status == 1)
                                    <a href="{{route('unit.status', ['id'=>$unit->id])}}" class="btn btn-warning">
                                        <i class="ti ti-book"></i>
                                    </a>
                                    @else
                                    <a href="{{route('unit.status', ['id'=>$unit->id])}}" class="btn btn-success">
                                        <i class="ti ti-bookmark"></i>
                                    </a>
                                @endif
                                <form action="{{route('unit.delete')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$unit->id}}">
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
