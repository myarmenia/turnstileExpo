{{-- @extends('layouts.auth-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.auth-app')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="row">
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Press Releases</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ri-file-list-2-line"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $press_release->count() }}</h6>
                            <a href="{{ route('press-release.index') }}">Go to Press Realese page</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Current Earthquakes</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ri-earthquake-line"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $current_earthquake->count() }}</h6>
                            <a href="{{ route('current-earthquakes.index') }}">Go to Current Earthquakes page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">News</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bx bx-news"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $news->count() }}</h6>
                            <a href="{{ route('news.index') }}">Go to News page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Feedback</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ri-feedback-line"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $feedback->count() }}</h6>
                            <a href="{{ route('feedback.index') }}">Go to Feedback page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Gloobal Monitoring</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ri-earth-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $global_monitoring->count() }}</h6>
                            <a href="{{ route('global-monitoring.index') }}">Go to Global Monitoring page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Regional Monitoring</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ri-map-pin-2-line"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $regional_monitoring->count() }}</h6>
                            <a href="{{ route('regional-monitoring.index') }}">Go to Regional Monitoring page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection