@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
            <div class="pagetitle">
              <h1>Create Region info</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{route('global-monitoring.index')}}">Region Info</a></li>

                </ol>
              </nav>
            </div><!-- End Page Title -->

    {{-- ========== --}}
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Create Region info</h5>

                <!-- News Form -->

                <form class="row g-3" action="{{ route('global-monitoring.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="map_region_id" value="{{$map_region_id}}">

                @foreach (languages() as $lng)
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
                    <input class="form-control" type="file"  name="image_path" id="image_path" accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG">
                </div>
            </div>
            @error('image_path')
                <div class="error_message" id="image_path_error"> {{ $message }} </div>
            @enderror
          <div class="image_path_div"></div>

            <div class="flex mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Schema</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" name="schema_path" id="schema_path" accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG">
                </div>
            </div>
            @error('schema_path')
                <div class="error_message" id="schema_path_error"> {{ $message }} </div>
            @enderror
            <div class="schema_path_div"></div>
            <div class="flex mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Files</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" name="region_info_files[]" id="region_info_files"  multiple >
                </div>
            </div>
            @error('region_info_files')
                <div class="error_message" id="region_info_files_error"> {{ $message }} </div>
            @enderror
            <div class=" d-flex region_info_files_div"></div>



                  <div class="text-left">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
                <!-- News Form -->

              </div>
            </div>
@endsection

@section('js-scripts')
    <script src="{{ asset('assets/back/js/region_info.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

@endsection
