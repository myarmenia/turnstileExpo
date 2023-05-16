@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
            <div class="pagetitle">
              <h1>News</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item">News</li>
                  <li class="breadcrumb-item active">Create</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->

    {{-- ========== --}}
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Create News</h5>

                <!-- News Form -->
                <form class="row g-3" action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    @foreach (languages() as  $lng)
                        <div class="col-12">
                            <label for="title_{{$lng->name}}" class="form-label">Title {{ Str::upper($lng->name) }}</label>
                            <input type="text" name="translations[{{$lng->id}}][title]"  class='form-control @error("translations.$lng->id.title") _incorrectly @enderror'  value="{{ old("translations.$lng->id.title")}}">
                        </div>
                        @error("translations.$lng->id.title")
                                <div class="error_message"> {{ $message }} </div>
                        @enderror
                    @endforeach
                    @foreach (languages() as  $lng)
                        <div class="flex mb-2 p-2">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Description {{ Str::upper($lng->name) }}</label>
                            <div class="col-sm-12">
                            <textarea class="ckeditor form-control @error("translations.$lng->id.description") _incorrectly @enderror" name="translations[{{$lng->id}}][description]" >{{ old("translations.$lng->id.description")}}</textarea>
                            </div>
                        </div>
                        @error("translations.$lng->id.description")
                            <div class="error_message"> {{ $message }} </div>
                        @enderror
                    @endforeach


                  <div class="flex mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file"  name="image" id="logo" accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG">
                    </div>
                  </div>
                  @error('image')
                    <div class="error_message" id="image_error"> {{ $message }} </div>
                 @enderror
                  <div class="logo_div "></div>
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Button Link</label>
                    <input type="text" class="form-control @error('button_link') _incorrectly @enderror" name="button_link" value="{{ old('button_link')}}">
                </div>
                @error('button_link')
                    <div class="error_message"> {{ $message }} </div>
                @enderror

                @foreach (languages() as  $lng)
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Button {{$lng->name}}</label>
                        <input type="text" class="form-control @error('button_text_{{$lng->name}}') _incorrectly @enderror" name="translations[{{$lng->id}}][button_text]"  value="{{ old('button_text_$lng->name')}}">
                    </div>
                    @error("translations.$lng->id.button_text")
                        <div class="error_message"> {{ $message }} </div>
                    @enderror
                @endforeach
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
                <!-- News Form -->

              </div>
            </div>
@endsection

@section('js-scripts')
    <script src="{{ asset('assets/back/js/news.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

@endsection
