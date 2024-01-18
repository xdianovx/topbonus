@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Edit Bonus {{ $item->title }}</h4>
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
                                    <form action="{{ route('admin.bonus_cards.update', $item->slug) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <div class="row gy-4">

                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Title *</label>
                                                    <input type="text" value="{{ $item->title }}"
                                                        class="form-control input__slug" id="valueInput" name="title"
                                                        placeholder="Enter text">
                                                </div>

                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Slug *</label>
                                                    <input type="text" value="{{ $item->slug }}"
                                                        class="form-control output" id="valueInput" name="slug"
                                                        placeholder="Enter text">
                                                </div>

                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Refferal Link *</label>
                                                    <input type="text" value="{{  $item->refferal_link  }}"
                                                        class="form-control" id="valueInput" name="refferal_link"
                                                        placeholder="Enter text">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Max Cash Out *</label>
                                                    <input type="text" value="{{ $item->max_cash_out }}"
                                                        class="form-control" id="valueInput" name="max_cash_out"
                                                        placeholder="Enter text">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Wagering *</label>
                                                    <input type="text" value="{{ $item->wagering }}" class="form-control"
                                                        id="valueInput" name="wagering" placeholder="Enter text">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Bonus Code *</label>
                                                    <input type="text" value="{{ $item->bonus_code }}"
                                                        class="form-control" id="valueInput" name="bonus_code"
                                                        placeholder="Enter text">
                                                </div>
                                            </div>
                                            <!-- Input Date -->
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="exampleInputdate" class="form-label">Expired Date</label>
                                                <input type="date" value="{{ $item->expired_date }}" class="form-control" id="exampleInputdate" name="expired_date">
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Bonus Code *</label>
                                                    <input type="text" value="{{ $item->bonus_code }}" class="form-control"
                                                        id="valueInput" name="bonus_code" placeholder="Enter text">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="valueInput" class="form-label">Bonus Type *</label>
                                                @if (!count($bonus_types) == 0)
                                                    <select type="text" data-choices class="form-control"
                                                        name="bonus_type_id" id="valueInput">
                                                        @foreach ($bonus_types as $bonus_type)
                                                            <option value="{{ $bonus_type->title }}"
                                                                {{ $bonus_type->id == $item->bonus_type->id ? 'selected' : '' }}>
                                                                {{ $bonus_type->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <div class="text-danger">No entries exist, create an entry in the Bonus
                                                        Type table
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="valueInput" class="form-label">Casino *</label>
                                                @if (!count($casinos) == 0)
                                                    <select type="text" data-choices class="form-control"
                                                        name="casino_id" id="valueInput">
                                                        @foreach ($casinos as $casino)
                                                            <option value="{{ $casino->title }}"
                                                                {{ $casino->id == $item->casino->id ? 'selected' : '' }}>
                                                                {{ $casino->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <div class="text-danger">No entries exist, create an entry in the Casino
                                                        table
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="valueInput" class="form-label">Category *</label>
                                                @if (!count($categories) == 0)
                                                    <select type="text" data-choices class="form-control"
                                                        name="category_id" id="valueInput">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->title }}"
                                                                {{ $category->id == $item->category->id ? 'selected' : '' }}>
                                                                {{ $category->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <div class="text-danger">No entries exist, create an entry in the
                                                        Categories
                                                        table
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="mb-3">
                                                    <label for="valueInput" class="form-label">Countries</label>
                                                    @if (!count($countries) == 0)
                                                        <select id="valueInput" class="form-control" data-choices
                                                            data-choices-removeItem name="countries[]" multiple>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->title }}"
                                                                    {{ (collect($item->countries)->contains('title',$country->title)) ? 'selected':'' }}>
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
                                                                    {{ (collect($item->game_types)->contains('title',$game_type->title)) ? 'selected':'' }}>
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
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-message">Description
                                                    *</label>
                                                <textarea id="basic-default-message" class="form-control" name="description" placeholder="Text"
                                                    style="height: 234px;">{{ old('description') }}</textarea>
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
