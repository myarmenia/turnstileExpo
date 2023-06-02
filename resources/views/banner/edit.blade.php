@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
            <div class="pagetitle">
              <h1>Edit Banner </h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item">Region info</li>
                  <li class="breadcrumb-item active">Create</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->

    {{-- ========== --}}
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit Banner</h5>

                <!-- News Form -->

                <form class="row g-3" action="{{route('banner.update', $banner->id)}}"  id="banner"  data-type="" method="post" enctype="multipart/form-data">
                    {{-- @csrf --}}
                    @csrf
                    @method('PUT')

                        <div class="banner_section">
                            <div class="section_banner" data-quequ=1>

                                @foreach (languages() as $lng)
                                    <div class="col-lg-12">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Description {{ Str::upper($lng->name) }}</label>

                                        <textarea class='form-control @error("translations.$lng->id.description") _incorrectly @enderror' name="translations[{{$lng->id}}][content]">{{ $banner->translation($lng->id)->content}}</textarea>
                                        @error("translations.$lng->id.description")
                                            <div class="error_message" > {{ $message }} </div>
                                        @enderror
                                    </div>
                                @endforeach

                                <div class="flex mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file"  name="path"  id="banner_path" accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG">
                                    </div>
                                </div>
                                <div class="image_path_div">
                                    <div class="d-flex file_div">
                                        <img src="{{route('get-file',['path'=>$banner->path])}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
                <!-- News Form -->

              </div>
            </div>
@endsection

@section('js-scripts')
    <script>
        let lang_array='<?php echo (languages()) ?>'
        let lang=JSON.parse(lang_array)

    </script>
    <script src="{{ asset('assets/back/js/banner.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

@endsection
