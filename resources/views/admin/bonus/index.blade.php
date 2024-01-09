@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Casinos</h4>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-sm-4">
                                <div class="search-box">
                                    <input type="text" class="form-control" id="searchMemberList"
                                        placeholder="Search casino">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>

                            <div class="col-sm-auto ms-auto">
                                <div class="list-grid-nav hstack gap-1">


                                    <a href="{{ route('admin.bonus_cards.create') }}" class="btn btn-success addMembers-modal">
                                        <i class="ri-add-fill me-1 align-bottom"></i>
                                        Add Casino
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                @foreach ($bonus_cards as $item)
                    <p>{{ $item->title }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
