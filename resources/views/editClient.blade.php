@extends('main')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Video Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/projects">Video</a></li>
                        <li class="breadcrumb-item active">Video Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('update_client', $client->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="link">Video link</label>
                                <input type="text" name="link" id="link" value="{{ $client->link }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image">Video image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="/clients" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Image View</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset($client->image) }}" alt="{{ $client->image }}" width="400px">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection