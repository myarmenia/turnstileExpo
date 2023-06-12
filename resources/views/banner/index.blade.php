@extends('layouts.auth-app')
@section('link')
<link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection

@section('content')
{{-- <main id="main" class="main"> --}}
  <div class="pagetitle">
    <h1>Banner</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('banner.index')}}" class="active">Banner</a></li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

  <div class="card pt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between my-2">
            <h5 class="fw-bold">Running Text</h5>

        </div>
        @if ( $running_text==null)
                <div style="display: flex; justify-content: flex-end;margin:15px 0">
                    <a href="{{route('running-text.create')}}" class="btn btn-primary">Create Running row</a>
                </div>
            @endif
      <!-- Primary Color Bordered Table -->


      <div>

      </div>

      <table class="table table-bordered border-primary">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Description</th>
            <th scope="col">Link</th>
            <th scope="col" style="width: 60px !important">Actions</th>
          </tr>
        </thead>
        <tbody>
            @if ($running_text!=null)
                <tr>
                    <th scope="row">1</th>
                    <td style="max-width: 300px !important">
                        {{  $running_text->content }}
                    </td>
                    <td>
                        <a href="{{$running_text->link}}">link</a>
                    <td>
                    <div style="display: flex !important">
                        @if ($running_text!=null)
                            <a href="{{route('running-text.edit', $running_text->id)}}"><i class="bi bi-pencil-square action_i"></i></a>
                        @endif
                    </div>
                    </td>
                </tr>
            @endif
        </tbody>
      </table>
      <!-- End Primary Color Bordered Table -->
    </div>
  </div>
  <div class="card pt-4">
    <div class="card-body">
      <!-- Primary Color Bordered Table -->


      <div style="display: flex; justify-content: space-between;margin:15px 0">
        <h5 class="fw-bold">Banner</h5>
        <a href="{{route('banner.create')}}" class="btn btn-primary">Create Banner</a>
      </div>
      <div>

      </div>
      <table class="table table-bordered border-primary">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col" style="width: 60px !important">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($banner as $item )
            <tr>
                <th scope="row">{{++$i}}</th>
                <td style="max-width: 300px !important">
                {{$item->banner_tranlations->content }}
                </td>
                <td><img src="{{ route('get-file',['path'=>$item->path])}}" style="height:70px;width:70px"> </td>

                <td>
                <div style="display: flex !important">
                    <a href="{{route('banner.edit', $item->id)}}"><i class="bi bi-pencil-square action_i"></i></a>
                    @role('Admin')
                        <i class="bi bi-trash action_i " data-bs-toggle="modal" data-bs-target="#disablebackdrop"
                        onclick="create_request_route(`banner`, {{$item->id}})"></i>

                    @endrole

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


    <!-- End Disabled and active states -->
  </div>
  {{--
</main> --}}

@endsection
@extends('layouts.modal')
@section('js-scripts')
<script src="{{ asset('assets/back/js/modal.js') }}"></script>
@endsection
