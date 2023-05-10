@extends('layouts.auth-app')
@section('link')
{{--
<link href="{{ asset('assets/css/index.css') }}" rel="stylesheet"> --}}
<link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection
{{--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@section('content')
<div class="pagetitle">
    <h1>Scientific Publications</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Scientific Publications</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<div class="card pt-4">
    <div class="card-body">
        <!-- Primary Color Bordered Table -->
        {{-- <div style="display: flex; justify-content: flex-end">
            <a href="{{  route('current-earthquakes.create') }}">
                <h5 class="card-title shadow-sm rounded" style="
                                border: 1px solid #0d6efd;
                                padding: 10px 15px;
                                background-color: #0d6efd;
                                color: white;
                                font-weight: 200;
                                box-shadow: 10px;">
                    Create
                </h5>
            </a>
        </div> --}}

        <div>
            <form action="{{ route('scientific-publications.index') }}" method="get" class="row g-3 mt-2"
                style="display: flex">
                <div class="mb-3" style="display: flex; justify-content: end; gap: 8px">
                    <div class="col-3">
                        <input type="text" class="form-control" name="content" id="content" placeholder="Content"
                            value="{{ request()->input('content') }}" />
                    </div>


                    <button class="btn btn-primary" style="width: 13.01111111111111111111% !important">
                        Search
                    </button>
                </div>

                <!-- </div> -->
            </form>
        </div>

        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Content</th>
                    <th scope="col" style="width: 80px !important">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($scientific_publications as $publication)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td style="max-width: 300px !important">
                        {!! $publication->content_en !!}
                    </td>
                    <td class="px-0">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('scientific-publications.edit', $publication->id) }}">
                                <i class="bi bi-pencil-square action_i"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- End Primary Color Bordered Table -->
    </div>
</div>

<div class="card-body d-flex justify-content-center">

    <!-- Disabled and active states -->
    <nav aria-label="...">
        <ul class="pagination">
            {{ $scientific_publications->links() }}
        </ul>
    </nav>
    <!-- End Disabled and active states -->
</div>

@extends('layouts.modal')

@endsection

@section('js-scripts')
<script src="{{ asset('assets/back/js/modal.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection