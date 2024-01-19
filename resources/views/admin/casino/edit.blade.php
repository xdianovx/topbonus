@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Edit Casino {{ $item->title }}</h4>
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
                        <form action="{{ route('admin.casinos.update', $item->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">Title *</label>
                                        <input type="text" value="{{ $item->title }}" class="form-control input__slug"
                                            id="valueInput" name="title" placeholder="Enter text">
                                    </div>

                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">Slug *</label>
                                        <input type="text" value="{{ $item->slug }}" class="form-control output"
                                            id="valueInput" name="slug" placeholder="Enter text">
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
                                <div class="col-xxl-6 col-md-6">
                                    <div class="mb-3">
                                        <label for="valueInput" class="form-label">Countries</label>
                                        @if (!count($countries) == 0)
                                            <select id="valueInput" class="form-control" data-choices
                                                data-choices-removeItem name="countries[]" multiple>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->title }}"
                                                        {{ collect($item->countries)->contains('title', $country->title) ? 'selected' : '' }}>
                                                        {{ $country->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @else
                                            <div class="text-danger">No entries exist, create an entry in the
                                                Countries
                                                table
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div class="mb-3">
                                        <label for="valueInput" class="form-label">Game Types</label>
                                        @if (!count($game_types) == 0)
                                            <select id="valueInput" class="form-control" data-choices
                                                data-choices-removeItem name="game_types[]" multiple>
                                                @foreach ($game_types as $game_type)
                                                    <option value="{{ $game_type->title }}"
                                                        {{ collect($item->game_types)->contains('title', $game_type->title) ? 'selected' : '' }}>
                                                        {{ $game_type->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @else
                                            <div class="text-danger">No entries exist, create an entry in the
                                                Game Types
                                                table
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <label for="valueInput" class="form-label">License *</label>
                                    @if (!count($licenses) == 0)
                                        <select type="text" data-choices class="form-control" name="license_id"
                                            id="valueInput">
                                            @foreach ($licenses as $license)
                                                <option value="{{ $license->title }}"
                                                    {{ $license->id == $item->license_id ? 'selected' : '' }}>
                                                    {{ $license->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <div class="text-danger">No entries exist, create an entry in the Licenses
                                            table
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <label for="valueInput" class="form-label">Certificate *</label>
                                    @if (!count($certificates) == 0)
                                        <select type="text" data-choices class="form-control" name="certificate_id"
                                            id="valueInput">
                                            @foreach ($certificates as $certificate)
                                                <option value="{{ $certificate->title }}"
                                                    {{ $certificate->id == $item->certificate_id ? 'selected' : '' }}>
                                                    {{ $certificate->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <div class="text-danger">No entries exist, create an entry in the Certificates
                                            table
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Description *</label>
                                    <textarea id="basic-default-message" class="form-control" name="description" placeholder="Text" style="height: 234px;">{{ $item->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Description Footer</label>
                                    <textarea id="basic-default-message" class="form-control ckeditor-classic" name="description_footer"
                                        placeholder="Text" style="height: 234px;">{!! $item->description_footer !!}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light mt-5">Save</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/admin/js/slug_generator.js') }}"></script>


@endsection
