@extends('layouts.auth-app')
@section('link')
<link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="pagetitle">
    <h1>Feedbacks</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Feedbacks</li>
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
            <form action="{{ route('feedback.index') }}" method="get" class="row g-3 mt-2" style="display: flex">
                <div class="mb-3" style="display: flex; justify-content:space-around; gap: 8px">

                    <div class="col-2">
                        <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full name"
                            value="{{ request()->input('full_name') }}" />
                    </div>

                    <div class=" col-2">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                            value="{{ request()->input('email') }}" />
                    </div>

                    <div class="col-2">
                        <select name="type" class="form-select">
                            <option value="" selected>Type</option>
                            <option value="aaaa">Technology</option>
                            <option value="bbbb">Products</option>
                            <option value="cccc">Cooperation</option>
                            <option value="dddd">Other</option>
                        </select>
                    </div>

                    <div class="col-2">
                        <select name="status" class="form-select">
                            <option value="" selected>Status</option>
                            <option value="new" {{ request()->input('status') == 'new' ? 'selected' : ''}}>New</option>
                            <option value="read" {{ request()->input('status') == 'read' ? 'selected' :
                                ''}}>Read</option>
                            <option value="answerd" {{ request()->input('status') == 'answerd' ? 'selected' :
                                ''}}>Answerd
                            </option>
                            @role('Admin')
                            <option value="draft" {{ request()->input('status') == 'draft' ? 'selected' :
                                ''}}>Draft</option>
                            @endrole
                        </select>
                    </div>

                    <button class="btn btn-primary" style="width: 13.01111111111111111111% !important">
                        Search
                    </button>
                </div>

            </form>
        </div>

        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col" style="width: 80px !important">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                <tr>


                    <th scope="row">{{++$i}}</th>
                    <td>{{ $feedback->full_name }}</td>
                    <td style="max-width: 300px !important">
                        {{ $feedback->email }}
                    </td>
                    <td>{{ $feedback->type }}</td>
                    <td>{{ $feedback->status }}</td>
                    <td class="px-0">
                        <div class="d-flex justify-content-around">
                            <a href="{{ route('feedback.edit', $feedback->id) }}">
                                <i class="bi bi-envelope{{ $feedback->status == 'new' ? '' : '-open' }} action_i"></i>
                            </a>
                            @role('Admin')
                            <i class="bi bi-trash action_i" data-bs-toggle="modal" data-bs-target="#disablebackdrop"
                                onclick="create_request_route(`feedback`, {{$feedback->id}})"></i>
                            @endrole
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
            {{ $feedbacks->links() }}
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