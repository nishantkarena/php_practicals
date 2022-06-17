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
            images: {
                required: true,
            }
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Product') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data"
                        id="regForm">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

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
                                    class="form-control @error('category_id') is-invalid @enderror" required>
                                    @foreach ($cat as $key => $value)
                                    <option value="{{$value->id}}">{{$value->cname}}</option>
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
                            <label for="active" class="col-md-4 col-form-label text-md-end">{{ __('Active') }}</label>
                            <div class="col-md-6">
                                <select name="active" id="active"
                                    class="form-control @error('active') is-invalid @enderror" required>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                @error('active')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="images" class="col-md-4 col-form-label text-md-end">{{ __('File') }}</label>

                            <div class="col-md-6">
                                <input name="images" id="images" type="file"
                                    class="form-control @error('images') is-invalid @enderror" accept=".jpg,.jpeg,.png">

                                @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                                <a class="btn btn-primary" href="{{ route('admin.index') }}"> Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection