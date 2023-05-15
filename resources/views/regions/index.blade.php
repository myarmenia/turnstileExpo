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
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseOne"
                      aria-expanded="true"
                      aria-controls="collapseOne"
                    >
                      Region
                    </button>
                  </h2>
                  <div
                    id="collapseOne"
                    class="accordion-collapse collapse show"
                    aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="accordion-body p-0 parent">
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 1</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 2</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 3</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseTwo"
                      aria-expanded="false"
                      aria-controls="collapseTwo"
                    >
                      Region2
                    </button>
                  </h2>
                  <div
                    id="collapseTwo"
                    class="accordion-collapse collapse"
                    aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="accordion-body p-0 parent">
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 4</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 5</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 6</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseThree"
                      aria-expanded="false"
                      aria-controls="collapseThree"
                    >
                      Region3
                    </button>
                  </h2>
                  <div
                    id="collapseThree"
                    class="accordion-collapse collapse"
                    aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="accordion-body p-0 parent">
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 7</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 8</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 9</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne1">
                    <button
                      class="accordion-button"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseOne1"
                      aria-expanded="true"
                      aria-controls="collapseOne1"
                    >
                      Region0
                    </button>
                  </h2>
                  <div
                    id="collapseOne1"
                    class="accordion-collapse collapse show"
                    aria-labelledby="headingOne1"
                    data-bs-parent="#accordionExample1"
                  >
                    <div class="accordion-body p-0 parent">
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 11</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 22</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 33</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo1">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseTwo1"
                      aria-expanded="false"
                      aria-controls="collapseTwo1"
                    >
                      Region22
                    </button>
                  </h2>
                  <div
                    id="collapseTwo1"
                    class="accordion-collapse collapse"
                    aria-labelledby="headingTwo1"
                    data-bs-parent="#accordionExample1"
                  >
                    <div class="accordion-body p-0 parent">
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 44</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 55</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 66</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree1">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseThree1"
                      aria-expanded="false"
                      aria-controls="collapseThree1"
                    >
                      Region33
                    </button>
                  </h2>
                  <div
                    id="collapseThree1"
                    class="accordion-collapse collapse"
                    aria-labelledby="headingThree1"
                    data-bs-parent="#accordionExample1"
                  >
                    <div class="accordion-body p-0 parent">
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 77</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 88</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                      <div
                        class="px-3 py-2 bord_title d-flex justify-content-between align-items-center"
                      >
                        <div>Country 99</div>
                        <div>
                          <i
                            class="bi bi-arrow-right-circle"
                            style="cursor: pointer; font-size: 24px"
                          ></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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

