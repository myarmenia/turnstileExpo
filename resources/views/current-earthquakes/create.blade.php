@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Current Earthquakes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Current Earthquakes</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Current Earthquakes</h5>

                        
                        <form class="row g-3" action="{{ route('current-earthquakes.store') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label for="banner" class="form-label">Banner</label>
                                <input type="file" class="form-control" id="banner" name="banner">
                                @error('banner')
                                    <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="banner_div "></div>
                            <div class="col-12">
                                <label for="title_en" class="form-label">Title EN</label>
                                <input type="text" class="form-control @error('title_en') _incorrectly @enderror"
                                       id="title_en" name="title_en" value="{{ old('title_en')}}">
                                @error('title_en')
                                    <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="title_am" class="form-label">Title AM</label>
                                <input type="text" class="form-control @error('title_am') _incorrectly @enderror"
                                       id="title_am" name="title_am" value="{{ old('title_am')}}">
                                @error('title_am')
                                    <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="title_ru" class="form-label">Title RU</label>
                                <input type="text" class="form-control @error('title_am') _incorrectly @enderror"
                                       id="title_ru" name="title_ru" value="{{ old('title_ru')}}">
                                @error('title_ru')
                                    <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-4   ">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control @error('date') _incorrectly @enderror" id="date"
                                       name="date" dataformatas="en" value="{{ old('date')}}">
                                @error('date')
                                    <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="time" class="form-label">Time</label>
                                <input type="time" class="form-control @error('time') _incorrectly @enderror" id="time"
                                       name="time" value="{{ old('time')}}">
                                @error('time')
                                    <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="magnitude" class="form-label">Magnitude</label>
                                <input type="text" class="form-control @error('magnitude') _incorrectly @enderror" id="magnitude"
                                       name="magnitude" value="{{ old('magnitude')}}">
                                @error('magnitude')
                                    <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="description_en" class="form-label">Description EN</label>
                                <textarea class="ckeditor form-control @error('description_en') _incorrectly @enderror"
                                          name="description_en"
                                          id="description_en">{{ old('description_en')}}</textarea>
                                @error('description_en')
                                    <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="description_am" class="form-label">Description AM</label>
                                <textarea class="ckeditor form-control @error('description_am') _incorrectly @enderror"
                                          name="description_am"
                                          id="description_am">{{ old('description_am')}}</textarea>
                                @error('description_en')
                                    <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="description_ru" class="form-label">Description RU</label>
                                <textarea class="ckeditor form-control @error('description_ru') _incorrectly @enderror"
                                          name="description_ru"
                                          id="description_ru">{{ old('description_ru')}}</textarea>
                                @error('description_ru')
                                    <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="col-lg-12">
                                <label for="description_ru" class="form-label">Links </label>
                                <div class="links_div">
                                    <div class=" col-lg-6 mr-3 d-flex">
                                        <input type="url" class="form-control @error('links') _incorrectly @enderror"
                                               name="links[]">
                                        <i class="icon ri-delete-bin-2-line delete_link" onclick="removeElemnet(this)"></i>
                                    </div>

                                </div>
                                @error('links')
                                    <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="description_ru" class="form-label">Add Link</label>
                                <i class="icon  ml-3 ri-add-box-line" id="add_link"></i>
                            </div>

                            <div class="col-12">
                                <label for="items" class="form-label">Files</label>
                                <input type="file" class="form-control" id="items" name="items[]" multiple>
                                @error('items')
                                    <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="items_div d-flex"></div>

                            <div class="text-center">
                                <button class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- Vertical Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js-scripts')
    <script src="{{ asset('assets/back/js/current_earthquakes_create.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection
