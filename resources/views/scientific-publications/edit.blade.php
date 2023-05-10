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
        <form class="row g-3">
            <div class="flex mb-2 p-2">
                <label for="inputPassword" class="col-sm-2 col-form-label">Content EN</label>
                <div class="col-sm-12">
                    <textarea class="form-control"
                        style="height: 100px">{{ $scientific_publication->content_en }}</textarea>
                </div>
            </div>
            <div class="flex mb-2 p-2">
                <label for="inputPassword" class="col-sm-2 col-form-label">Content RU</label>
                <div class="col-sm-12">
                    <textarea class="form-control"
                        style="height: 100px">{{ $scientific_publication->content_ru }}</textarea>
                </div>
            </div>
            <div class="flex mb-2 p-2">
                <label for="inputPassword" class="col-sm-2 col-form-label">Content AM</label>
                <div class="col-sm-12">
                    <textarea class="form-control"
                        style="height: 100px">{{ $scientific_publication->content_am }}</textarea>
                </div>
            </div>

            <div class="flex mb-3">
                <!-- <label for="inputNumber" class="col-sm-2 col-form-label">Image</label> -->
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                </div>
            </div>


            <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
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