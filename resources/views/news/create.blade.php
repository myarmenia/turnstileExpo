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


            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Create News</h5>

                <!-- News Form -->
                <form class="row g-3" action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Title EN</label>
                    <input type="text" class="form-control" id="inputNanme4">
                  </div>
                  @error('title_en')
                    <div class="error_message"> {{ $message }} </div>
                  @enderror
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Title AM</label>
                    <input type="email" class="form-control" id="inputEmail4">
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Title RU</label>
                    <input type="password" class="form-control" id="inputPassword4">
                  </div>


                  <div class="flex mb-2 p-2">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Description EN</label>
                    <div class="col-sm-12">
                      {{-- <textarea class="form-control" style="height: 100px"></textarea> --}}
                      <textarea class="ckeditor form-control @error('description_en') _incorrectly @enderror" name="description_en" id="description_en">{{ old('description_en')}}</textarea>

                    </div>
                  </div>
                  <div class="flex mb-2 p-2">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Description AM</label>
                    <div class="col-sm-12">
                      {{-- <textarea class="form-control" style="height: 100px"></textarea> --}}
                      <textarea class="ckeditor form-control @error('description_am') _incorrectly @enderror" name="description_am" id="description_am">{{ old('description_am')}}</textarea>


                    </div>
                  </div>
                  <div class="flex mb-2 p-2">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Description RU</label>
                    <div class="col-sm-12">
                      {{-- <textarea class="form-control" style="height: 100px"></textarea> --}}
                      <textarea class="ckeditor form-control @error('description_ru') _incorrectly @enderror" name="description_ru" id="description_ru">{{ old('description_ru')}}</textarea>
                    </div>
                  </div>



                  <div class="flex mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file" id="formFile">
                    </div>
                  </div>


                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Button Link</label>
                    <input type="text" class="form-control" id="inputNanme4">
                  </div>
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Button EN</label>
                    <input type="text" class="form-control" id="inputNanme4">
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Button AM</label>
                    <input type="email" class="form-control" id="inputEmail4">
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Button RU</label>
                    <input type="password" class="form-control" id="inputPassword4">
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form><!-- News Form -->

              </div>
            </div>
@endsection

@section('js-scripts')
    <script src="{{ asset('assets/back/js/press-releases.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script type="text/javascript">


    </script>
@endsection
