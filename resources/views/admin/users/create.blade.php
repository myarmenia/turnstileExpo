{{--
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif



{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection --}}

@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Users</h5>

                        <form class="row g-3" action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') _incorrectly @enderror" id="name" name="name" value="{{ old('name')}}">
                                @error('name')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="second_name" class="form-label">Second Name</label>
                                <input type="text" class="form-control @error('second_name') _incorrectly @enderror" id="second_name" name="second_name" value="{{ old('second_name')}}">
                                @error('second_name')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') _incorrectly @enderror" id="email" name="email" value="{{ old('email')}}">
                                @error('email')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Password</label>
                                <input type="text" class="form-control @error('password') _incorrectly @enderror" id="password" name="password" value="{{ old('password')}}">
                                @error('password')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <input type="text" class="form-control @error('confirm-password') _incorrectly @enderror" id="confirm-password" name="confirm-password" value="{{ old('confirm-password')}}">
                                @error('confirm-password')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>

                            {{-- <div class="col-12">
                                <label for="email" class="form-label">Role</label>
                                <input type="text" class="form-control @error('email') _incorrectly @enderror" id="email" name="email" value="{{ old('email')}}">
                                @error('email')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div> --}}


                            <div class="col-12">
                                <label for="select_role" class="form-label pt-2 mx-2">Roles</label>

                                <select id="select_role" class="form-select w-50" name="roles[]" multiple>
                                    @foreach ($roles as $role)
                                        <option value="{{$role}}">{{$role}}</option>
                                    @endforeach

                                </select>
                                @error('roles')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="items_div d-flex flex-wrap justify-content-between"> </div>

                            <div class="text-start">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form><!-- Vertical Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('js-scripts')
    {{-- <script src="{{ asset('assets/back/js/press-releases.js') }}"></script> --}}
@endsection
