@extends('main')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/projects">Projects</a></li>
                        <li class="breadcrumb-item active">Add Project</li>
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
                        <h3 class="card-title">Add Project</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('add_project') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputName">Project Name</label>
                                <input type="text" name="name" id="inputName" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="category">Project Category</label>
                                <select name="category" id="category" class="form-select form-control" aria-label="Default select example" required>
                                    <option selected disabled></option>
                                    <option value="Mobil_ilova">Mobil applications</option>
                                    <option value="Veb_sayt">Web development</option>
                                    <option value="Telegram_bot">Telegram botlar</option>
                                    <option value="Boshqa">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="link">Project link</label>
                                <input type="text" name="link" id="link" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Project image</label>
                                <input type="file" class="form-control" name="image" id="image" class="form-control" required>
                            </div>
                            <input type="hidden" name="user_id" class="form-control" value="1">
                            <div class="row">
                                <div class="col-12">
                                    <a href="#" class="btn btn-secondary">Cancel</a>
                                    <input type="submit" value="Create new Project" class="btn btn-success float-right">
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