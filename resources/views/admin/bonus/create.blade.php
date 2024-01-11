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
                                <h4 class="card-title mb-0 flex-grow-1">New Bonus</h4>
                            </div>

                            <div class="card-body">
                                <div class="live-preview">
                                    <form action="{{ route('admin.bonus_cards.store') }}" method="POST">
                                        @csrf
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Free Spins</label>
                                                    <input type="text" class="form-control" id="valueInput"
                                                        name="free_spins" >
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Title *</label>
                                                    <input type="text" class="form-control" id="valueInput"
                                                        name="title">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Slug *</label>
                                                    <input type="text" class="form-control" id="valueInput"
                                                        name="slug">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Bonus Code *</label>
                                                    <input type="text" class="form-control" id="valueInput"
                                                        name="bonus_code">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Wagering *</label>
                                                    <input type="text" class="form-control" id="valueInput"
                                                        name="wagering">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Refferal Link *</label>
                                                    <input type="text" class="form-control" id="valueInput"
                                                        name="refferal_link">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="exampleInputdate" class="form-label">Expired Date *</label>
                                                    <input type="date" class="form-control" id="exampleInputdate"
                                                        name="expired_date">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="valueInput" class="form-label">Casino</label>
                                                <select type="text" class="form-control" name="casino_id" id="valueInput">
                                                    @foreach ($casinos as $item)
                                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="valueInput" class="form-label">Country</label>
                                                <select type="text" class="form-control" name="country_id" id="valueInput">
                                                    @foreach ($countries as $item)
                                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="valueInput" class="form-label">Bonus Type</label>
                                                <select type="text" class="form-control" name="bonus_type_id" id="valueInput">
                                                    @foreach ($bonus_types as $item)
                                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <label for="valueInput" class="form-label">Game</label>
                                                <select type="text" class="form-control" name="game_id" id="valueInput">
                                                    @foreach ($games as $item)
                                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p class="text-muted">Description</p>
                                                        <div class="snow-editor" style="height: 300px;">
                                                            <input type="textarea" class="form-control" id="valueInput"
                                                                name="description" placeholder="Enter text">
                                                        </div> <!-- end Snow-editor-->
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->

                                            </div>
                                            <!-- end col -->
                                        </div>

                                        <button type="submit"
                                            class="btn btn-success waves-effect waves-light mt-5">Create</button>
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
