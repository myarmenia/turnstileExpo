@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
            <div class="pagetitle">
              <h1>Create Banner </h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{route('banner.index')}}">Banner</a></li>
                  <li class="breadcrumb-item active">Create</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->

    {{-- ========== --}}
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Create Banner</h5>

                <!-- Create banner Form -->

                <form class="row g-3"  id="banner"  action ="{{route('banner.store')}}" data-type="create" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="section_banner" data-quequ=1>
                            @foreach (languages() as  $lng)
                                <div class="flex mb-2 p-2">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Description {{ Str::upper($lng->name) }}</label>
                                    <div class="col-sm-12">
                                    <textarea class="form-control create-section__textarea @error("translations.$lng->id.content") _incorrectly @enderror"  name="translations[{{$lng->id}}][content]"  id="label_translations.{{$lng->id}}.content">{{old("translations.$lng->id.content")}}</textarea>
                                    </div>
                                </div>
                                @error("translations.$lng->id.content")
                                <div class="error_message" > {{ $message }} </div>
                            @enderror

                            @endforeach

                            <div class="flex mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file"  name="path" id="banner_path"  accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG">
                                </div>
                            </div>


                            @error("path")
                                <div class="error_message"  id="path_error_message"> {{ $message }} </div>
                            @enderror

                            <div class="path_div"></div>


                        </div>



                  <div class="text-left">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
                <!-- Banner Form -->

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
