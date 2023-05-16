@extends('layouts.auth-app')
@section('link')
<link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

{{--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
<div class="pagetitle">
    <h1>Current Earthquakes</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Current Earthquakes</li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <div class="col-12 d-flex ">
                        <div class="w-50">
                            <h5 class="card-title">Edit Current Earthquakes</h5>
                        </div>
                        <div class="d-flex flex-column w-50 justify-content-end pt-3">
                            <div class="text-end">
                                <label>Moderator:</label>
                                <span class="text-primary ont-weight-bold text-end"> moderator name</span>
                            </div>
                            <div class="text-end">
                                <label>Status:</label>
                                <span class="text-primary ont-weight-bold text-end"> {{
                                    $current_earthquake->status}}</span>
                            </div>
                            <div class="d-flex text-end justify-content-end ">
                                <label for="select_status" class="form-label pt-2 mx-2">Change status to: </label>

                                <select id="select_status" class="form-select w-50">
                                    <option value="confirmed">Confirmed</option>
                                    <option value="hidden">Hidden</option>
                                    <option value="reditab">Reditab</option>
                                    <option value="delete">Delete</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <form class="row g-3" action="{{ route('current-earthquakes.update', $current_earthquake->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        {{-- <div class="col-12">
                            <label for="banner" class="form-label">Banner</label>
                            <input type="file" files="kk1" class="form-control" id="banner" name="banner">
                            @error('banner')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="banner_div "></div> --}}

                        @foreach (languages() as $index => $lng)
                        {{-- {{ dd($current_earthquake->current_earthquakes_translations) }} --}}
                        <div class="col-12">
                            <label for="title_{{$lng->name}}" class="form-label">Title {{ Str::upper($lng->name)
                                }}</label>
                            <input type="text"
                                class='form-control @error("tanslations.$lng->id.title") _incorrectly @enderror'
                                id="title_{{$lng->name}}" name="tanslations[{{$lng->id}}][title]"
                                value='{{ old("tanslations.$lng->id.title") ?? $current_earthquake->current_earthquakes_translations[$index]->title }}'>
                            @error("tanslations.$lng->id.title")
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        @endforeach


                        <div class="col-4">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control @error('date') _incorrectly @enderror" id="date"
                                name="date" value="{{ old('date') ?? $current_earthquake->date }}">
                            @error('date')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" class="form-control @error('time') _incorrectly @enderror" id="time"
                                name="time" value="{{ old('time') ?? $current_earthquake->time }}">
                            @error('time')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="magnitude" class="form-label">Magnitude</label>
                            <input type="text" class="form-control @error('magnitude') _incorrectly @enderror"
                                id="magnitude" name="magnitude"
                                value="{{ old('magnitude') ?? $current_earthquake->magnitude }}">
                            @error('magnitude')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>

                        @foreach (languages() as $index => $lng)
                        <div class="col-lg-12">
                            <label for="description_{{$lng->name}}" class="form-label">Description {{
                                Str::upper($lng->name) }}</label>
                            <textarea
                                class='ckeditor form-control @error("tanslations.$lng->id.description") _incorrectly @enderror'
                                name="tanslations[{{$lng->id}}][description]"
                                id="description_en">{{ old("tanslations.$lng->id.description") ?? $current_earthquake->current_earthquakes_translations[$index]->description }}</textarea>
                            @error("tanslations.$lng->id.description")
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        @endforeach

                        {{-- <div class="col-lg-12">
                            <label for="description_en" class="form-label">Description EN</label>
                            <textarea class="ckeditor form-control @error('description_en') _incorrectly @enderror"
                                name="description_en"
                                id="description_en">{{ old('description_en') ?? $current_earthquake->description_en }}</textarea>
                            @error('description_en')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="description_am" class="form-label">Description AM</label>
                            <textarea class="ckeditor form-control @error('description_am') _incorrectly @enderror"
                                name="description_am"
                                id="description_am">{{ old('description_am') ?? $current_earthquake->description_am }}</textarea>
                            @error('description_en')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="description_ru" class="form-label">Description RU</label>
                            <textarea class="ckeditor form-control @error('description_ru') _incorrectly @enderror"
                                name="description_ru"
                                id="description_ru">{{ old('description_ru') ?? $current_earthquake->description_ru }}</textarea>
                            @error('description_ru')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div> --}}

                        <div class="col-lg-12">
                            <label for="description_ru" class="form-label">Links </label>
                            <div class="links_div">

                                @error('links.*')
                                @foreach (old('links') as $key => $item)
                                <div>
                                    <div class=" col-lg-6 mr-3 d-flex mt-2">
                                        <input type="url"
                                            class="form-control link {{ $item == null ? '_incorrectly' : ''}}"
                                            name="links[]" value="{{$item ?? ''}}">
                                        <i class="icon ri-delete-bin-2-line delete_link"
                                            onclick="removeElemnet(this)"></i>
                                    </div>
                                    @if ($item == null)
                                    <div class="error_message">The link field is required. </div>
                                    @endif
                                </div>
                                @endforeach
                                @else
                                @foreach ($current_earthquake->links as $link)
                                <div>
                                    <div class="col-lg-6 mr-3 d-flex">
                                        <input type="url"
                                            class="mt-2 form-control link @error('links.*') _incorrectly @enderror"
                                            name="links[]" value="{{ $link->link  }}">
                                        <i class="icon ri-delete-bin-2-line delete_item" data-id="{{$link->id}}"
                                            data-table="links" data-type="link"></i>
                                    </div>
                                </div>
                                @endforeach
                                @enderror

                            </div>

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
                        <div class="d-flex flex-wrap justify-content-between">
                            @foreach ($current_earthquake->files as $item)
                            <div class="d-flex file_div">
                                <img src="{{ route('get-file',['path'=>$item->path]) }}" class="file">
                                <i class="delete_item ri-delete-bin-2-line" data-id="{{$item->id}}" data-table="files"
                                    data-type="file"></i>
                            </div>
                            @endforeach
                        </div>
                        <div class="items_div d-flex flex-wrap justify-content-between mt-3 ">

                        </div>

                        <div class="text-start">
                            <button class="btn btn-primary">Submit</button>
                            {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
                        </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js-scripts')
<script src="{{ asset('assets/back/js/current_earthquakes_edit.js') }}"></script>
<script src="{{ asset('assets/back/js/delete_item.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection