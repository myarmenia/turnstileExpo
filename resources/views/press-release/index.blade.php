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
                <li class="breadcrumb-item active"><a href="{{route('press-release.index')}}">Press Release</a></li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <div class="card pt-4">
        <div class="card-body">
            <div style="display: flex; justify-content: flex-end">
                <a href="{{route('press-release.create')}}"><button type="button" class="btn btn-primary">Create Press Release</button></a>
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
                        <th >Title</th>
                        <th >Description</th>
                        <th >Date</th>
                        <th >Moderator</th>
                        <th >Status</th>

                        <th  style="width: 80px !important">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($press_releases as $release)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{ $release->title_en }}</td>
                        <td style="max-width: 300px !important">
                            {!! $release->description_en !!}
                        </td>
                        <td>{{ date('d-m-Y', strtotime($release->date))}}</td>
                        <td>moderator name</td>
                        <td>{{ $release->status }}</td>
                        <td class="px-1">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('press-release.edit', $release->id) }}">
                                    <i class="bi bi-pencil-square action_i"></i>
                                </a>
                                <i class="bi bi-trash action_i" data-bs-toggle="modal" data-bs-target="#disablebackdrop"  onclick="create_request_route(`press-release`, {{$release->id}})"></i>
                                <a href="{{ $release->status != 'confirmed' ? route('change_status', [$release->id, 'press_releases', 'confirmed']) : ''}}">
                                    <i class="bi bi-check-circle action_i" style="color:{{ $release->status == 'confirmed' ? '#0d6efd' : ''}}" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="{{ $release->status == 'confirmed' ? 'Confirmed' : 'Change status to confirmed'}}"> </i>
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
                {{ $press_releases->links() }}
            </ul>
        </nav>
    </div>

    @extends('layouts.modal')
@endsection
@section('js-scripts')
    <script src="{{ asset('assets/back/js/modal.js') }}"></script>
@endsection
