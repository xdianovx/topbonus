@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Edit Certificat {{ $item->title }}</h4>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger alert-border-left alert-dismissible fade show " role="alert">

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

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
                        <form action="{{ route('admin.certificates.update', $item->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">Title *</label>
                                        <input type="text" value="{{ $item->title }}" class="form-control"
                                            id="valueInput" name="title" placeholder="Enter text">
                                    </div>

                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">Link *</label>
                                        <input type="text" value="{{ $item->link }}" class="form-control"
                                            id="valueInput" name="link" placeholder="Enter text">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        @if (!empty($item->logo))
                                            <div class="input-group">
                                                <img src="{{ Storage::url($item->logo) }}" class="img-fluid">
                                            </div>
                                        @else
                                        @endif
                                        <label for="formFile" class="form-label">Logo</label>
                                        <input class="form-control" type="file" id="formFile" name="logo">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Description *</label>
                                    <textarea id="basic-default-message" class="form-control ckeditor-classic" name="description" placeholder="Text"
                                        style="height: 234px;">{!! $item->description !!}</textarea>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light mt-5">Save</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
