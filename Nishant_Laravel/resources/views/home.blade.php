@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('Admin List') }}
                <div style="float:right; padding-bottom:10px;">
                    @if(auth()->user()->usertype=="1")
                    <a class="btn btn-success" href="{{ route('admin.create') }}"> Add Admin</a>
                    @endif
                    <a class="btn btn-success" href="{{ route('category.index')}}"> Category</a>
                    <a class="btn btn-success" href="{{ route('product.index')}}"> Product</a>
                </div>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <table class="table table-bordered">
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

                    @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{$value->gender}}</td>
                        <td>{{$value->hobbies}}</td>
                        @if(auth()->user()->usertype=="1")
                        <td>
                            <form action="{{ route('admin.destroy',$value->id) }}" method="POST">
                                <!-- <a class="btn btn-primary" href="">Edit</a> -->
                                <a class="btn btn-primary" href="{{ route('admin.edit',$value->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    @if($data->isEmpty ())
                    <td colspan='6'>
                        <center>No records Found</center>
                    </td>
                    @endif
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {!!$data->links()!!}
            </div>
        </div>
    </div>
</div>


@endsection