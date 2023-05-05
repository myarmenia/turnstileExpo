@extends('layouts.auth-app')

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
                <form class="row g-3 mt-2" style="display: flex">
                    <div class="mb-3" style="display: flex; gap: 8px">
                        <div class="col-2">
                            <input type="text" class="form-control" id="inputNanme4" placeholder="Title" />
                        </div>
                        <div class="col-2 pt-2 text-end">Date interval: </div>
                        <div class="col-2">
                            <input type="text" class="form-control" placeholder="From" onfocus="(this.type='date')">
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" placeholder="To" onfocus="(this.type='date')">
                        </div>
                        <div class="col-2">
                            <select id="inputState" class="form-select">
                                <option selected>Choose...</option>
                                <option>...</option>
                                <option>222</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary w-100">Search</button>
                    </div>
                </form>
            </div>
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th scope="col">Moderator</th>

                        <th scope="col" style="width: 60px !important">Actions</th>
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
                        <td>{{ $release->date }}</td>
                        <td>{{ $release->time }}</td>
                        <td>{{ $release->status }}</td>
                        <td>
                            <div style="display: flex !important">
                                <a href="{{ route('current-earthquakes.edit', $release->id) }}">
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
        <!-- Disabled and active states -->
        <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#">Next</a>
            </li>
        </ul>
        </nav>
        <!-- End Disabled and active states -->
    </div>
@endsection
