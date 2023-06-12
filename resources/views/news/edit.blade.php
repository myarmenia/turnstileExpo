@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
            <div class="pagetitle">
              <h1>News</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{route('news.index')}}" >News</a></li>
                  <li class="breadcrumb-item active">Edit</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->

    {{-- ========== --}}
            <div class="card">
              <div class="card-body">
                <div class="col-12 d-flex ">
                    <div class="w-50">
                        <h5 class="card-title">Edit News</h5>
                    </div>
                    @role('Admin')
                        <div class="d-flex flex-column w-50 justify-content-end pt-3">
                            <div class="text-end">
                                <label>Editor:</label>
                                <span class="text-primary ont-weight-bold text-end"> {{$news->editor->name}}</span>
                            </div>
                            <div class="text-end">
                                <label>Status:</label>
                                <span class="text-primary ont-weight-bold text-end"> {{ $news->status}}</span>
                            </div>

                            <div class="d-flex text-end justify-content-end ">
                                <label for="select_status" class="form-label pt-2 mx-2">Change status to: </label>

                                <select id="select_status" class="form-select w-50" data-id="{{$news->id}}" data-table="news" data-delete-url="news">
                                    <option selected disabled>Status</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="hidden">Hidden</option>
                                    <option value="reditab">Reditab</option>
                                    <option value="delete">Delete</option>
                                </select>

                            </div>

                        </div>
                    @endrole

                </div>
                <!-- News Form -->
                <form class="row g-3" action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @foreach (languages() as  $lng)
                        <div class="col-12">
                            <label for="title_{{$lng->name}}" class="form-label">Title {{ Str::upper($lng->name) }}</label>
                            <input type="text" name="translations[{{$lng->id }}][title]"  class='form-control @error("translations.$lng->id.title") _incorrectly @enderror'  value="{{ $news->translation($lng->id)->title }}">
                        </div>
                        @error("translations.$lng->id.title")
                                <div class="error_message"> {{ $message }} </div>
                        @enderror
                    @endforeach
                    @foreach  (languages() as  $lng)
                            <div class="flex mb-2 p-2">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Description {{ Str::upper($lng->name) }}</label>
                            <div class="col-sm-12">
                            <textarea class="ckeditor form-control @error("translations.$lng->id.description") _incorrectly @enderror" name="translations[{{$lng->id}}][description]" >{{ $news->translation($lng->id)->description }}</textarea>
                            </div>
                        </div>
                        @error("translations.$lng->id.description")
                            <div class="error_message"> {{ $message }} </div>
                        @enderror
                    @endforeach
                    <div class="flex mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file"  name="image" id="logo" accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG">
                        </div>
                    </div>
                    @if($news->image==null)
                        @error('image')
                            <div class="error_message"> {{ $message }} </div>
                        @enderror
                    @else

                    <div class="logo_div ">
                        <div class="d-flex file_div">
                            <img src="{{route('get-file',['path'=>$news->image])}}">
                        </div>
                    </div>
                  @endif

                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Button Link</label>
                    <input type="text" class="form-control @error('button_link') _incorrectly @enderror" name="button_link" value="{{ $news->button_link }}">
                  </div>
                  @error('button_link')
                    <div class="error_message"> {{ $message }} </div>
                  @enderror

                    @foreach (languages() as  $lng)
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Button {{Str::upper($lng->name)}}</label>
                            <input type="text" class="form-control @error("translations.$lng->id.button") _incorrectly @enderror" name="translations[{{$lng->id}}][button]"  value='{{ $news->translation($lng->id)->button ?? old("translations.$lng->id.button") }}'>
                        </div>
                        @error("translations.$lng->id.button")
                            <div class="error_message"> {{ $message }} </div>
                        @enderror
                    @endforeach
                  <div class="text-left">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
                <!-- News Form -->

              </div>
            </div>
@endsection

@section('js-scripts')
    <script src="{{ asset('assets/back/js/news.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="{{ asset('assets/back/js/edit-status-item.js') }}"></script>
@endsection
