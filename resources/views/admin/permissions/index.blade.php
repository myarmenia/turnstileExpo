@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Permissions</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{route('admin.permissions.index')}}">Permission</a></li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <div class="card pt-4">
        <div class="card-body">
            <div style="display: flex; justify-content: flex-end" class="mb-3">
                <a href="{{route('admin.permissions.create')}}"><button type="button" class="btn btn-primary">Create Permission</button></a>
            </div>
            <div></div>
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th >#</th>
                        <th >Name</th>
                        <th style="width: 80px !important">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $key => $permission)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{ $permission->name }}</td>

                        <td class="px-1">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.permissions.edit', $permission->id) }}">
                                    <i class="bi bi-pencil-square action_i"></i>
                                </a>
                                <i class="bi bi-trash action_i" data-bs-toggle="modal" data-bs-target="#disablebackdrop"  onclick="create_request_route(`permissions`, {{$permission->id}})"></i>
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
        <nav aria-label="...">
            <ul class="pagination">
                {{ $permissions->links() }}
            </ul>
        </nav>
    </div>

    @extends('layouts.modal')
@endsection
@section('js-scripts')
    <script src="{{ asset('assets/back/js/modal.js') }}"></script>
@endsection
