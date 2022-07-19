<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products</h1>
                    </div>
                    <div class="col-sm-6">
                        @auth
                        <div style="float:right; padding-bottom:10px;">
                            <a class="btn btn-success" href="{{ route('admin.index') }}"> Home</a>
                        </div>
                        @endauth
                        @guest
                        <div style="float:right; padding-bottom:10px;">
                            <a class="btn btn-success" href="{{ route('login') }}"> Admin Login</a>
                        </div>
                        @endguest
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body pb-0">
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
                    <div class="row">
                        @foreach ($data as $key => $value)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    {{ $value->cname }}
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b>{{ $value->name }}</b></h2>
                                            <p class="text-muted text-sm"><b>Created By User: </b> {{$value->email}}
                                            </p>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src=" {{ asset('images/' . $value->images)}}" alt="user-avatar"
                                                class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>

</html>