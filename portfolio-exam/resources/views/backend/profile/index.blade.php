@extends('layouts.app')

@section('title')
    Profile | Update Password
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
                    <form action="{{ route('backend.profile.process') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="mb-3">
                                    <div class="mb-2 @error('old_password') text-danger fw-bold @enderror">Old Password:</div>
                                    <input type="text" name="old_password" value="{{ old('old_password') }}" class="form-control @error('old_password') text-danger is-invalid @enderror">
                                    @error('old_password')
                                        <small class="text-danger">{!! $message !!}</small>
                                    @enderror
                                    @if (Session::has('error'))
                                        <small class="text-danger">{!! Session::get('error') !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="mb-3">
                                    <div class="mb-2 @error('new_password') text-danger fw-bold @enderror">New Password:</div>
                                    <input class="form-control @error('new_password') text-danger is-invalid @enderror" name="new_password" value="{{ old('new_password') }}">
                                    @error('new_password')
                                        <small class="text-danger">{!! $message !!}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="mb-3">
                                    <div class="mb-2 @error('new_password_confirmation') text-danger fw-bold @enderror">New Password:</div>
                                    <input class="form-control @error('new_password_confirmation') text-danger is-invalid @enderror" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}">
                                    @error('new_password_confirmation')
                                        <small class="text-danger">{!! $message !!}</small>
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
