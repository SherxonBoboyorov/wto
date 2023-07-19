@extends('layouts/contentLayoutMaster')

@section('title', 'Research Category')

@section('content')
    <!-- Bordered table start -->
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List</h4>
                    <a href="{{ route('admin.scientific-research-category.create') }}" class="btn btn-primary">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                {{-- <th>Image</th> --}}
                                <th>Title Uz</th>
                                <th>Title En</th>
                                <th>Title Ru</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            <form id="indexFilter" action="{{ route('admin.exposition-category.index') }}">
                            <tr id="filters" role="row">
                                <th rowspan="1" colspan="1"><input type="text" name="id"  value="{{ request('id') }}" class="form-control form-control-sm"
                                        placeholder="Id"></th>
                                <th rowspan="1" colspan="1"><input type="text" name="title_uz"  value="{{ request('title_uz') }}" class="form-control form-control-sm"
                                        placeholder="Title Uz"></th>
                                <th rowspan="1" colspan="1"><input type="text" name="title_en"  value="{{ request('title_en') }}" class="form-control form-control-sm"
                                        placeholder="Title En"></th>
                                <th rowspan="1" colspan="1"><input type="text" name="title_ru"  value="{{ request('title_ru') }}" class="form-control form-control-sm"
                                        placeholder="Title Ru"></th>
                                <th rowspan="1" colspan="1"></th>
                                <th rowspan="1" colspan="1"></th>
                            </tr>
                            </form>
                        </thead>
                        <tbody>
                            @if (!empty($scientificResearchCategories))
                                @foreach ($scientificResearchCategories as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                       
                                        <td>{{ $item->title_uz }}</td>
                                        <td>{{ $item->title_en }}</td>
                                        <td>{{ $item->title_ru }}</td>

                                        <td><span
                                                class="badge rounded-pill me-1 {{ $item->status == 1 ? 'badge-light-primary' : 'badge-light-danger' }}">{{ $item->status == 1 ? 'Active' : 'Not Active' }}</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                    data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.scientific-research-category.edit', ['scientific_research_category' => $item->id]) }}">
                                                        <i data-feather="edit-2" class="me-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    <a type="button" onclick="setDeleteItem({{ $item->id }})"
                                                        class="btn dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#info">
                                                        <form id="delete{{ $item->id }}"
                                                            action="{{ route('admin.scientific-research-category.destroy', ['scientific_research_category' => $item->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <i data-feather="trash" class="me-50"></i>
                                                        <span>Delete</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                
                            @endif
                        </tbody>
                    </table>

                </div>
                {{ $scientificResearchCategories->links('vendor.pagination.vuexy-admin') }}
            </div>
        </div>
    </div>
    <!-- Bordered table end -->

    <div class="modal fade modal-info text-start" id="info" tabindex="-1" aria-labelledby="confimationModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confimationModal">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="submitDelete()" class="btn btn-info"
                        data-bs-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')

    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/components/components-modals.js')) }}"></script>
    
    <script src="{{ asset(mix('js/scripts/forms/index-filter.js')) }}"></script>

    <script>
        function setDeleteItem(id) {
            $('#confimationModal').attr('activeId', id)
        }

        function submitDelete() {
            $('#delete' + $('#confimationModal').attr('activeId')).submit();
        }
    </script>
@endsection
