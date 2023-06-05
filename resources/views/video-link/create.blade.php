@extends('layouts.auth-app')
@section('link')
<link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

{{--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
<div class="pagetitle">
    <h1>Press Release Videos</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Press Release Videos</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Press Release Videos</h5>


                    <form class="row g-3" action="{{ route('press-release-videos.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf


                        @for ($i = 0; $i < 3; $i++)
                            <div class="col-5">
                                @foreach (languages() as $lng)
                                <div class="col-12 my-4">
                                    <label for="title_{{$lng->name}}_{{ $i }}" class="form-label">Title {{ Str::upper($lng->name)
                                        }}</label>
                                    <input type="text"
                                        class='form-control @error("links.$i.title.$lng->id") _incorrectly @enderror'
                                        id="title_{{$lng->name}}_{{ $i }}" name="links[{{ $i }}][title][{{ $lng->id }}]"
                                        value='{{ old("links.$i.title.$lng->id")}}'>
                                    @error("links.$i.title.$lng->id")
                                    <div class="error_message"> {{ $message }} </div>
                                    @enderror
                                </div>
                                @endforeach
                            </div>

                            <div class="col-5 ms-5">
                                <div class="col-12 my-4">
                                    <label for="link_{{ $i }}" class="form-label">Youtube Link</label>
                                    <input type="text" class='form-control @error("links.$i.link") _incorrectly @enderror' id="link_{{ $i }}"
                                        name="links[{{ $i }}][link]"
                                        value='{{ old("links.$i.link")}}'>
                                    @error("links.$i.link")
                                    <div class="error_message"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="col-12 my-4">

                                </div>
                            </div>
                        @endfor
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
<script src="{{ asset('assets/back/js/regional_monitoring.js') }}"></script>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection