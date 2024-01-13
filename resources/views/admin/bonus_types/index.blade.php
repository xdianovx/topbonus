@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-sm-4">
                                <div class="search-box">
                                    <form class="d-flex" action="{{ route('admin.bonus_types.search') }}" method="get">
                                        @csrf
                                        <input class="form-control me-2" type="search" name="search" placeholder="Search"
                                            aria-label="Search">
                                        <button class="btn btn-outline-primary" type="submit">Search</button>
                                    </form>
                                    {{-- <input type="text" class="form-control" id="searchMemberList"
                                        placeholder="Search casino">
                                    <i class="ri-search-line search-icon"></i> --}}
                                </div>
                            </div>

                            <div class="col-sm-auto ms-auto">
                                <div class="list-grid-nav hstack gap-1">



                                    <a href="{{ route('admin.bonus_types.create') }}"
                                        class="btn btn-success addMembers-modal">
                                        <i class="ri-add-fill me-1 align-bottom"></i>
                                        Add Bonus Type
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="demo-inline-spacing">
                                @if (session('status') === 'item-updated')
                                    <div class="alert alert-primary alert-dismissible" role="alert">
                                        {{ __('Updated successfully.') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session('status') === 'item-created')
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        {{ __('Created successfully.') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session('status') === 'item-deleted')
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        {{ __('Deleted successfully.') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="table-responsive table-card">
                                        <table class="table align-middle table-nowrap mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" style="width: 80px;">ID</th>
w                                                    <th scope="col">Title</th>
                                                    <th scope="col" style="width: 150px;">Updated</th>
                                                    <th scope="col" style="width: 150px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($bonus_types as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                    
                                                        <td><a
                                                                href="{{ route('admin.bonus_types.show', $item->slug) }}">{{ $item->title }}</a>
                                                        </td>
                                                        <td>{{ $item->updated_at->diffForHumans() }}</td>
                                                        <td>

                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                                                    <li><a href="{{ route('admin.bonus_types.show', $item->slug) }}"
                                                                            class="dropdown-item"><i
                                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                            View</a></li>
                                                                    <li><a href="{{ route('admin.bonus_types.edit', $item->slug) }}"
                                                                            class="dropdown-item edit-item-btn"><i
                                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                            Edit</a></li>
                                                                    <li>
                                                                        <button type="submit"
                                                                            class="dropdown-item text-danger"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#modalScrollable{{ $item->slug }}"><i
                                                                                class="bx bx-trash me-1 text-danger"
                                                                                role="button"></i>
                                                                            Delete</button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="modalScrollable{{ $item->slug }}"
                                                        tabindex="-1" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalScrollableTitle">Are
                                                                        you sure you want
                                                                        delete?</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p
                                                                        class="mt-1 text-sm text-gray-600 dark:text-gray-400  alert alert-warning text-wrap">
                                                                        {{ __('After deleting an entry, all its resources and data will be permanently deleted !!!') }}
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-outline-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                    <form
                                                                        action="{{ route('admin.bonus_types.destroy', $item->slug) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#modalScrollableConfirm">Confirm</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <tr>
                                                        <td class="text-danger">There are no entries...</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    @if ($bonus_types->links()->paginator->hasPages())
                                        {{ $bonus_types->links() }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
