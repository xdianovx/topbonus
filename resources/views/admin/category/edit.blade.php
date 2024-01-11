@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Edit Category {{ $category->title }}</h4>
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
                                    <form action="{{ route('admin.categories.update', $category->slug) }}" method="POST" enctype="multipart/form-data">
                                        @csrf 
                                        @method('patch')
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Title</label>
                                                    <input type="text" value="{{ $category->title }}" class="form-control"
                                                        id="valueInput" name="title" placeholder="Enter text">
                                                </div>

                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Slug</label>
                                                    <input type="text" value="{{ $category->slug }}" class="form-control"
                                                        id="valueInput" name="slug" placeholder="Enter text">
                                                </div>

                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                
                                                <div>
                                                    @if (!empty($category->image))
                                                    <div class="input-group">
                                                        <img src="{{ Storage::url($category->image) }}" class="img-fluid">
                                                    </div>
                                                @else
                                                @endif
                                                    <label for="formFile" class="form-label">Image</label>
                                                    <input class="form-control" type="file" id="formFile" name="image">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-message">Описание *</label>
                                                <textarea id="basic-default-message" class="form-control" name="description" placeholder="Текст" style="height: 234px;"
                                                    required>{{ $category->description }}</textarea>
                                          
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
