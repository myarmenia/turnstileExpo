{{-- @extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('admin.users.create') }}"> Create New User</a>
        </div>
    </div>
</div> --}}

{{--
<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr> --}}
    {{-- <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('admin.users.show',$user->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!} --}}

{{--
<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection --}}


@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Press Release</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{route('press-release.index')}}">Users</a></li>
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
                <form action="{{route('press-release.index')}}" method="get" class="row g-3 mt-2" style="display: flex">
                    <div class="mb-3" style="display: flex; gap: 8px">
                        <div class="col-2">
                            <input type="text" class="form-control" id="inputNanme4" placeholder="Title" name="title" value="{{ request()->input('title') }}">
                        </div>
                        <div class="col-2 pt-2 text-end">Date interval: </div>
                        <div class="col-2">
                            <input type="text" class="form-control" placeholder="From" onfocus="(this.type='date')" name="from" value="{{ request()->input('from') ? date('d-m-Y', strtotime(request()->input('from'))) : '' }}">
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" placeholder="To" onfocus="(this.type='date')" name="to" value="{{ request()->input('to') ? date('d-m-Y', strtotime(request()->input('to'))) : '' }}">
                        </div>
                        <div class="col-2">
                            <select id="inputState" class="form-select" name="status">
                                <option value="new" {{ request()->input('status') == 'new' ? 'selected' : ''}}>New</option>
                                <option value="confirmed" {{ request()->input('status') == 'confirmed' ? 'selected' : ''}}>Confirmed</option>
                                <option value="hidden" {{ request()->input('status') == 'hidden' ? 'selected' : ''}}>Hidden</option>
                                <option value="reditab" {{ request()->input('status') == 'reditab' ? 'selected' : ''}}>Reditab</option>
                            </select>
                        </div>
                        <button class="btn btn-primary w-100">Search</button>
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
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->email}}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>status</td>
                        <td class="px-0">
                            <div style="d-flex justify-content-between">
                                <a href="{{ route('admin.users.edit',$user->id) }}">
                                    <i class="bi bi-pencil-square action_i"></i>
                                </a>
                                <i class="bi bi-trash action_i" data-bs-toggle="modal" data-bs-target="#disablebackdrop"  onclick="create_request_route(`press-release`, {{$user->id}})"></i>
                                <a href="{{ route('change_status', [$user->id, 'users', 'confirmed']) }}">
                                    <i class="bi bi-check-circle action_i"  data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title=""> </i>
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
