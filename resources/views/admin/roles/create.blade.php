@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Roles</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Role</h5>

                        <form class="row g-3" action="{{ route('admin.roles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') _incorrectly @enderror" id="name" name="name" value="{{ old('name')}}">
                                @error('name')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="avatar" class="form-label">Avatar</label>
                                <input type="file" class="form-control" id="avatar" name="avatar"
                                    accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG">
                                @error('avatar')
                                <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="avatar_div "> </div>
                            <div class="col-12">
                                <label for="permission" class="form-label">Permission</label>
                                @error('permission')
                                    <div class="error_message mb-2" > {{ $message }} </div>
                                @enderror
                                @foreach($permission as $value)
                                    <div>
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $value->id }}">
                                        <label for="permission" class="form-label">{{ $value->name }} </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-start">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js-scripts')
    <script src="{{ asset('assets/back/js/role.js') }}"></script>
@endsection


