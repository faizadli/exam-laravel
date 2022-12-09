@extends('layouts.app')
@section('title')
    Contact
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
                <div class="card-header">{{ __('Contact') }}</div>
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>Success!</strong> {!! Session::get('success') !!}
                            <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <table class="table table-hover table-stripped">
                        <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Message</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <th>{{ $contact->id }}</th>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primary"><i class="fas fa-search pe-1"></i> Show</a>
                                        <a href="" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt pe-1"></i> Edit</a>
                                        <form action="" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt pe-1"> Destroy</i>
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


@endsection


