@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Press Release</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Press Release</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="col-12 d-flex ">
                            <div class="w-50">
                                <h5 class="card-title">Edit Press Release</h5>
                            </div>
                            <div class="d-flex flex-column w-50 justify-content-end pt-3">
                                <div class="text-end">
                                    <label>Moderator:</label>
                                    <span class="text-primary ont-weight-bold text-end">  moderator name</span>
                                </div>
                                <div class="text-end">
                                    <label>Status:</label>
                                    <span class="text-primary ont-weight-bold text-end">  {{ $press_release->status}}</span>
                                </div>
                                <div class="d-flex text-end justify-content-end ">
                                    <label for="select_status" class="form-label pt-2 mx-2">Change status to: </label>

                                    <select id="select_status" class="form-select w-50">
                                        <option value="confirmed">Confirmed</option>
                                        <option value="hidden">Hidden</option>
                                        <option value="reditab">Reditab</option>
                                        <option value="delete">Delete</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <form class="row g-3" action="{{ route('press-release.update', $press_release->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control" id="logo" name="logo" accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG">
                                @error('logo')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="logo_div ">
                                <div class="d-flex file_div">
                                    <img src="{{ route('get-file',['path'=>$press_release->logo]) }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="title_en" class="form-label">Title EN</label>
                                <input type="text" class="form-control @error('title_en') _incorrectly @enderror" id="title_en" name="title_en" value="{{ $press_release->title_en}}">
                                @error('title_en')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="title_am" class="form-label">Title AM</label>
                                <input type="text" class="form-control @error('title_am') _incorrectly @enderror" id="title_am" name="title_am" value="{{ $press_release->title_am}}">
                                @error('title_am')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="title_ru" class="form-label">Title RU</label>
                                <input type="text" class="form-control @error('title_am') _incorrectly @enderror" id="title_ru" name="title_ru" value="{{ $press_release->title_ru}}">
                                @error('title_ru')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control @error('date') _incorrectly @enderror" id="date" name="date" value="{{$press_release->date}}">
                                @error('date')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="time" class="form-label">Date</label>
                                <input type="time" class="form-control @error('time') _incorrectly @enderror" id="time" name="time" value="{{ $press_release->time}}">
                                @error('time')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="description_en" class="form-label">Description EN</label>
                                <textarea class="ckeditor form-control @error('description_en') _incorrectly @enderror" name="description_en" id="description_en">{{ $press_release->description_en}}</textarea>
                                @error('description_en')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="description_am" class="form-label">Description AM</label>
                                <textarea class="ckeditor form-control @error('description_am') _incorrectly @enderror" name="description_am" id="description_am">{{ $press_release->description_am}}</textarea>
                                @error('description_am')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="description_ru" class="form-label">Description RU</label>
                                <textarea class="ckeditor form-control @error('description_ru') _incorrectly @enderror" name="description_ru" id="description_ru">{{ $press_release->description_ru}}</textarea>
                                @error('description_ru')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="col-lg-12">
                                <label for="description_ru" class="form-label">Links </label>
                                <div class="links_div">


                                    @error('links.*')
                                        @foreach (old('links') as $key => $item)
                                            <div>
                                                <div class=" col-lg-6 mr-3 d-flex mt-2">
                                                    <input type="url" class="form-control link {{ $item == null ? '_incorrectly' : ''}}" name="links[]" value="{{$item ?? ''}}">
                                                    <i class="icon ri-delete-bin-2-line remove_link"></i>
                                                </div>
                                                @if ($item == null)
                                                    <div class="error_message" >The link field is required. </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach ($press_release->links as $key => $item)
                                            <div>
                                                <div class=" col-lg-6 mr-3 d-flex mt-2">
                                                    <input type="url" class="form-control link" name="links[]" value = "{{$item->link}}">
                                                    <i class="icon ri-delete-bin-2-line delete_item" data-id="{{$item->id}}" data-table="links" data-type="link"></i>
                                                </div>
                                            </div>
                                        @endforeach
                                    @enderror

                                </div>
                            </div>
                            <div class="col-lg-12 d-flex">
                                <div class="pt-1">Add Link</div>
                                <i class="icon px-3 ri-add-box-line" id="add_link"></i>
                            </div>

                            <div class="col-12">
                                <label for="items" class="form-label">Files</label>
                                <input type="file" class="form-control" id="items" name="items[]" multiple accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG, video/mp4, video/mov, video/ogg, video/qt">
                                @error('items')
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="d-flex flex-wrap justify-content-between">
                                @foreach ($press_release->files as $item)
                                    <div class="d-flex file_div">
                                        <img src="{{ route('get-file',['path'=>$item->path]) }}" class="file">
                                        <i class="delete_item ri-delete-bin-2-line" data-id="{{$item->id}}" data-table="files" data-type="file"></i>
                                    </div>
                                @endforeach
                            </div>
                            <div class="items_div d-flex flex-wrap justify-content-between"> </div>

                            <div class="text-start">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form><!-- Vertical Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('js-scripts')
    <script src="{{ asset('assets/back/js/press-releases.js') }}"></script>
    <script src="{{ asset('assets/back/js/delete_item.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

@endsection
