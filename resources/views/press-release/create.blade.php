@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Press Release</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('press-release.index')}}">Press Release</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Press Release</h5>

                        <form class="row g-3" action="{{ route('press-release.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control" id="logo" name="logo" accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG">
                                @error('logo')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="logo_div "></div>
                            @foreach (languages() as $lng)
                                <div class="col-12">
                                    <label for="title_{{$lng->name}}" class="form-label">Title {{ Str::upper($lng->name) }}</label>
                                    <input type="text" class='form-control @error("translations.$lng->id.title") _incorrectly @enderror' id="title_{{$lng->name}}" name="translations[{{$lng->id}}][title]" value='{{ old("translations.$lng->id.title")}}'>
                                    @error("translations.$lng->id.title")
                                        <div class="error_message" > {{ $message }} </div>
                                    @enderror
                                </div>
                            @endforeach
                            {{-- <div class="col-12">

                                <label for="title_en" class="form-label">Title EN</label>
                                <input type="text" class="form-control @error('title_en') _incorrectly @enderror" id="title_en" name="title_en" value="{{ old('title_en')}}">
                                @error('title_en')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="title_am" class="form-label">Title AM</label>
                                <input type="text" class="form-control @error('title_am') _incorrectly @enderror" id="title_am" name="title_am" value="{{ old('title_am')}}">
                                @error('title_am')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="title_ru" class="form-label">Title RU</label>
                                <input type="text" class="form-control @error('title_am') _incorrectly @enderror" id="title_ru" name="title_ru" value="{{ old('title_ru')}}">
                                @error('title_ru')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div> --}}
                            <div class="col-6">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control @error('date') _incorrectly @enderror" id="date" name="date" value="{{ old('date')}}">
                                @error('date')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="time" class="form-label">Date</label>
                                <input type="time" class="form-control @error('time') _incorrectly @enderror" id="time" name="time" value="{{ old('time')}}">
                                @error('time')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            @foreach (languages() as $lng)
                                <div class="col-lg-12">
                                    <label for="description_{{$lng->name}}" class="form-label">Description {{ Str::upper($lng->name) }}</label>
                                    <textarea class='ckeditor form-control @error("translations.$lng->id.description") _incorrectly @enderror' name="translations[{{$lng->id}}][description]" id="description_en">{{ old("translations.$lng->id.description")}}</textarea>
                                    @error("translations.$lng->id.description")
                                        <div class="error_message" > {{ $message }} </div>
                                    @enderror
                                </div>
                            @endforeach
                            {{-- <div class="col-lg-12">
                                <label for="description_en" class="form-label">Description EN</label>
                                <textarea class="ckeditor form-control @error('description_en') _incorrectly @enderror" name="description_en" id="description_en">{{ old('description_en')}}</textarea>
                                @error('description_en')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="description_am" class="form-label">Description AM</label>
                                <textarea class="ckeditor form-control @error('description_am') _incorrectly @enderror" name="description_am" id="description_am">{{ old('description_am')}}</textarea>
                                @error('description_am')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="description_ru" class="form-label">Description RU</label>
                                <textarea class="ckeditor form-control @error('description_ru') _incorrectly @enderror" name="description_ru" id="description_ru">{{ old('description_ru')}}</textarea>
                                @error('description_ru')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div> --}}

                            <div class="col-lg-12">
                                <label for="" class="form-label">Links </label>
                                <div class="links_div">

                                    @error('links.*')
                                        @foreach (old('links') as $key => $item)
                                            <div>
                                                <div class=" col-lg-6 mr-3 d-flex mt-2">
                                                    <input type="url" class="form-control {{ $item == null ? '_incorrectly' : ''}}" name="links[]" value="{{$item ?? ''}}">
                                                    <i class="icon ri-delete-bin-2-line remove_link"></i>
                                                </div>
                                                @if ($item == null)
                                                    <div class="error_message" >The link field is required. </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @else
                                    <div>
                                        <div class=" col-lg-6 mr-3 d-flex">
                                            <input type="url" class="form-control @error('links.*') _incorrectly @enderror" name="links[]" >
                                            <i class="icon ri-delete-bin-2-line remove_link"></i>
                                        </div>
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-12 d-flex">
                                <div class="pt-1">Add Link</div>

                                <i class="icon px-3 ri-add-box-line" id="add_link"></i>
                            </div>

                            <div class="col-12">
                                <label for="items" class="form-label">Files</label>
                                <input type="file" class="form-control" id="items" name="items[]" multiple accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG, video/mp4, video/mov, video/ogg, video/qt">
                                @error('items')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="items_div d-flex flex-wrap justify-content-between"> </div>

                            <div class="text-start">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form><!-- Vertical Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('js-scripts')
    <script src="{{ asset('assets/back/js/press-releases.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection
