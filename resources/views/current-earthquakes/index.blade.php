@extends('layouts.auth-app')
@section('link')
<link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
<style>
    .check_hover:hover {
        color: #0d6efd;
    }

    .check_hover {
        cursor: pointer;
    }
</style>
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
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<div class="card pt-4">
    <div class="card-body">
        <!-- Primary Color Bordered Table -->
        <div style="display: flex; justify-content: flex-end">
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
        </div>

        <div>
            <form action="{{ route('current-earthquakes.index') }}" method="get" class="row g-3 mt-2"
                style="display: flex">
                <div class="mb-3" style="display: flex; gap: 8px">
                    <div class="col-2">
                        <!-- <label for="inputNanme4" class="form-label">Title</label> -->
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" />
                    </div>
                    <div class="col-2">
                        <!-- <label for="inputEmail4" class="form-label">Title AM</label> -->
                        <input type="email" class="form-control" id="magnitude" placeholder="Magnitude" />
                    </div>

                    <!-- <div class="row mb-3"> -->
                    <!-- <label for="inputDate" class="col-sm-2 col-form-label">From</label> -->
                    <div class="col-2">
                        <input type="date" name="date_from" class="form-control" placeholder="From" />
                    </div>
                    <!-- </div> -->

                    <!-- <div class="row mb-3"> -->
                    <!-- <label for="inputDate" class="col-sm-2 col-form-label">To</label> -->
                    <div class="col-2">
                        <input type="date" name="date_to" class="form-control" placeholder="To" />
                    </div>

                    <div class="col-2">
                        <select id="inputStatus" name="status" class="form-select">
                            {{-- <option selected>Status</option> --}}
                            <option>new</option>
                            <option>...</option>
                            <option>...</option>
                            <option>...</option>
                        </select>
                    </div>

                    <button type="button" class="btn btn-primary" style="width: 13.01111111111111111111% !important">
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
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Magnitude</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Status</th>
                    <th scope="col" style="width: 60px !important">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($current_earthquakes as $current_earthquake)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{ $current_earthquake->title_en }}</td>
                    <td style="max-width: 300px !important">
                        {!! $current_earthquake->description_en !!}
                    </td>
                    <td>{{ $current_earthquake->magnitude }}</td>
                    <td>{{ $current_earthquake->date }}</td>
                    <td>{{ $current_earthquake->time }}</td>
                    <td>{{ $current_earthquake->status }}</td>
                    <td>
                        <div style="display: flex !important">
                            <a href="{{ route('current-earthquakes.edit', $current_earthquake->id) }}">
                                <i class="bi bi-pencil-square px-1" style="cursor: pointer"></i>
                            </a>
                            <i class="bi bi-trash px-2" style="cursor: pointer" data-bs-toggle="modal"
                                data-bs-target="#disablebackdrop"
                                onclick="create_request_route(`current-earthquakes`, 1)"></i>
                            <i class="bi bi-check-circle check_hover"></i>
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
    {{-- {{ $current_earthquakes->links() }} --}}

    <!-- Disabled and active states -->
    <nav aria-label="...">
        <ul class="pagination">
            {{ $current_earthquakes->links() }}
        </ul>
    </nav>
    <!-- End Disabled and active states -->
</div>
<div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Disabled Backdrop</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta
                at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in
                facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est
                facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <form class="form" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-scripts')
<script src="{{ asset('assets/back/js/current_earthquakes_edit.js') }}"></script>
<script src="{{ asset('assets/back/js/modal.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection