@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('Category List') }}
                <div style="float:right; padding-bottom:10px;">
                    <a class="btn btn-success" href="{{ route('category.create')}}">Add Category</a>
                    <a class="btn btn-warning" href="{{ route('admin.index') }}">Back</a>
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
                        <th>Category Name</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $value->cname }}</td>
                        <td>{{$value->active=="1"?"Yes":"No"}}</td>
                        <td>
                            <form action="{{ route('category.destroy',$value->id) }}" method="POST">
                                <!-- <a class="btn btn-primary" href="">Edit</a> -->
                                <a class="btn btn-primary" href="{{ route('category.edit',$value->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($data->isEmpty ())
                    <td colspan='4'>
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