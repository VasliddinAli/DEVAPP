@extends('main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Comments</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Comments</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end"><a href="/add_comment" class="btn btn-primary">Add comment</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Job</th>
                                    <th>Comment</th>
                                    <th>Image</th>
                                    <th>BTNS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->job }}</td>
                                    <td>{{ $item->comment }}</td>
                                    <td><img src="{{ $item->image }}" width="50px"></td>
                                    <td class="d-flex">
                                        <a href="{{ route('edit_comment', $item->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{ route('delete_comment', $item->id, $item->image) }}" class="btn btn-danger ml-2" onclick="return confirm('Are you delete? {{ $item->name }}')"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Job</th>
                                    <th>Comment</th>
                                    <th>Image</th>
                                    <th>BTNS</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection