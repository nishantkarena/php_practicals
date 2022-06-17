@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('Product List') }}
                @auth
                <div style="float:right; padding-bottom:10px;">
                    <a class="btn btn-success" href="{{ route('admin.index') }}"> Home</a>
                </div>
                @endauth
            </div>
            <div class="card-body">
                @guest
                <!-- <a class="btn btn-info" href="{{ route('login') }}">{{ __('Login') }}</a> -->
                @endguest
                <form action="{{ route('welcome.index') }}">
                    <select name="activedata" id="activedata" style=border-color:black;
                        class=" btn col-md-3 @error('name') is-invalid @enderror">
                        <option value="">All</option>
                        @foreach ($cat as $key => $value)
                        <option value="{{$value->id}}" {{$value->id==$selectedid?"selected":""}}>{{$value->cname}}
                        </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-info">Show</button>
                </form>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>createdbyuser</th>
                        <th>Active</th>
                        <th>Image</th>


                    </tr>
                    @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->cname }}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->active=="1"?"Yes":"No"}}</td>

                        <td><img src=" {{ asset('images/' . $value->images)}}" width="160" height="80"></td>
                    </tr>
                    @endforeach
                    @if($data->isEmpty ())
                    <td colspan='7'>
                        <center>No records Found</center>
                    </td>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection