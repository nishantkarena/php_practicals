@extends('layouts.app')

@section('content')
<script>
$(document).ready(function() {
    $("#regForm").validate({
        rules: {
            name: {
                required: true,
                maxlength: 14,
                minlength: 4,
            },
        },
        messages: {
            required: "Category name is required",
            maxlength: "Category name cannot be more than 14 characters",
            minlength: "Category must be at least 5 characters"
        }
    });
});
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('category.update',$data->id) }}" id="regForm">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-end">{{ __('Category Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" value="{{ $data->cname }}"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    autocomplete="name" autofocus>
                                @error('name')
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

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                                <a class="btn btn-primary" href="{{ route('category.index') }}"> Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection