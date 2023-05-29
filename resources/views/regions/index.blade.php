@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="pagetitle">
      <h1>Global Monitoring</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">RegionList</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body" style="padding-top: 20px">
              <!-- Default Accordion -->
              <div class="accordion" id="accordionExample">

                @foreach($regions as $kay=>$item)
                    @if ($kay<=count($regions)/2)

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree{{$item->id}}">
                                @if ( $item->children()->count()==0)
                                    <a href="{{route('global-monitoring.edit', $item->id )}}">
                                        <button
                                                class="accordion-button {{$item->children()->count()>0 ? "collapsed": null }}"
                                                type="button"

                                                data-bs-toggle="{{$item->children()->count()>0 ? 'collapse': null }}"

                                                data-bs-target="#collapseThree{{$item->id}}"
                                                aria-expanded="{{$item->children()->count()>0 ? 'false' : 'true' }}"
                                                aria-controls="collapseThree{{$item->id}}"
                                            >
                                            {{$item->region_translations->name}}
                                            </button>

                                    </a>

                                @else
                                    <button
                                        class="accordion-button {{$item->children()->count()>0 ? "collapsed": null }}"
                                        type="button"

                                        data-bs-toggle="{{$item->children()->count()>0 ? 'collapse': null }}"

                                        data-bs-target="#collapseThree{{$item->id}}"
                                        aria-expanded="{{$item->children()->count()>0 ? 'false' : 'true' }}"
                                        aria-controls="collapseThree{{$item->id}}"
                                    >
                                    {{$item->region_translations->name}}
                                    </button>
                                @endif
                            </h2>
                            @if ($item->children()->count()>0)
                                <div
                                id="collapseThree{{$item->id}}"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingThree{{$item->id}}"
                                data-bs-parent="#accordionExample"
                                >
                                    <div class="accordion-body p-0 parent">
                                        @foreach ($item->children as $data)
                                            <a href="{{route('global-monitoring.edit', $data->id )}}">
                                                <div class="px-3 py-2 bord_title d-flex justify-content-between align-items-center">

                                                        <div>{{$data->region_translations->name}}</div>
                                                        <div>
                                                            <i
                                                            class="bi bi-arrow-right-circle"
                                                            style="cursor: pointer; font-size: 24px"
                                                            ></i>
                                                        </div>

                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                @endforeach


              </div>
              <!-- End Default Accordion Example -->
            </div>
          </div>
        </div>

        <!-- 2 -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body" style="padding-top: 20px">
              <!-- Default Accordion -->
              <div class="accordion" id="accordionExample1">
                @foreach($regions as $kay=>$item)
                @if ($kay>=count($regions)/2)

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree{{$item->id}}">
                            @if ( $item->children()->count()==0)
                                <a href="{{route('global-monitoring.edit', $item->id )}}">
                                    <button
                                            class="accordion-button {{$item->children()->count()>0 ? "collapsed": null }}"
                                            type="button"

                                            data-bs-toggle="{{$item->children()->count()>0 ? 'collapse': null }}"

                                            data-bs-target="#collapseThree{{$item->id}}"
                                            aria-expanded="{{$item->children()->count()>0 ? 'false' : 'true' }}"
                                            aria-controls="collapseThree{{$item->id}}"
                                        >
                                        {{$item->region_translations->name}}
                                        </button>

                                </a>

                            @else
                                <button
                                    class="accordion-button {{$item->children()->count()>0 ? "collapsed": null }}"
                                    type="button"

                                    data-bs-toggle="{{$item->children()->count()>0 ? 'collapse': null }}"

                                    data-bs-target="#collapseThree{{$item->id}}"
                                    aria-expanded="{{$item->children()->count()>0 ? 'false' : 'true' }}"
                                    aria-controls="collapseThree{{$item->id}}"
                                >
                                {{$item->region_translations->name}}
                                </button>
                            @endif
                        </h2>
                        @if ($item->children()->count()>0)
                            <div
                            id="collapseThree{{$item->id}}"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingThree{{$item->id}}"
                            data-bs-parent="#accordionExample"
                            >
                                <div class="accordion-body p-0 parent">
                                    @foreach ($item->children as $data)
                                        <a href="{{route('global-monitoring.edit', $data->id )}}">
                                            <div class="px-3 py-2 bord_title d-flex justify-content-between align-items-center">

                                                    <div>{{$data->region_translations->name}}</div>
                                                    <div>
                                                        <i
                                                        class="bi bi-arrow-right-circle"
                                                        style="cursor: pointer; font-size: 24px"
                                                        ></i>
                                                    </div>

                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            @endforeach

              </div>
              <!-- End Default Accordion Example -->
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
@extends('layouts.modal')
@section('js-scripts')
    <script src="{{ asset('assets/back/js/modal.js') }}"></script>
@endsection

