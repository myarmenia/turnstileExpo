@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Roles</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Roles</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <div class="card pt-4">
        <div class="card-body">
            <div style="display: flex; justify-content: flex-end">
                <a href="{{route('admin.roles.create')}}"><button type="button" class="btn btn-primary">Create Role</button></a>
            </div>
            <div>
                <form action="{{route('admin.roles.index')}}" method="get" class="row g-3 mt-2" style="display: flex">
                    <div class="mb-3 justify-content-end" style="display: flex; gap: 8px">
                        <div class="col-2">
                            <input type="text" class="form-control" id="inputNanme4" placeholder="Role name" name="role" value="{{ request()->input('role') }}">
                        </div>
                        <button class="btn btn-primary col-2">Search</button>
                    </div>
                </form>
            </div>
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th >#</th>
                        <th >Name</th>
                        <th style="width: 80px !important">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $key => $role)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{ $role->name }}</td>

                        <td class="px-1">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.roles.edit',$role->id) }}">
                                    <i class="bi bi-pencil-square action_i"></i>
                                </a>
                                <i class="bi bi-trash action_i" data-bs-toggle="modal" data-bs-target="#disablebackdrop"  onclick="create_request_route(`roles`, {{$role->id}})"></i>
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
                {{ $roles->links() }}
            </ul>
        </nav>
    </div>

    @extends('layouts.modal')
@endsection
@section('js-scripts')
    <script src="{{ asset('assets/back/js/modal.js') }}"></script>
@endsection
