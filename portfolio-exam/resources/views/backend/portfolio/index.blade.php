@extends('layouts.app')
@section('title')
    Portfolio
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('javascript')
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('table').DataTable({
            "pageLength" : 50
        });
    });
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Portfolio') }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <strong>Success!</strong> {!! Session::get('success') !!}
                                <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($portfolio as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td><img src="{{ asset('portofolio/'.$item->image) }}" class="img-thumbnail w-50"></td>
                                        <td>{!! $item->description !!}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-primary"><i class="fas fa-search pe-1"></i> Show</a>
                                            <a href="" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt pe-1"></i> Edit</a>
                                            <form action="" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt pe-1"></i>Destroy
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


