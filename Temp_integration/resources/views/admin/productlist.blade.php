@extends('layouts.app')
@section('content')
<script>
$(document).ready(function() {
    $(".deleteRecord").click(function() {
        if (confirm("Do you want to Delete this record")) {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "product/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(response) {
                    $("#cid" + id).remove();
                }
            });
        }
    });
});
</script>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Product List') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        @guest
                        <!-- <a class="btn btn-info" href="{{ route('login') }}">{{ __('Login') }}</a> -->
                        @endguest
                        @auth
                            @if(!request()->has('trashed'))
                                <a class="btn btn-warning" href="{{ route('product.index',['trashed'=>'products'])}}"> Deleted
                                    Products</a>
                                <a class="btn btn-success" href="{{ route('product.create')}}"> Add Product</a>
                                @else
                                <a class="btn btn-success" href="{{ route('product.index')}}"> Back</a>
                            @endif
                        @endauth
                    </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    @if(!request()->has('trashed'))
                    <form action="{{ route('product.index') }}">
                        <select name="activedata" id="activedata" style=border-color:black;
                            class=" btn col-md-3 @error('name') is-invalid @enderror">
                            <option value="">All</option>
                            @foreach ($cat as $key => $value)
                            <option value="{{$value->id}}" {{$value->id==$selectedid?"selected":""}}>                                    {{$value->cname}}
                            </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-info">Show</button>
                    </form>
                    @endif
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>createdbyuser</th>
                                <th>Active</th>
                                <th>Image</th>
                                @auth
                                <th>Action</th>
                                @endauth
                            </tr>
                        </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                            <tr id="cid{{$value->id}}">
                                <td>{{ ++$i }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->cname }}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->active=="1"?"Yes":"No"}}</td>
                                <td><img src=" {{ asset('images/' . $value->images)}}" width="160" height="80"></td>
                                @auth
                                <td>
                                @if(request()->has('trashed'))
                                <form action="{{ route('product.fdelete',$value->id) }}" method="GET">
                                    <a class="btn btn-primary" href="{{ route('product.restore',$value->id) }}">Restore</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                @else
                                <a class="btn btn-primary" href="{{ route('product.edit',$value->id) }}">Edit</a>
                                <button data-id="{{ $value->id }}" class="deleteRecord btn btn-danger">Delete</button>
                                @endif
                                </td>@endauth
                            </tr>
                            @endforeach
                            @if($data->isEmpty ())
                            <td colspan='7'>
                                <center>No records Found</center>
                            </td>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@if ($message = Session::get('success'))
<script>
    toastr.success("{!!Session::get('success')!!}")
</script>
@endif
<script>
$(function() {
    $('#example2').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
</body>

</html>
@endsection