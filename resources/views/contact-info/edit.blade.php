@extends('layouts.auth-app')
@section('link')
<link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

{{--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
<div class="pagetitle">
    <h1>Contact Info</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Contact Info</li>
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
                            <h5 class="card-title">Edit Contact Info</h5>
                        </div>
                    </div>
                    {{-- action="{{ route('current-earthquakes.update', $current_earthquake->id) }}" --}}
                    <form class="row g-3" action="{{ route('contact_informations_update', $contact_info->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('patch') --}}

                        <div class="col-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') _incorrectly @enderror" id="email"
                                name="email" value="{{ old('email') ?? $contact_info->email }}">
                            @error('email')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="phone" class="form-control @error('phone') _incorrectly @enderror" id="phone"
                                name="phone" value="{{ old('phone') ?? $contact_info->phone }}">
                            @error('phone')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        @foreach (languages() as $index => $lng)
                        <div class="flex mb-2 p-2 col-4">
                            <label for="address.{{ $lng->id }}" class="form-label">Address {{ Str::upper($lng->name)
                                }}</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control @error(" address.$lng->id") _incorrectly
                                @enderror"
                                id="address.{{ $lng->id }}" name="address[{{ $lng->id }}]" value="{{
                                old("address.$lng->id") ?? $contact_info->contact_info_translations[$index]->address
                                }}">
                            </div>

                            @error("address.$lng->id")
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>

                        @endforeach

                        <div>
                            <label for="map_image" class="form-label">Map image</label>
                            <input type="file" class="form-control @error('map_iframe_image') _incorrectly @enderror"
                                id="map_image" name="map_image">
                        </div>
                        <div class="map_image_view">
                            @if ($contact_info->map_image != null)
                            <div class="d-flex file_div order-3">
                                <img src="{{ route('get-file',['path'=>$contact_info->map_image]) }}">
                            </div>
                            @endif
                        </div>

                        <div>
                            <label for="map_iframe" class="form-label">Map Iframe</label>
                            <input type="text" class="form-control @error('map_iframe_image') _incorrectly @enderror"
                                id="map_iframe" name="map_iframe"
                                value="{{ old('map_iframe') ?? $contact_info->map_iframe }}">
                            @error('map_iframe_image')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="map_iframe_view">
                            @if ($contact_info->map_iframe != null)
                            {!! $contact_info->map_iframe !!}
                            @endif
                        </div>

                        <div class="col-lg-12">
                            <label for="" class="form-label">Links </label>

                            <div class="links_div">
                                <div class="logo_link_div">

                                    <div class="col-5 my-3">
                                        <input type="file" class="form-control links_logo" name="links[logo]"
                                            onchange="add_link_image(this)">
                                    </div>

                                    <div class="logo_view_div my-3">

                                    </div>

                                    <div class="col-5 my-3">
                                        <input type="url" class="form-control" id="items" name="links[link]"
                                            multiple="">
                                    </div>
                                </div>

                            </div>




                        </div>

                        <div class="col-lg-12">
                            <label for="" class="form-label">Add Link</label>
                            <i class="icon  ml-3 ri-add-box-line" id="add_link"></i>
                        </div>


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
<script src="{{ asset('assets/back/js/contact_info.js') }}"></script>
<script src="{{ asset('assets/back/js/delete_item.js') }}"></script>
@endsection