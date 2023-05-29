@extends('layouts.auth-app')
@section('link')
<link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

{{--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
<div class="pagetitle">
    <h1>Regional monitoring</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Regional monitoring</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Regional monitoring</h5>


                    <form class="row g-3" action="{{ route('current-earthquakes.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @foreach (languages() as $lng)
                        <div class="col-lg-12">
                            <label for="description_{{$lng->name}}" class="form-label">Description {{
                                Str::upper($lng->name) }}</label>
                            <textarea
                                class='ckeditor form-control @error("translations.$lng->id.description") _incorrectly @enderror'
                                name="translations[{{$lng->id}}][description]"
                                id="description_en">{{ old("translations.$lng->id.description")}}</textarea>
                            @error("translations.$lng->id.description")
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        @endforeach
                        <div class="col-lg-12">

                            <div class="col-12">
                                <label for="items" class="form-label">Files</label>
                                <input type="file" class="form-control" id="items" name="items[]" multiple>
                                @error('items')
                                <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="items_div d-flex flex-wrap justify-content-between mt-3 "> </div>
                            <div class="text-start mt-3">
                                <button class="btn btn-primary">Submit</button>
                                {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
                            </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js-scripts')
<script src="{{ asset('assets/back/js/current_earthquakes_create.js') }}"></script>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection