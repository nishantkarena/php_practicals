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
            email: {
                required: true,
                email: true,
                maxlength: 50,
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 12,
            },

        },
        messages: {
            name: {
                required: "First name is required",
                maxlength: "First name cannot be more than 14 characters"
            },
            email: {
                required: "Email is required",
                email: "Email must be a valid email address",
                maxlength: "Email cannot be more than 50 characters",
            },
            password: {
                required: "Password is required",
                minlength: "Password must be at least 6 characters",
                maxlength: "Password cannot be more than 12 characters",
            },

        }
    });
});
</script>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Add Admin') }}</h1>
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
                        <form method="POST" action="{{ route('admin.store') }}" id="regForm">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gender"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                                <div class="col-md-6">
                                    <input id="male" type="radio" class=" @error('gender') is-invalid @enderror"
                                        name="gender" value="Male" checked>Male

                                    <input id="female" type="radio" class=" @error('gender') is-invalid @enderror"
                                        name="gender" value="Female">Female

                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="gender"
                                    class="col-md-4 col-form-label text-md-end">{{ __('hobbies') }}</label>
                                <div class="col-md-6">
                                    <input id="hobbies[]" type="checkbox"
                                        class=" @error('hobbies') is-invalid @enderror" name="hobbies[]"
                                        value="Cricket">Cricket<br>

                                    <input id="hobbies[]" type="checkbox"
                                        class=" @error('hobbies') is-invalid @enderror" name="hobbies[]"
                                        value="Swimming">Swimming<br>

                                    <input id="hobbies[]" type="checkbox"
                                        class=" @error('hobbies') is-invalid @enderror" name="hobbies[]"
                                        value="Singing">Singing<br>

                                    <input id="hobbies[]" type="checkbox"
                                        class=" @error('hobbies') is-invalid @enderror" name="hobbies[]"
                                        value="Shopping">Shopping

                                    @error('hobbies')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
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
</section>
@endsection