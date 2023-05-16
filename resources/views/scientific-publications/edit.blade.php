@extends('layouts.auth-app')
@section('link')
<link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

{{--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')

<div class="pagetitle">
    <h1>Scientific Publications</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Scientific publications</li>
            <li class="breadcrumb-item">Edit</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Scientific Publications</h5>


        <!-- News Form -->
        <form class="row g-3" action="{{ route('scientific-publications.update', $scientific_publication->id) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method("patch")

            {{-- {{ dd($scientific_publication->scientific_publication_languages) }} --}}

            @foreach (languages() as $index => $lng)

            <div class="flex mb-2 p-2">
                <label for="inputPassword" class="col-sm-2 col-form-label">Content {{ Str::upper($lng->name) }}</label>
                <div class="col-sm-12">
                    <textarea class="form-control" style="height: 100px"
                        name="content[{{ $lng->id }}]">{{ old("content.$lng->id") ?? $scientific_publication->scientific_publication_languages[$index]->content }}</textarea>
                </div>

                @error("content.$lng->id")
                <div class="error_message"> {{ $message }} </div>
                @enderror
            </div>

            @endforeach

            <div class="flex mb-3">
                <!-- <label for="inputNumber" class="col-sm-2 col-form-label">Image</label> -->
                <div class="col-sm-10">
                    <input class="form-control" name="file" type="file" id="formFile">
                </div>
            </div>

            @if ($scientific_publication->file_path != null)
            <a href="{{ route('get-file',['path'=>$scientific_publication->file_path]) }}" target="blank"
                class="my-2">PDF File</a>
            @endif


            <div class="text-start">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form><!-- News Form -->

    </div>
</div>

@endsection

@section('js-scripts')
<script src="{{ asset('assets/back/js/current_earthquakes_edit.js') }}"></script>
<script src="{{ asset('assets/back/js/delete_item.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection