@extends('layouts.app')
@section('content')
<script>
$(document).ready(function() {
    $(".deleteRecord").click(function() {
        if (confirm("Do you want to Delete this record")) {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "category/" + id,
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
                <h1 class="m-0">{{ __('Category List') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        @if(!request()->has('trashed'))
                        <a class="btn btn-warning" href="{{ route('category.index',['trashed'=>'categories'])}}"> Deleted
                            Categories</a>
                        <a class="btn btn-success" href="{{ route('category.create')}}"> Add Category</a>
                        @else
                        <a class="btn btn-success" href="{{ route('category.index')}}"> Back</a>
                        @endif
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
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category Name</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key => $value)
                                <tr id="cid{{$value->id}}">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $value->cname }}</td>
                                    <td>{{$value->active=="1"?"Yes":"No"}}</td>
                                    <td>
                                        @if(request()->has('trashed'))
                                        <form action="{{ route('category.fdelete',$value->id) }}" method="GET">
                                            <a class="btn btn-primary" href="{{ route('category.restore',$value->id) }}">Restore</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        @else
                                        <a class="btn btn-primary" href="{{ route('category.edit',$value->id) }}">Edit</a>
                                        <button data-id="{{ $value->id }}" class="deleteRecord btn btn-danger">Delete</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @if($data->isEmpty ())
                                <td colspan='4'>
                                    <center>No records Found</center>
                                </td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="d-flex justify-content-center">
                        {!!$data->links()!!}
                    </div>
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