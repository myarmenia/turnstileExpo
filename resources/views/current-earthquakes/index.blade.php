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
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                            value="{{ request()->input('title') }}" />
                    </div>
                    <div class=" col-2">
                        <!-- <label for="inputEmail4" class="form-label">Title AM</label> -->
                        <input type="text" class="form-control" name="magnitude" id="magnitude" placeholder="Magnitude"
                            value="{{ request()->input('magnitude') }}" />
                    </div>

                    <!-- <div class="row mb-3"> -->
                    <!-- <label for="inputDate" class="col-sm-2 col-form-label">From</label> -->
                    <div class="col-2">
                        <input type="text" class="form-control" placeholder="Date_from" onfocus="(this.type='date')"
                            name="date_from"
                            value="{{ request()->input('date_from') ? date('d-m-Y', strtotime(request()->input('date_from'))) : '' }}">
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" placeholder="Date_to" onfocus="(this.type='date')"
                            name="date_to"
                            value="{{ request()->input('date_to') ? date('d-m-Y', strtotime(request()->input('date_to'))) : '' }}">
                    </div>

                    <div class="col-2">
                        <select id="inputStatus" name="status" class="form-select">
                            <option value="" selected>Status</option>
                            <option value="new" {{ request()->input('status') == 'new' ? 'selected' : ''}}>New</option>
                            <option value="confirmed" {{ request()->input('status') == 'confirmed' ? 'selected' :
                                ''}}>Confirmed</option>
                            <option value="hidden" {{ request()->input('status') == 'hidden' ? 'selected' : ''}}>Hidden
                            </option>
                            <option value="reditab" {{ request()->input('status') == 'reditab' ? 'selected' :
                                ''}}>Reditab</option>
                        </select>
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
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Magnitude</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Status</th>
                    <th scope="col" style="width: 80px !important">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($current_earthquakes as $current_earthquake)
                <tr>


                    <th scope="row">{{++$i}}</th>
                    <td>{{ $current_earthquake->current_earthquakes_translations[0]->title }}</td>
                    <td style="max-width: 300px !important">
                        {!! $current_earthquake->current_earthquakes_translations[0]->description !!}
                    </td>
                    <td>{{ $current_earthquake->magnitude }}</td>
                    <td>{{ $current_earthquake->date }}</td>
                    <td>{{ $current_earthquake->time }}</td>
                    <td>{{ $current_earthquake->status }}</td>
                    <td class="px-0">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('current-earthquakes.edit', $current_earthquake->id) }}">
                                <i class="bi bi-pencil-square action_i"></i>
                            </a>
                            <i class="bi bi-trash action_i" data-bs-toggle="modal" data-bs-target="#disablebackdrop"
                                onclick="create_request_route(`current-earthquakes`, {{$current_earthquake->id}})"></i>
                            <a
                                href="{{ route('change_status', [$current_earthquake->id, 'current_earthquakes', 'confirmed']) }}">
                                <i class="bi bi-check-circle action_i"
                                    style="color:{{ $current_earthquake->status == 'confirmed' ? '#0d6efd' : ''}}"
                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                    data-bs-original-title="{{ $current_earthquake->status == 'confirmed' ? 'Confirmed' : 'Change status to confirmed'}}">
                                </i>
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
            {{ $current_earthquakes->links() }}
        </ul>
    </nav>
    <!-- End Disabled and active states -->
</div>

@extends('layouts.modal')

@endsection

@section('js-scripts')
<script src="{{ asset('assets/back/js/current_earthquakes_edit.js') }}"></script>
<script src="{{ asset('assets/back/js/modal.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection