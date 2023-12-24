@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">New Bonus</h4>
                            </div>

                            <div class="card-body">
                                <div class="live-preview">
                                    <form action="{{ route('admin.bonus.store') }}" method="POST">
                                        @csrf
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="valueInput" class="form-label">Название</label>
                                                    <input type="text" class="form-control" id="valueInput"
                                                        name="title" placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-xxl-6 col-md-6">
                                                <label for="valueInput" class="form-label">Название</label>
                                                <select type="text" class="form-control" name="casino_id" id="valueInput"
                                                    name="title" placeholder="">
                                                    @foreach ($casinos as $item)
                                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <button type="button"
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
