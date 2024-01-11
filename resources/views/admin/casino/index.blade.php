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


                                    <a href="{{ route('admin.casinos.create') }}" class="btn btn-primary addMembers-modal">
                                        <i class="ri-add-fill me-1 align-bottom"></i>
                                        Add Casino
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">

                    <div class="card-body">
                        <div class="live-preview">
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 80px;">ID</th>
                                            <th scope="col" style="width: 80px;">Logo</th>
                                            <th scope="col">Title</th>
                                            <th scope="col" style="width: 150px;">Updated</th>
                                            <th scope="col" style="width: 150px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($casinos as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    <img src="{{ asset('images/' . $item->logo) }}"
                                                        class="rounded avatar-sm">
                                                </td>
                                                <td><a href="#">{{ $item->title }}</a></td>
                                                <td>{{ $item->updated_at->diffForHumans() }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-primary ">
                                                        <i data-feather="edit"></i> </button>
                                                    <button type="button" class="btn btn-sm fs-6 text btn-danger"><i
                                                            data-feather="trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>


                                </table>
          
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
