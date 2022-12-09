@extends('layouts.app')
@section('title')
    CV
@endsection
@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(function () {
        $('textarea[name=description]').summernote({height: 200});

        $('input[name=filename]').change(function() {
            imagePreview(this);
        });

        function imagePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#filename').removeClass("d-none");
                    $('#filename').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    });
</script>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('CV') }}</div>
                    <div class="card-body">
                        <form action="{{ route('backend.manage.cv.process') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <span class="badge bg-warning">
                                {{ $cv->filename }}
                            </span>
                            <div class="mt-3 mb-3">
                                <label for="filename" class="form-label">
                                    Filename <strong class="text-danger">*</strong>
                                </label>
                                <input type="file" class="form-control @error('filename') is-invalid @enderror" name="filename" id="filename">
                                @error('filename')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button class="btn btn-dark">Upload <i class="fas fa-file-upload ps-1"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
