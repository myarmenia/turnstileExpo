@extends('layouts.auth-app')
@section('link')
    {{-- @vite(['resources/js/app.js']) --}}
    <link href="{{ asset('assets/css/chat.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Chat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('press-release.index')}}">Home</a></li>
                <li class="breadcrumb-item">Chat</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <section style="background-color: #fff">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-md-6 col-lg-7 col-xl-8">
                            <div class="py-2 px-4 border-bottom d-none d-lg-block pb-3">
                                <div class="d-flex align-items-center py-1">
                                    <div class="position-relative">
                                        <img
                                            src="{{ route('get-file',['path'=>auth()->user()->roles[0]->avatar]) }}"
                                            class="rounded-circle mr-1"
                                            alt="Sharon Lessman"
                                            width="40"
                                            height="40"
                                        />
                                    </div>
                                    <div class="flex-grow-1 pl-3" style="padding-left: 12px">
                                        <strong>{{auth()->user()->name}} {{auth()->user()->second_name}}</strong>
                                        {{-- <div class="text-muted small"><em>Online</em></div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="text-center my-5">Please select a chat member</div>
                        </div>

                        <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="input-group rounded mb-3 pt-3">
                                        <input
                                        type="search"
                                        class="form-control rounded"
                                        placeholder="Search"
                                        aria-label="Search"
                                        aria-describedby="search-addon"
                                        />
                                        <span class="input-group-text border-0" id="search-addon">
                                        <i class="bi bi-search"></i>
                                        </span>
                                    </div>

                                    <ul class="list-unstyled mb-0 scroll_ul">
                                        @foreach ($users as $user)
                                            <li class="p-2 border-bottom">
                                                {{-- {{dd($user->room_users)}} --}}

                                                <a href="{{ route('check_room', $user->id)}}" class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row">
                                                    <img
                                                        src="{{ route('get-file',['path'=>$user->roles[0]->avatar]) }}"
                                                        alt="avatar"
                                                        class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                                        width="60"
                                                    />
                                                    <div class="pt-1">
                                                        <p class="fw-bold mb-0">{{$user->name}} {{$user->second_name}}</p>
                                                    </div>
                                                    </div>
                                                    {{-- <div class="pt-1">
                                                        <span class="badge bg-danger float-end">1</span>
                                                    </div> --}}
                                                </a>
                                                </li>

                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

