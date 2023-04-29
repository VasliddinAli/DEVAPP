@extends('main')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Comment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboaard">Comments</a></li>
                        <li class="breadcrumb-item active">Add Comment</li>
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
                        <h3 class="card-title">Add Comment</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('add_comment') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Comment Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="job">Comment Job</label>
                                <input type="text" name="job" id="job" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="comment">Comment Comment</label>
                                <textarea type="text" name="comment" id="comment" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Comment image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                            <input type="hidden" name="user_id" class="form-control" value="1">
                            <div class="row">
                                <div class="col-12">
                                    <a href="/comments" class="btn btn-secondary">Cancel</a>
                                    <input type="submit" value="Create new Comment" class="btn btn-success float-right">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection