@extends('layouts.auth-app')
@section('link')
<link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

{{--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
<div class="pagetitle">
    <h1>Feedback</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Feedback</li>
            <li class="breadcrumb-item active">Read</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <div class="col-12 my-3">Full name: {{ $feedback->full_name }}</div>
                    <div class="col-12 my-3">Email: {{ $feedback->email }}</div>
                    <div class="col-12 my-3">Type: {{ $feedback->type }}</div>
                    <div class="col-12 my-3">Status: {{ $feedback->status }}</div>
                    <div class="col-12 my-3">Sent message: {{ $feedback->content }}</div>
                    @role('Admin')
                    @if($feedback->users != null)
                    <div class="col-12 my-3">Respondent: {{ $feedback->users->name }} {{ $feedback->users->second_name
                        }}</div>
                    @endif
                    @endrole


                    <div class="h6 mt-4">Answer</div>
                    <form action="{{ route('feedback.update', $feedback->id) }}" method="post"
                        class="w-100 d-flex flex-column">
                        @csrf
                        @method('patch')
                        @if ($feedback->status != 'answerd')
                                <textarea class="w-100 ps-2 @error('answer_content') _incorrectly @enderror" id=""
                                    name='answer_content' rows=" 3">{{ $feedback->answer_content ?? "" }}</textarea>
                            @error('answer_content')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        @else
                        <div>{{ $feedback->answer_content ?? "" }}</div>
                        @endif
                        @role('Admin')
                        @if($feedback->status != 'answerd')
                        <button class="btn btn-primary mt-3" style="width: 10%">Send</button>
                        @endif
                        @else
                        @if($feedback->status == 'new' || $feedback->status == 'read')
                        <button class="btn btn-primary mt-3" style="width: 10%">Send</button>
                        @endif
                        @endrole
                    </form>



                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js-scripts')
<script src="{{ asset('assets/back/js/current_earthquakes_edit.js') }}"></script>
<script src="{{ asset('assets/back/js/delete_item.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection