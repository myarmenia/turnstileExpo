@extends('layouts.auth-app')
@section('link')
    @vite(['resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link href="{{ asset('assets/css/chat.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Chat</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('press-release.index')}}">Home</a></li>
            <li class="breadcrumb-item">Room

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
                            <ul class="list-unstyled scroll_ul pt-4" id="scroll_messages">
                                @foreach ($messages as $message)
                                    @if($message->user_id == auth()->user()->id)
                                    <li class="d-flex justify-content-between mb-4">
                                        <img
                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                                            alt="avatar"
                                            class="rounded-circle d-flex align-self-start me-3 shadow-1-strong"
                                            width="60"
                                        />
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between p-3">
                                            <p class="fw-bold mb-0">{{$message['user']['name']}}</p>
                                            <p class="text-muted small mb-0">
                                                <i class="far fa-clock"></i> 12 mins ago
                                            </p>
                                            </div>
                                            <div class="card-body">
                                            <p class="mb-0">{{$message->content}} </p>
                                            </div>
                                        </div>
                                        </li>
                                    @else
                                    <li class="d-flex justify-content-between mb-4">
                                        <div class="card w-100">
                                            <div class="card-header d-flex justify-content-between p-3">
                                            <p class="fw-bold mb-0">{{$message['user']['name']}}</p>
                                            <p class="text-muted small mb-0">
                                                <i class="far fa-clock"></i> 13 mins ago
                                            </p>
                                            </div>
                                            <div class="card-body">
                                            <p class="mb-0">{{$message->content}}</p>
                                            </div>
                                        </div>
                                        <img
                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp"
                                            alt="avatar"
                                            class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong"
                                            width="60"
                                        />
                                        </li>
                                    @endif

                                @endforeach

                            </ul>
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
                                    id="exampleFormControlInput2"
                                    placeholder="Type message"
                                />
                                <a class="ms-1 text-muted" href="#!"><i class="bi bi-paperclip icon_send"></i></a>
                                <i
                                    class="bi bi-send icon_send ms-3"
                                    style="cursor: pointer"
                                    onclick="scrollToBottom()"
                                ></i>
                            </div>
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
@section('js-scripts')
    {{-- <script src="{{ asset('assets/back/js/modal.js') }}"></script> --}}
    <script>
        // document.addEventListener("DOMContentLoaded", function(event) {
        //     console.log(555)
        //     window.Echo.channel('events')
        //         .listen('.ev', (e) => {
        //             console.log(333777777);

        //         });
        // });
        $(document).ready(function (){
        Echo.join(`message.{{$room->id}}`)
                .here((data) => {
                    console.log(data)
                })
                .joining((data) => {
console.log(11)
                    let listMessage = '';
                    $("#scroll_messages").empty();
                    let user_id = "{{auth()->user()->id}}";
                    console.log(user)
                    data.messages.forEach(function(item) {
                        if (item.user_id != user_id)
                        {
                            listMessage += `
                            <li class="d-flex justify-content-between mb-4">
                                        <img
                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                                            alt="avatar"
                                            class="rounded-circle d-flex align-self-start me-3 shadow-1-strong"
                                            width="60"
                                        />
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between p-3">
                                            <p class="fw-bold mb-0">${item.user.name}</p>
                                            <p class="text-muted small mb-0">
                                                <i class="far fa-clock"></i> 12 mins ago
                                            </p>
                                            </div>
                                            <div class="card-body">
                                            <p class="mb-0">${item.content} </p>
                                            </div>
                                        </div>
                                        </li>
                            `;
                        }
                        else
                        {
                            listMessage += `
                            <li class="d-flex justify-content-between mb-4">
                                        <div class="card w-100">
                                            <div class="card-header d-flex justify-content-between p-3">
                                            <p class="fw-bold mb-0">${item.user.name}</p>
                                            <p class="text-muted small mb-0">
                                                <i class="far fa-clock"></i> 13 mins ago
                                            </p>
                                            </div>
                                            <div class="card-body">
                                            <p class="mb-0">${item.content}</p>
                                            </div>
                                        </div>
                                        <img
                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp"
                                            alt="avatar"
                                            class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong"
                                            width="60"
                                        />
                                        </li>
                                `;
                        }

                    });
                    $("#scroll_messages").append(listMessage);
                });
            })

    </script>
@endsection
