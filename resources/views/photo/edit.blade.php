@extends('layouts/contentLayoutMaster')

@section('title', 'Photos | Edit')

@section('vendor-style')
    {{-- Vendor Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap"
        rel="stylesheet">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">

@endsection
@section('content')
    <!-- Validation -->
    <section class="bs-validation">
        <div class="row">
            <!-- Bootstrap Validation -->
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.photos.update', ['photo' => $photo->id]) }}"
                            enctype="multipart/form-data" class="needs-validation" method="POST" novalidate>
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <div class="mb-1">
                                        <label for="image_file" class="form-label">Image file</label>
                                        <input class="form-control" name="image_file" value="{{ $photo->image_file }}"
                                            type="file" id="image_file" required />
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-4 col-4">
                                    <div class="d-flex mb-1 flex-column">
                                        <label class="form-check-label mb-50" for="status">Delete image</label>
                                        <div class="form-check form-check-danger form-switch">
                                            <input type="checkbox" name="delete_image" value=""
                                                class="form-check-input" id="status" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-4">
                                    <div class="d-flex mb-1 flex-column">
                                        <label class="form-check-label mb-50" for="status">Delete main image</label>
                                        <div class="form-check form-check-danger form-switch">
                                            <input type="checkbox"  name="delete_main_image" value=""
                                                class="form-check-input" id="status" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-4">
                                    <div class="d-flex mb-1 flex-column">
                                        <label class="form-check-label mb-50" for="status">Delete Video file</label>
                                        <div class="form-check form-check-danger form-switch">
                                            <input type="checkbox"  name="delete_video" value=""
                                                class="form-check-input" id="status" />
                                        </div>
                                    </div>  
                                </div>
                            </div> --}}
                            <div class="mb-1">
                                <label class="form-label" for="title_uz">Title Uz</label>

                                <input type="text" id="title_uz" name="title_uz" value="{{ $photo->title_uz }}"
                                    class="form-control" placeholder="Title Uz" aria-label="Title Uz"
                                    aria-describedby="title_uz" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Title is required.</div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="title_en">Title En</label>

                                <input type="text" id="title_en" class="form-control" placeholder="Title En"
                                    name="title_en" value="{{ $photo->title_en }}" aria-label="Title En"
                                    aria-describedby="title_en" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Title is required.</div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="title_ru">Title Ru</label>
                                <input type="text" id="title_ru" class="form-control" name="title_ru"
                                    value="{{ $photo->title_ru }}" placeholder="Title Ru" aria-label="Title Ru"
                                    aria-describedby="title_ru" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Title is required.</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-basic">Gallery</label>
                                    <select class="select2 form-select" name="gallery_id" id="select2-basic">
                                        @foreach ($gallery as $item)
                                            <option @if($item->id==$photo->gallery_id) selected @endif value="{!! $item->id !!}">{{ $item->title_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="order">Order</label>
                                    {{-- <div class="demo-inline-spacing"> --}}
                                        <div class="input-group">
                                            <input id="order" name="order" type="number" aria-label="Order"
                                                aria-describedby="order" class="touchspin" value="{{$photo->order}}" />
                                        </div>
                                    {{-- </div> --}}
                                </div>
                            </div>
                            <!-- Basic -->
                        
                            <div class="d-flex mb-1 flex-column">
                                <label class="form-check-label mb-50" for="status">Status</label>
                                <div class="form-check form-check-success form-switch">
                                    <input type="checkbox" @if($photo->status==1) checked @endif name="status" value="on"
                                        class="form-check-input" id="status" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Bootstrap Validation -->
        </div>
    </section>
    <!-- /Validation -->
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-number-input.js')) }}"></script>
@endsection
