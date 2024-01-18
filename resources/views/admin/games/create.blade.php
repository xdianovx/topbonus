@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">New Games</h4>
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
                                    <form action="{{ route('admin.games.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gy-4">

                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Title *</label>
                                                    <input type="text" value="{{ old('title') }}"
                                                        class="form-control input__slug" id="valueInput" name="title"
                                                        placeholder="Enter text">
                                                </div>

                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Slug *</label>
                                                    <input type="text" value="{{ old('slug') }}"
                                                        class="form-control output" id="valueInput" name="slug"
                                                        placeholder="Enter text">
                                                </div>

                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="valueInput" class="form-label">Game Type *</label>
                                                @if (!count($game_types) == 0)
                                                    <select type="text" data-choices class="form-control"
                                                        name="game_type_id" id="valueInput">
                                                        @foreach ($game_types as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $item->id == old('game_type_id') ? 'selected' : '' }}>
                                                                {{ $item->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <div class="text-danger">No entries exist, create an entry in the Game
                                                        Type table
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="formFile" class="form-label">Image</label>
                                                    <input class="form-control" type="file" id="formFile"
                                                        name="image">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-message">Description *</label>
                                                <textarea id="basic-default-message" class="form-control" name="description" placeholder="Text" style="height: 234px;">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-success waves-effect waves-light mt-5">Save</button>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/slug_generator.js') }}"></script>

@endsection
