@extends('layouts.auth-app')

@section('link')
    <link href="{{ asset('assets/css/chat.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Chat</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Room

            </li>
        </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <section style="background-color: #fff">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-md-6 col-lg-7 col-xl-8" id="scroll_div">
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
                            <ul class="list-unstyled scroll_ul pt-4" id="scroll_messages">
                                @foreach ($messages as $message)
                                    @if($message->user_id != auth()->user()->id)
                                        <li class="d-flex justify-content-start mb-4">
                                            <img
                                                src="{{ route('get-file',['path'=>$message->user->roles[0]->avatar]) }}"
                                                alt="avatar"
                                                class="rounded-circle d-flex align-self-start me-3 shadow-1-strong"
                                                width="60"
                                            />
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between p-3">
                                                    <p class="fw-bold mb-0">{{$message['user']['name']}}</p>
                                                    <p class="text-muted small mb-0 mx-3">
                                                        <i class="far fa-clock"></i> {{$message->getTime()}}
                                                    </p>
                                                </div>
                                                <div class="card-body mt-2">
                                                    @if ($message->file)
                                                        <div class="file-div">
                                                            <a href="{{ route('get-file',['path'=>$message->file]) }}" download><i class="bi bi-box-arrow-down"></i> File</a>
                                                        </div>
                                                    @endif
                                                    <p class="mb-0" mt-3>{{$message->content}} </p>
                                                </div>
                                            </div>
                                        </li>
                                    @else
                                        <li class="d-flex justify-content-end mb-4">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between p-3">
                                                    <p class="fw-bold mb-0">{{$message['user']['name']}}</p>
                                                    <p class="text-muted small mb-0 mx-3">
                                                        <i class="far fa-clock"></i> {{$message->getTime()}}
                                                    </p>
                                                </div>
                                                <div class="card-body mt-2">
                                                    @if ($message->file)
                                                        <div class="mb-2 file-div">
                                                            <a href="{{ route('get-file',['path'=>$message->file]) }}" download><i class="bi bi-box-arrow-down"></i> File</a>
                                                        </div>
                                                    @endif
                                                    <p class="mb-0 mt-3">{{$message->content}}</p>
                                                </div>
                                            </div>
                                            <img
                                                src="{{ route('get-file',['path'=>$message->user->roles[0]->avatar]) }}"
                                                alt="avatar"
                                                class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong"
                                                width="60"
                                            />
                                        </li>
                                    @endif

                                @endforeach

                            </ul>
                            <form method="post" enctype="multipart/form-data" id="send_message">
                                @csrf
                                <div
                                    class="text-muted d-flex justify-content-start align-items-center pe-3 pt-1 mt-2 px-4 py-2"
                                    style="
                                    background-color: #fbfbfb;
                                    border-radius: 20px;
                                    box-shadow: 0px 5px 17px 5px rgba(0, 0, 0, 0.18);
                                    "
                                >
                                    <img
                                        src="{{ route('get-file',['path'=>auth()->user()->roles[0]->avatar]) }}"
                                        alt="avatar 3"
                                        style="width: 40px; height: 100%"
                                    />
                                    <input
                                        type="text"
                                        class="form-control form-control-lg"
                                        id="message_content"
                                        placeholder="Type message"
                                        name="content"
                                    />
                                    <label for="file-up" id="up-label">
                                        <i class="bi bi-paperclip icon_send"></i>
                                    </label>
                                    <input type="file" id="file-up" class="d-none" name="file">

                                    <button type="submit" class="send_message" id="send_btn">
                                        <i
                                            class="bi bi-send icon_send ms-3"
                                            style="cursor: pointer"
                                            {{-- onclick="scrollToBottom()" --}}
                                        ></i>
                                    </button>
                                </div>
                            </form>
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
                                    <li class="p-2 border-bottom {{$room->active_user() == $user->id ? ' active_user' : ''}}">
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
                                                    <p class="fw-bold mb-0">{{$user->name}} {{$user->second_name}} </p>
                                                </div>
                                            </div>
                                            <div class="pt-1" id="user_{{$user->id}}">
                                                @if ($user->written_new_messages_count() > 0)
                                                    <span class="badge bg-danger float-end"> {{ $user->written_new_messages_count() }} </span>
                                                @endif
                                            </div>
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
@section('js-scripts')
    <script>
         let room_id = "{{$room->id}}"
    </script>
    <script src="{{ asset('assets/back/js/chat.js') }}"></script>
    <script src="{{ asset('assets/back/js/unread-messages.js') }}"></script>

@endsection
