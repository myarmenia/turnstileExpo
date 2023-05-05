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
                <!-- <label for="inputEmail4" class="form-label">Title AM</label> -->
                <input
                  type="email"
                  class="form-control"
                  id="inputEmail4"
                  placeholder="Magnituda"
                />
              </div>

              <!-- <div class="row mb-3"> -->
              <!-- <label for="inputDate" class="col-sm-2 col-form-label">From</label> -->
              <div class="col-2">
                <input type="date" class="form-control" placeholder="From" />
              </div>
              <!-- </div> -->

              <!-- <div class="row mb-3"> -->
              <!-- <label for="inputDate" class="col-sm-2 col-form-label">To</label> -->
              <div class="col-2">
                <input type="date" class="form-control" placeholder="To" />
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
            <tr>
              <th scope="row">1</th>
              <td>Brandon Jacob</td>
              <td style="max-width: 300px !important">
                Designerkjfhgd oiufhsdo ighosidhgosih Designerk jfhgdoiufh
              </td>
              <td>28</td>
              <td>2016-05-25</td>
              <td>
                <div style="display: flex !important">
                  <i class="bi bi-pencil-square px-1" style="cursor: pointer"></i>

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
            <tr>
              <th scope="row">2</th>
              <td>Bridie Kessler</td>
              <td>Developer</td>
              <td>35</td>
              <td>2014-12-05</td>
              <td>
                <div style="display: flex !important">
                  <i class="bi bi-pencil-square px-1" style="cursor: pointer"></i>

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
            <tr>
              <th scope="row">3</th>
              <td>Ashleigh Langosh</td>
              <td>Finance</td>
              <td>45</td>
              <td>2011-08-12</td>
              <td>
                <div style="display: flex !important">
                  <i class="bi bi-pencil-square px-1" style="cursor: pointer"></i>

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
            <tr>
              <th scope="row">4</th>
              <td>Angus Grady</td>
              <td>HR</td>
              <td>34</td>
              <td>2012-06-11</td>
              <td>
                <div style="display: flex !important">
                  <i class="bi bi-pencil-square px-1" style="cursor: pointer"></i>

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
            <tr>
              <th scope="row">5</th>
              <td>Raheem Lehner</td>
              <td>Dynamic Division Officer</td>
              <td>47</td>
              <td>2011-04-19</td>
              <td>
                <div style="display: flex !important">
                  <i class="bi bi-pencil-square px-1" style="cursor: pointer"></i>

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
          </tbody>
        </table>
        <!-- End Primary Color Bordered Table -->
      </div>
    </div>

    <div class="card-body d-flex justify-content-center">
      <!-- Disabled and active states -->
      <nav aria-label="...">
        <ul class="pagination">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
      <!-- End Disabled and active states -->
    </div>
  {{-- </main> --}}

@endsection
