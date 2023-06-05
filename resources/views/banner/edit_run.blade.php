@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
            <div class="pagetitle">
              <h1>Edit  </h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{route('banner.index')}}">Banner</a></li>
                  <li class="breadcrumb-item active">Edit Running Text</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->

    {{-- ========== --}}
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit</h5>

                <!-- News Form -->

                <form class="row g-3"  action ="{{route('running-text.update',$id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- @foreach ($running_text as $item)

                        <div class="flex mb-2 p-2">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Running Text {{ Str::upper($lng->name) }}</label>
                            <div class="col-sm-12">
                                <textarea class="form-control create-section__textarea"  name="running_text[{{ $item->language_id }}][content]"  >{{ $item->content }}</textarea>
                            </div>
                        </div>
                        @error("translations.$lng->id.description")
                            <div class="error_message"> {{ $message }} </div>
                        @enderror

                    @endforeach --}}
                    {{-- {{dd(languages()->find($item->language_id)->name)}} --}}

                    @foreach (languages() as $key=>$lng)
                        <div class="flex mb-2 p-2">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Running Text {{ Str::upper($lng->name) }}</label>
                            <div class="col-sm-12">
                            <textarea class="form-control create-section__textarea @error("running_text.$lng->id.content") _incorrectly @enderror"  name="running_text[{{$lng->id}}][content]"  >{{$running_text[$key]->translation($lng->id)->content}}</textarea>
                            </div>
                        </div>
                        @error("running_text.$lng->id.content")
                            <div class="error_message"> {{ $message }} </div>
                        @enderror
                    @endforeach
                    <div class="flex mb-2 p-2">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Link </label>
                        <div class="col-sm-12">
                            <input type="url" class="form-control create-link  @error("running_link") _incorrectly @enderror"  name="running_link" value="{{$running_text[0]->link}}">
                        </div>
                    </div>
                    @error("running_link")
                        <div class="error_message"> {{ $message }} </div>
                     @enderror
                  <div class="text-left">
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

