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
                <h5 class="card-title">Edit Region</h5>

                <!-- News Form -->
                <form class="row g-3" action="{{ route('news.update',$news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                     @method('PUT')


                     @foreach ($region as  $item)

                        {{-- {{dd($item->title)}} --}}
                     <div class="col-12">
                         <label for="title_{{$item->languages->name}}" class="form-label">Title {{ Str::upper($item->languages->name) }}</label>
                         <input type="text" name="translations[{{$item->language_id }}][title]"  class='form-control @error("translations.$item->language_id.title") _incorrectly @enderror'  value="{{ $item->title }}">
                     </div>
                     @error("translations.$item->language_id.title")
                             <div class="error_message"> {{ $message }} </div>
                     @enderror


                 @endforeach
                 @foreach ($news_translation as  $item)
                        <div class="flex mb-2 p-2">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Description {{ Str::upper($item->languages->name) }}</label>
                        <div class="col-sm-12">
                        <textarea class="ckeditor form-control @error("translations.$item->language_id.description") _incorrectly @enderror" name="translations[{{$item->language_id}}][description]" >{{ $item->description }}</textarea>
                        </div>
                    </div>
                    @error("translations.$item->language_id.description")
                        <div class="error_message"> {{ $message }} </div>
                    @enderror
                 @endforeach


                <div class="flex mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file"  name="image" id="logo" accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG">
                    </div>
                </div>

                  @if($news->image==null)
                    @error('image')
                        <div class="error_message"> {{ $message }} </div>
                    @enderror
                  @else

                    <div class="logo_div ">
                        <div class="d-flex file_div">
                            <img src="{{route('get-file',['path'=>$news->image])}}">
                        </div>
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
    <script src="{{ asset('assets/back/js/news.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

@endsection
