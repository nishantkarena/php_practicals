@extends('posts.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="fname" value="{{ $post->fname }}" class="form-control" placeholder="First Name">
                    @if ($errors->has('fname'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="lname" value="{{ $post->lname }}" class="form-control" placeholder="Last Name">
                    @if ($errors->has('lname'))
                            <span class="text-danger">{{ $errors->first('lname') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $post->email }}" class="form-control" placeholder="Email">
                    @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gender:</strong>
                    <div class="input-group">
                    <input type="radio" class="form-control" name="gender" id="male" value="male" {{$post->gender=="male"?"checked":""}} >
					<span class="input-group-addon"><i class="fa fa-male">Male</i></span>
                    <input type="radio" class="form-control" name="gender" id="female" value="female" {{$post->gender=="female"?"checked":""}}>
                    <span class="input-group-addon"> <i class="fa fa-female">Female</i></span>
						</div>
                    @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Detail">{{ $post->description }}</textarea>
                    @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Designation:</strong>
                    <select name="designation" id="designation" class="form-control">
                        <option value="">Select</option>
                        <option value="project_manager"{{$post->designation=="project_manager"?"selected":""}}>Project Manager</option>
                        <option value="junior_developer"{{$post->designation=="junior_developer"?"selected":""}}>Jr.Developer</option>
                        <option value="senior_developer"{{$post->designation=="senior_developer"?"selected":""}}>Sr.Developer</option>
                        <option value="Human_Resource"{{$post->designation=="Human_Resource"?"selected":""}}>Human Resource</option>
                    </select>
                    @if ($errors->has('designation'))
                            <span class="text-danger">{{ $errors->first('desgination') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection