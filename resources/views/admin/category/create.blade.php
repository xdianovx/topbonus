@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">New Category</h4>
                            </div>


                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-border-left alert-dismissible fade show " role="alert">

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>

                                @foreach ($errors->all() as $error)
                                    <div>
                                        {{ $error }}
                                    </div>
                                @endforeach
                            </div>
                        @endif


                        <div class="card">
                            <div class="card-body">
                                <div class="live-preview">
                                    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf 
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Title</label>
                                                    <input type="text" value="{{ old('title') }}" class="form-control"
                                                        id="valueInput" name="title" placeholder="Enter text">
                                                </div>

                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Slug</label>
                                                    <input type="text" value="{{ old('slug') }}" class="form-control"
                                                        id="valueInput" name="slug" placeholder="Enter text">
                                                </div>

                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="formFile" class="form-label">Image</label>
                                                    <input class="form-control" type="file" id="formFile" name="image">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <p class="text-muted">Description</p>
                                                            <div class="snow-editor" style="height: 300px;">
                                                                <input type="textarea" class="form-control" id="valueInput"
                                                                    name="description" value="{{ old('description') }}" placeholder="Enter text">
                                                            </div> <!-- end Snow-editor-->
                                                        </div><!-- end card-body -->
                                                    </div><!-- end card -->

                                                </div>
                                                <!-- end col -->
                                            </div>

                                            <button type="submit"
                                                class="btn btn-success waves-effect waves-light mt-5">Добавить</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
