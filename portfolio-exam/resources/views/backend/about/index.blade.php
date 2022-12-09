@extends('layouts.app')

@section('title')
    About
@endsection
@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(function () {
        $('textarea[name=description]').summernote({height: 200});
    });
</script>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('About') }}</div>
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>Success!</strong> {!! Session::get('success') !!}
                            <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <form action="{{ route('backend.manage.about.process') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <div class="mb-2 @error('title') text-danger fw-bold @enderror">Title:</div>
                                    {{-- <input type="text" name="title" value="{{ $abouts->heading }}" class="form-controll @error('title') text-danger is-invalid @enderror"> --}}
                                    @error('title')
                                        {{-- <small class="text-danger">{!! $message !!}</small> --}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <div class="mb-2 @error('description') text-danger fw-bold @enderror">Description:</div>
                                    <textarea class="form-control @error('description') text-danger is-invalid @enderror" name="description" placeholder="Description"></textarea>
                                    @error('heading')
                                        {{-- <small class="text-danger">{!! $message !!}</small> --}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button class="btn btn-sm btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
