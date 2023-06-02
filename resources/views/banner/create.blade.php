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
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item">Region info</li>
                  <li class="breadcrumb-item active">Create</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->

    {{-- ========== --}}
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Create Banner</h5>

                <!-- News Form -->

                <form class="row g-3"  id="banner"  data-type="create" method="post" enctype="multipart/form-data">
                    {{-- @csrf --}}
                    <div class="banner_section">
                        <div class="section_banner" data-quequ=1>
                            @foreach (languages() as  $lng)
                                <div class="flex mb-2 p-2">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Description {{ Str::upper($lng->name) }}</label>
                                    <div class="col-sm-12">
                                    <textarea class="form-control create-section__textarea"  name="section[1][translations][{{$lng->id}}][content]"  id="label_section.1.translations.{{$lng->id}}.content"></textarea>
                                    </div>
                                </div>

                                <div class="error_message"    id="key_section.1.translations.{{$lng->id}}.content">  </div>

                            @endforeach

                            <div class="flex mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file"  name="section[1][path]" accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG">
                                </div>
                            </div>

                            <div class="error_message" id="label_key_section.1.path"> </div>


                        </div>
                    </div>
                    <div class="col-lg-12 d-flex">
                        <div  for="description_ru"class="pt-1">Add Section</div>
                        <i class="icon  ml-3 ri-add-box-line" id="add_banner_section" data-quequ_section=2></i>

                    </div>
                    @foreach (languages() as  $lng)
                        <div class="flex mb-2 p-2">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Running Text {{ Str::upper($lng->name) }}</label>
                            <div class="col-sm-12">
                            <textarea class="form-control create-section__textarea"  name="running_text[{{$lng->id}}][content]"  id="label_running_text.{{$lng->id}}.content"></textarea>
                            </div>
                        </div>

                        <div class="error_message"    id="key_running_text.{{$lng->id}}.content">  </div>

                    @endforeach
                    <div class="flex mb-2 p-2">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Link </label>
                        <div class="col-sm-12">
                        <input typ="url" class="form-control create-link"  name="running_link">
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
