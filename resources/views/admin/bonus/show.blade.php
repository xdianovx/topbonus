@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="flex-grow-1">
                                        <h5 class="card-header align-items-center d-flex">Casino: {{ $item->title }}</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false" class="">
                                                <i class="ri-more-2-fill fs-14"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink1" style="">
                                                <li>
                                                    <a type="button" class="dropdown-item" href="{{ url()->previous() }}">
                                                        <i class="ri-arrow-left-line align-bottom me-2 text-muted"></i> Back</a>
                                                </li>

                                                <li><a href="{{ route('admin.casinos.edit', $item->slug) }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                <li>
                                                    <button type="submit" class="dropdown-item text-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalScrollable{{ $item->slug }}"><i
                                                        class="bx bx-trash me-1 text-danger" role="button"></i>
                                                    Delete</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @if (!empty($item->logo))
                                <div class="d-flex mb-4">
                                    <div class="flex-shrink-0">
                                        <img src="{{ Storage::url($item->logo) }}" alt="" height="200" class="rounded">
                                    </div>
                                </div>
                                @else
                                @endif
                            </div>
                            <!--end card-body-->
                        </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-header align-items-center d-flex">Info</h5>
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <th class="ps-0" scope="row">Id:</th>
                                                    <td class="text-muted">{{$item->id}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Title:</th>
                                                    <td class="text-muted">{{ $item->title }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Slug:</th>
                                                    <td class="text-muted">{{$item->slug}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Created At:</th>
                                                    <td class="text-muted">{{$item->created_at}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Updated At:</th>
                                                    <td class="text-muted">{{$item->updated_at}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Description:</th>
                                                    <td class="text-muted">{{$item->description}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Description Footer:</th>
                                                    <td class="text-muted">{{$item->description_footer}}</td>
                                                </tr>
                                                <div class="modal fade" id="modalScrollable{{ $item->slug }}" tabindex="-1"
                                                    style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalScrollableTitle">Are you sure you want
                                                                    delete?</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p
                                                                    class="mt-1 text-sm text-gray-600 dark:text-gray-400  alert alert-warning text-wrap">
                                                                    {{ __('After deleting an entry, all its resources and data will be permanently deleted !!!') }}
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    Close
                                                                </button>
                                                                <form action="{{ route('admin.casinos.destroy', $item->slug) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                                                        data-bs-target="#modalScrollableConfirm">Confirm</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- end card body -->
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Game Types:</h5>
                                    <div class="d-flex flex-wrap gap-2 fs-16">
                                        @forelse ($item->game_types as $game_type)
                                        <a href="{{ route('admin.game_types.show', $game_type->slug) }}" class="badge bg-primary-subtle text-primary">{{$game_type->title}}</a>
                                        @empty
                                        <div class="text-danger">No entries exist...</div>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Countries:</h5>
                                    <div class="d-flex flex-wrap gap-2 fs-16">
                                        @forelse ($item->countries as $country)
                                        <p class="badge bg-success-subtle text-success">{{$country->title}}<i class="flag flag-united-states"></i></i></p>
                                        @empty
                                        <div class="text-danger">No entries exist...</div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
