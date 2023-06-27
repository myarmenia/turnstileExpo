@extends('layouts.auth-app')
@section('link')
<link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection

@section('content')
{{-- <main id="main" class="main"> --}}
  <div class="pagetitle">
    <h1>News</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item "><a href="{{route('news.index')}}" class="active">News</a></li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

  <div class="card pt-4">
    <div class="card-body">
      <!-- Primary Color Bordered Table -->
      {{-- <div style="d-flex justify-content-between">
        <div class="w-75">
            @if ($message = Session::get('permission_denied'))
                <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                    {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <a href="{{route('news.create')}}" class="btn btn-primary">Create News</a>
      </div> --}}
    <div class="d-flex justify-content-between">
        <div class="w-75">
            @if ($message = Session::get('permission_denied'))
                <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                    {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <a href="{{route('news.create')}}"><button type="button" class="btn btn-primary">Create News</button></a>
     </div>

      <div>
        <form action="{{route('news.index')}}" method="get" class="row g-3 mt-2" style="display: flex">
          <div class="mb-3" style="display: flex; gap: 8px;justify-content:end">
            <div class="col-2">
              <!-- <label for="inputNanme4" class="form-label">Title</label> -->
              <input type="text" class="form-control" id="inputNanme4" name="title" placeholder="Title"
                value="{{ request()->input('title') }}" />
            </div>
            <div class="col-2">
              <select id="inputState" class="form-select" name="status">
                <option value="" selected>Status</option>
                <option value="new" {{ request()->input('status') == 'new' ? 'selected' : ''}}>New</option>
                <option value="confirmed" {{ request()->input('status') == 'confirmed' ? 'selected' : ''}}>Confirmed
                </option>
                <option value="hidden" {{ request()->input('status') == 'hidden' ? 'selected' : ''}}>Hidden</option>
                <option value="reditab" {{ request()->input('status') == 'reditab' ? 'selected' : ''}}>Reditab</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary"
              style="width: 13.01111111111111111111% !important">Search</button>
          </div>
          <!-- </div> -->
        </form>
      </div>
      <table class="table table-bordered border-primary">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Status</th>
            <th scope="col">Editor name</th>
            <th scope="col" style="width: 60px !important">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($news as $item )


          <tr>
            <th scope="row">{{++$i}}</th>
            <td>{{ $item->news_translations->title }}</td>
            <td style="max-width: 300px !important">
              {!! $item->news_translations->description !!}
            </td>
            <td><img src="{{ route('get-file',['path'=>$item->image])}}" style="height:70px;width:70px"> </td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->editor->name}}</td>
            <td>
              <div style="display: flex !important">
                <a href="{{route('news.edit', $item->id)}}"><i class="bi bi-pencil-square action_i"></i></a>

                @role('Admin')
                    <i class="bi bi-trash action_i " data-bs-toggle="modal" data-bs-target="#disablebackdrop"
                    onclick="create_request_route(`news`, {{$item->id}})"
                    ></i>

                    <a href="{{ $item->status!='confirmed'? route('change_status', [$item->id, 'news', 'confirmed']) :'' }}">
                        <i class="bi bi-check-circle action_i"
                            style="color:{{ $item->status == 'confirmed' ? '#0d6efd' : ''}}" data-bs-toggle="tooltip"
                            data-bs-placement="left"
                            data-bs-original-title="{{ $item->status == 'confirmed' ? 'Confirmed' : 'Change status to confirmed'}}">
                        </i>
                    </a>
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

    {{$news->links()}}
    <!-- End Disabled and active states -->
  </div>
  {{--
</main> --}}

@endsection
@extends('layouts.modal')
@section('js-scripts')
<script src="{{ asset('assets/back/js/modal.js') }}"></script>
@endsection
