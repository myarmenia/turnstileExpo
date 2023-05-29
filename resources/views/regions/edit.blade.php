@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
            <div class="pagetitle">
              <h1>Edit Region</h1>
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
                <h5 class="card-title">Edit Region</h5>

                <!-- News Form -->
{{-- {{dd($map_region_info->id)}} --}}
                <form class="row g-3" action="{{ route('global-monitoring.update', $map_region_info->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')


                    @csrf

                     @foreach (languages() as $lng)
                         <div class="col-12">
                            <label for="title_{{$lng->name}}" class="form-label">Title {{ Str::upper($lng->name) }}</label>
                            <input type="text" name="translations[{{$lng->id }}][title]"  class='form-control @error("translations.$lng->id.title") _incorrectly @enderror'  value="{{ $map_region_info->translation($lng->id)->title }}">
                        </div>
                        @error("translations.$lng->id.title")
                                <div class="error_message"> {{ $message }} </div>
                        @enderror

                    @endforeach
                   @foreach (languages() as $lng)
                        <div class="col-lg-12">
                            <label for="description_{{$lng->name}}" class="form-label">Description {{ Str::upper($lng->name) }}</label>
                            <textarea class='ckeditor form-control @error("translations.$lng->id.description") _incorrectly @enderror' name="translations[{{$lng->id}}][description]">{{ $map_region_info->translation($lng->id)->description}}</textarea>
                            @error("translations.$lng->id.description")
                                <div class="error_message" > {{ $message }} </div>
                            @enderror
                        </div>
                    @endforeach
                <!-- image_path section start -->
                    <div class="flex mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file"  name="image_path" id="image_path" accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG">
                        </div>
                    </div>
                    @if($map_region_info->image_path==null)
                        @error('image_path')
                            <div class="error_message"> {{ $message }} </div>
                        @enderror
                    @else
                        <div class="image_path_div">
                            <div class="d-flex file_div">
                                <img src="{{route('get-file',['path'=>$map_region_info->image_path])}}">
                            </div>
                        </div>
                    @endif
                <!-- schema_path section start -->
                <div class="flex mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Schema</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="schema_path" id="schema_path" accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG">
                    </div>
                </div>
                    @if($map_region_info->schema_path==null)
                        @error('schema_path')
                            <div class="error_message"> {{ $message }} </div>
                        @enderror
                    @else
                        <div class="schema_path_div">
                            <div class="d-flex file_div">
                                <img src="{{route('get-file',['path'=>$map_region_info->schema_path])}}">
                            </div>
                        </div>
                    @endif
                <!-- region_info_files section start -->
                    <div class="flex mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Files</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="region_info_files[]" id="region_info_files"  multiple >
                        </div>
                    </div>
                    @if($map_region_info->files==null)
                        @error('schema_path')
                            <div class="error_message"> {{ $message }} </div>
                        @enderror
                    @else

                        <div class=" d-flex region_info_files_div">
                            {{-- {{dd($map_region_info->files)}} --}}
                            @foreach ($map_region_info->files as $data )

                                <div class="d-flex file_div">
                                    <img src="{{route('get-file',['path'=>$data->path])}}">
                                    <i class="delete_item ri-delete-bin-2-line image" data-id="{{$data->id}}" data-table="files" data-type="image"></i>
                                </div>
                            @endforeach
                        </div>
                    @endif

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
                <!-- News Form -->

              </div>
            </div>
@endsection

@section('js-scripts')
    <script src="{{ asset('assets/back/js/region_info.js') }}"></script>
    <script src="{{ asset('assets/back/js/delete_item.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

@endsection
