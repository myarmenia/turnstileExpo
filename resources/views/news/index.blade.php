@extends('layouts.auth-app')

@section('content')
{{-- <main id="main" class="main"> --}}
    <div class="pagetitle">
      <h1>News</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">News</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <div class="card pt-4">
      <div class="card-body">
        <!-- Primary Color Bordered Table -->
        <div style="display: flex; justify-content: flex-end">
          <a href="{{route('news.create')}}" class="btn btn-primary">Create News</a>
        </div>

        <div>
          <form class="row g-3 mt-2" style="display: flex">
            <div class="mb-3" style="display: flex; gap: 8px">
              <div class="col-2">
                <!-- <label for="inputNanme4" class="form-label">Title</label> -->
                <input type="text" class="form-control" id="inputNanme4" placeholder="Title" />
              </div>
              <div class="col-2">
                <select id="inputState" class="form-select">
                  <option selected>Choose...</option>
                  <option>...</option>
                  <option>222</option>
                </select>
              </div>

              <button
                type="button"
                class="btn btn-primary"
                style="width: 13.01111111111111111111% !important"
              >
                Search
              </button>
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
              <th scope="col" style="width: 60px !important">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($news as $item )
                <tr>
                <th scope="row">{{++$i}}</th>
                <td>{!!$item->title_en!!}</td>
                <td style="max-width: 300px !important">
                    {!! $item->description_en !!}
                </td>
                <td><img src="{{ route('get-file',['path'=>$item->image])}}" style="height:70px;width:70px"> </td>
                <td>{{ $item->status }}</td>
                <td>
                    <div style="display: flex !important">
                        <a href="{{route('news.edit',$item->id)}}"><i class="bi bi-pencil-square px-1" style="cursor: pointer"></i></a>


                    <i
                        class="bi bi-trash px-2"
                        style="cursor: pointer"
                        data-bs-toggle="modal"
                        data-bs-target="#disablebackdrop"
                    ></i>
                    <i class="bi bi-check-circle check_hover"></i>
                    </div>
                    <div
                    class="modal fade"
                    id="disablebackdrop"
                    tabindex="-1"
                    data-bs-backdrop="false"
                    >
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Disabled Backdrop</h5>
                            <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta
                            at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in
                            facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est
                            facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                            </button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
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
  {{-- </main> --}}

@endsection
