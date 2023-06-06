@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <div class="card pt-4">
        <div class="card-body">
            <div style="display: flex; justify-content: flex-end">
                <a href="{{route('admin.users.create')}}"><button type="button" class="btn btn-primary">Create User</button></a>
            </div>
            <div>
                <form action="{{route('admin.users.index')}}" method="get" class="row g-3 mt-2" style="display: flex">
                    <div class="mb-3 justify-content-end" style="display: flex; gap: 8px">
                        <div class="col-2">
                            <input type="text" class="form-control" id="inputNanme4" placeholder="Name/Second Name" name="name" value="{{ request()->input('name') }}">
                        </div>
                        <div class="col-2">
                            <select id="select_role" class="form-select" name="role" >
                                <option selected value="">Select role</option>

                                @foreach ($roles as $role)
                                    <option value="{{$role}}" {{ request()->input('role') == $role ? 'selected' : ''}}>{{$role}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-2">
                            <select id="inputStatus" class="form-select" name="status">
                                <option selected value="">Select status</option>
                                <option value="1" {{ request()->input('status') == '1' ? 'selected' : ''}}>Active</option>
                                <option value="0" {{ request()->input('status') == '0' ? 'selected' : ''}}>Unactive</option>
                            </select>
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
                        <th >Second Name</th>
                        <th >Email</th>
                        <th >Role</th>
                        <th >Status</th>
                        <th style="width: 80px !important">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $user)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->second_name }} </td>
                        <td>{{ $user->email}}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge bg-info text-dark">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td class="{{ $user->status ? 'text-success' : 'text-danger'}}">{{ $user->status ? 'Active' : 'Unactive'}}</td>
                        <td class="px-0">
                            <div style="d-flex justify-content-between">
                                <a href="{{ route('admin.users.edit',$user->id) }}">
                                    <i class="bi bi-pencil-square action_i"></i>
                                </a>
                                <i class="bi bi-trash action_i" data-bs-toggle="modal" data-bs-target="#disablebackdrop"  onclick="create_request_route(`users`, {{$user->id}})"></i>
                                <a href="{{ route('change_status', [$user->id, 'users', $user->status ? 0 : 1]) }}">
                                    <i class="bi bi-check-circle action_i" style="color:{{ $user->status == '1' ? '#0d6efd' : ''}}" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="{{ $user->status == '1' ? 'Change status to unactive' : 'Change status to active'}}"> </i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($data->total() == 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Nothing found
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <!-- End Primary Color Bordered Table -->
        </div>
    </div>

    <div class="card-body d-flex justify-content-center">
        <nav aria-label="...">
            <ul class="pagination">
                {{ $data->links() }}
            </ul>
        </nav>
    </div>

    @extends('layouts.modal')
@endsection
@section('js-scripts')
    <script src="{{ asset('assets/back/js/modal.js') }}"></script>
@endsection
