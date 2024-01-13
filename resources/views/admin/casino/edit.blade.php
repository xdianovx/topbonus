@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">New Casino</h4>
                            </div>

                            <div class="card-body">
                                <div class="live-preview">
                                    <form action="{{ route('admin.casino.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Title *</label>
                                                    <input type="text" class="form-control" id="valueInput"
                                                        name="title" placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Logo</label>
                                                    <input type="file" class="form-control" id="valueInput"
                                                        name="logo" placeholder="">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-message">Description</label>
                                                <textarea id="basic-default-message" class="form-control" name="description"
                                                 placeholder="Text" style="height: 234px;">{{$item->description}}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-message">Description Footer</label>
                                                <textarea id="basic-default-message" class="form-control" name="description_footer"
                                                 placeholder="Text" style="height: 234px;">{{$item->description_footer}}</textarea>
                                            </div>
                                            <button type="submit">Добавить</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
