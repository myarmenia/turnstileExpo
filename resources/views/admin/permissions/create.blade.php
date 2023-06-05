

@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Permissions</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">Permission</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Permission</h5>

                        <form class="row g-3" action="{{ route('admin.permissions.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') _incorrectly @enderror" id="name" name="name" value="{{ old('name')}}">
                                @error('name')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>

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


