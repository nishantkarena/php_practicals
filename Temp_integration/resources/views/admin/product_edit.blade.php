@extends('layouts.app')

@section('content')
<script>
$(document).ready(function() {
    $("#regForm").validate({
        rules: {
            name: {
                required: true,
                maxlength: 20,
                minlength: 4,
            },
        },
        messages: {
            name: {
                required: "First name is required",
                maxlength: "First name cannot be more than 20 characters"
            },
        }
    });
});
</script>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Edit Product') }}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('product.update',$data->id) }}"
                            enctype="multipart/form-data" id="regForm">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Category Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{ $data->name }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name" required
                                        autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="category"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>
                                <div class="col-md-6">
                                    <select name="category_id" id="category_id"
                                        class="form-control @error('name') is-invalid @enderror" required>
                                        @foreach ($cat as $key => $value)
                                        <option value="{{$value->id}}"
                                            {{$data->category_id==$value->id ? "selected":""}}>
                                            {{$value->cname}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="active"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Active') }}</label>
                                <div class="col-md-6">
                                    <select name="active" id="active"
                                        class="form-control @error('name') is-invalid @enderror" required>
                                        <option value="1" {{$data->active=="1"?"selected":""}}>Yes</option>
                                        <option value="0" {{$data->active=="0"?"selected":""}}>No</option>
                                    </select>
                                    @error('active')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="file" class="col-md-4 col-form-label text-md-end">{{ __('File') }}</label>

                                <div class="col-md-6">
                                    <input name="images" id="images" type="file"
                                        class="form-control @error('name') is-invalid @enderror"
                                        accept=".jpg,.jpeg,.png">

                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <span>Last Uploded File : {{$data->images}}</span>
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                    <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection