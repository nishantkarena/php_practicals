@extends('layouts.app')
@section('content')
<script>
$(document).ready(function() {
    $(".deleteRecord").click(function() {
        if (confirm("Do you want to Delete this record")) {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "admin/" + id,
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
                <h1 class="m-0">{{ __('Admin List') }}</h1>
                    </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                @if(auth()->user()->usertype=="1")
                                  @if(!request()->has('trashed'))
                                  <a class="btn btn-warning" href="{{ route('admin.index',['trashed'=>'users'])}}"> Deleted admins</a>
                                  <a class="btn btn-success" href="{{ route('admin.create')}}"> Add Admin</a>
                                  @else
                                  <a class="btn btn-success" href="{{ route('admin.index')}}"> Back</a>
                                  @endif
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
                <div id="msg1">
                      @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                          <p>{{ $message }}</p>
                      </div>
                      @endif
                </div>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Hobbies</th>
                        @if(auth()->user()->usertype=="1")
                        <th>Action</th>
                        @endif
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($data as $key => $value)
                    <tr id="cid{{$value->id}}">
                        <td>{{ ++$i }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{$value->gender}}</td>
                        <td>{{$value->hobbies}}</td>
                        @if(auth()->user()->usertype=="1")
                        <td> @if(request()->has('trashed'))
                            <form action="{{ route('admin.fdelete',$value->id) }}" method="GET">
                                <a class="btn btn-primary" href="{{ route('admin.restore',$value->id) }}">Restore</a>
                                @csrf
                                @method('DELETE')
                                 <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @else
                            <a class="btn btn-primary" href="{{ route('admin.edit',$value->id) }}">Edit</a>
                            <button data-id="{{ $value->id }}" class="deleteRecord btn btn-danger">Delete</button>
                            @endif
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    @if($data->isEmpty ())
                    <td colspan='6'>
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

<script>
  $(function () {
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
