@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="demo-inline-spacing">
                                @if (session('status') === 'category-updated')
                                    <div class="alert alert-primary" role="alert">{{ __('Updated successfully.') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session('status') === 'category-created')
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        {{ __('Created successfully.') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session('status') === 'category-deleted')
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        {{ __('Deleted successfully.') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                                    <th scope="col" style="width: 80px;">Logo</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col" style="width: 150px;">Updated</th>
                                                    <th scope="col" style="width: 150px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($categories as $category)
                                                    <tr>
                                                        <td>{{ $category->id }}</td>
                                                        <td>
                                                                @if (!empty($category->image))
                                                                <div class="input-group">
                                                                    <img src="{{ Storage::url($category->image) }}" class="rounded avatar-sm">
                                                                </div>
                                                            @else
                                                            @endif
                                                        </td>
                                                        <td><a href="#">{{ $category->title }}</a></td>
                                                        <td>{{ $category->updated_at->diffForHumans() }}</td>
                                                        <td>
                                                            
                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                                                    <li><a href="{{ route('admin.categories.show', $category->slug) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                                    <li><a href="{{ route('admin.categories.edit', $category->slug) }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                                    <li>
                                                                        <button type="submit" class="dropdown-item text-danger"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalScrollable{{ $category->slug }}"><i
                                                                            class="bx bx-trash me-1 text-danger" role="button"></i>
                                                                        Delete</button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="modalScrollable{{ $category->slug }}" tabindex="-1"
                                                        style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalScrollableTitle">Вы уверены, что хотите
                                                                        удалить?</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p
                                                                        class="mt-1 text-sm text-gray-600 dark:text-gray-400  alert alert-warning text-wrap">
                                                                        {{ __('После удаления записи все ее ресурсы и данные будут безвозвратно удалены.') }}
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Закрыть
                                                                    </button>
                                                                    <form action="{{ route('admin.categories.destroy', $category->slug) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                                                            data-bs-target="#modalScrollableConfirm">Подтвердить</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @empty
                                                    <tr>
                                                        <td class="text-danger">Записи отсутстувют.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <a href="{{ route('admin.categories.create') }}" class="btn btn-success addMembers-modal">
                    <i class="ri-add-fill me-1 align-bottom"></i>
                    Add Category
                </a>

            @endsection
