@extends('layouts/contentLayoutMaster')

@section('title', 'Photos')

@section('content')
    <!-- Bordered table start -->
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title">List</h4>
                    <a href="{{ route('admin.options.create') }}" class="btn btn-primary">Create</a>
                </div>
                <div class="card-body">
    
                    @if(session('message'))
    
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('message') }}
                    </div>
    
                    @endif
    
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 2%;">#</th>
                                <th>Key</th>
                                <th>Value</th>
                                <th colspan="2" style="width: 2%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($options as $option)
                            <tr>
                                <td>{{ $option->id }}</td>
                                <td>{{ $option->key }}</td>
                                <td>{{ $option->value }}</td>
                                <td>
                                    <a href="{{ route('admin.options.edit', $option->id) }}" class="btn btn-primary btn-icon">
                                        <i class="fa fa-edit">Edit</i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.options.destroy', $option->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-icon">
                                            <i class="fa fa-trash">Delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
