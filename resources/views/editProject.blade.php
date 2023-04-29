@extends('main')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/projects">Products</a></li>
                        <li class="breadcrumb-item active">Project Edit</li>
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
                        <form method="post" action="{{ route('update_project', $item->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputName">Project Name</label>
                                <input type="text" name="name" id="inputName" class="form-control" value="{{ $item->name }}">
                            </div>
                            <div class="form-group">
                                <label for="category">Project Category</label>
                                <select name="category" id="category" class="form-select form-control" aria-label="Default select example" required>
                                    <option value="{{ $item->category }}" selected>Default</option>
                                    <option value="Mobil_ilova">Mobil application</option>
                                    <option value="Veb_sayt">Web development</option>
                                    <option value="Telegram_bot">Telegram bot</option>
                                    <option value="Boshqa">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" id="link" class="form-control" value="{{ $item->link }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Project image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="/projects" class="btn btn-secondary">Cancel</a>
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
                        <img src="{{ asset($item->image) }}" alt="{{ $item->image }}" width="400px">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection