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
                <h5 class="card-title">Edit News</h5>

                <!-- News Form -->
                <form class="row g-3" action="{{ route('news.update',$news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                     @method('PUT')

                  <div class="col-12">
                    <label for="title_en" class="form-label">Title EN</label>
                    <input type="text" name="title_en"  class="form-control @error('title_en') _incorrectly @enderror"  value="{{ $news->title_en }}">
                  </div>
                  @error('title_en')
                    <div class="error_message"> {{ $message }} </div>
                  @enderror
                  <div class="col-12">
                    <label for="title_am" class="form-label">Title AM</label>
                    <input type="text" name="title_am" class="form-control @error('title_am') _incorrectly @enderror" value="{{ $news->title_am}}">
                  </div>
                  @error('title_am')
                    <div class="error_message"> {{ $message }} </div>
                  @enderror
                  <div class="col-12">
                    <label for="title_ru" class="form-label">Title RU</label>
                    <input type="text"  name="title_ru" class="form-control @error('title_ru') _incorrectly @enderror"  value="{{ $news->title_ru}}">
                  </div>
                  @error('title_ru')
                    <div class="error_message"> {{ $message }} </div>
                  @enderror

                  <div class="flex mb-2 p-2">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Description EN</label>
                    <div class="col-sm-12">
                      <textarea class="ckeditor form-control @error('description_en') _incorrectly @enderror" name="description_en" id="description_en">{{ $news->description_en }}</textarea>
                    </div>
                  </div>
                  @error('description_en')
                    <div class="error_message"> {{ $message }} </div>
                  @enderror
                  <div class="flex mb-2 p-2 ">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Description AM</label>
                    <div class="col-sm-12">

                      <textarea class="ckeditor form-control @error('description_am') _incorrectly @enderror" name="description_am" id="description_am">{{ $news->description_am }}</textarea>
                    </div>
                  </div>
                  @error('description_am')
                    <div class="error_message"> {{ $message }} </div>
                   @enderror
                  <div class="flex mb-2 p-2">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Description RU</label>
                    <div class="col-sm-12">
                      <textarea class="ckeditor form-control @error('description_ru') _incorrectly @enderror" name="description_ru" id="description_ru">{{ $news->description_ru }}</textarea>
                    </div>
                  </div>
                  @error('description_ru')
                    <div class="error_message"> {{ $message }} </div>
                  @enderror
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
                            {{-- <i data-key="{{$news->id}}" data-action="edit" id="logo_remove" class=" ri-delete-bin-2-line"></i> --}}
                        </div>
                    </div>



                  @endif






                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Button Link</label>
                    <input type="text" class="form-control @error('button_link') _incorrectly @enderror" name="button_link" value="{{ $news->button_link }}">
                  </div>
                  @error('button_link')
                    <div class="error_message"> {{ $message }} </div>
                  @enderror
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Button EN</label>
                    <input type="text" class="form-control @error('button_text_en') _incorrectly @enderror" name="button_text_en" value="{{ $news->button_text_en }}">
                  </div>
                  @error('button_text_en')
                    <div class="error_message"> {{ $message }} </div>
                  @enderror
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Button AM</label>
                    <input type="text" class="form-control @error('button_text_am') _incorrectly @enderror" name="button_text_am" value="{{ $news->button_text_am }}" >
                  </div>
                  @error('button_text_am')
                    <div class="error_message"> {{ $message }} </div>
                  @enderror
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Button RU</label>
                    <input type="text" class="form-control @error('button_text_ru') _incorrectly @enderror" name="button_text_ru" value="{{ $news->button_text_ru}}">
                  </div>
                  @error('button_text_ru')
                    <div class="error_message"> {{ $message }} </div>
                  @enderror

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
