@extends('layouts/contentLayoutMaster')

@section('title', 'Create')

@section('vendor-style')
    {{-- Vendor Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
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
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
@endsection
@section('content')
    <!-- Validation -->
    <section class="bs-validation">
        <div class="row">
            <!-- Bootstrap Validation -->
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.team.store') }}" enctype="multipart/form-data"
                            class="needs-validation" method="POST" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <div class="mb-1">
                                        <label for="image_file" class="form-label">Image file</label>
                                        <input class="form-control" name="image_file" type="file" id="image_file"
                                            required />
                                    </div>
                                </div>
                            </div>

							<div class="mb-1">
                                <label class="form-label" for="title_uz">Title Uz</label>

                                <input type="text" id="title_uz" name="title_uz" class="form-control"
                                    placeholder="Title Uz" aria-label="Title Uz" aria-describedby="title_uz" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Title is required</div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="title_en">Title En</label>

                                <input type="text" id="title_en" class="form-control" placeholder="Title En"
                                    name="title_en" aria-label="Title En" aria-describedby="title_en" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Title is required</div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="title_ru">Title Ru</label>
                                <input type="text" id="title_ru" class="form-control" name="title_ru"
                                    placeholder="Title Ru" aria-label="Title Ru" aria-describedby="title_ru" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Title is required</div>
                            </div>

                            <div id="editor_uz_container">
                                <div class="mb-1">
                                    <label class="d-block form-label" for="content_uz">Content Uz</label>
                                    <input type="hidden" name="content_uz" id="content_uz" class="form-control"
                                        placeholder="Content Uz" aria-label="Content Uz" aria-describedby="content_uz" />
                                    <div class="editor">

                                    </div>
                                </div>
                            </div>
                            <div id="editor_en_container">
                                <div class="mb-1">
                                    <label class="d-block form-label" for="content_en">Content En</label>
                                    <input type="hidden" name="content_en" id="content_en" class="form-control"
                                        placeholder="Content En" aria-label="Content En" aria-describedby="content_en" />
                                    <div class="editor">

                                    </div>
                                </div>
                            </div>

                            <div id="editor_ru_container">
                                <div class="mb-1">
                                    <label class="d-block form-label" for="content_ru">Content Ru</label>
                                    <input type="hidden" id="content_ru" name="content_ru" class="form-control"
                                        placeholder="Content Ru" aria-label="Content Ru" aria-describedby="content_ru" />
                                    <div class="editor">

                                    </div>
                                </div>
                            </div><br>

							<div class="mb-1">
                                <label class="d-block form-label" for="biography_uz">Biography Uz</label>
                                <textarea class="form-control" id="biography_uz" name="biography_uz" rows="3" required></textarea>
                            </div>

                            <div class="mb-1">
                                <label class="d-block form-label" for="biography_en">Biography EN</label>
                                <textarea class="form-control" id="biography_en" name="biography_en" rows="3" required></textarea>
                            </div>
                            <div class="mb-1">
                                <label class="d-block form-label" for="biography_ru">Biography  Ru</label>
                                <textarea class="form-control" id="biography_ru" name="biography_ru" rows="3" required></textarea>
                            </div><br><br>



							
							<div class="mb-1">
                                <label class="d-block form-label" for="publication_uz">Publications Uz</label>
                                <textarea class="form-control" id="publication_uz" name="publication_uz" rows="3" required></textarea>
                            </div>

                            <div class="mb-1">
                                <label class="d-block form-label" for="publication_en">Publications EN</label>
                                <textarea class="form-control" id="publication_en" name="publication_en" rows="3" required></textarea>
                            </div>
                            <div class="mb-1">
                                <label class="d-block form-label" for="publication_ru">Publications  Ru</label>
                                <textarea class="form-control" id="publication_ru" name="publication_ru" rows="3" required></textarea>
                            </div><br>

                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-check-label mb-50" for="status">Status</label>
                                    <div class="form-check form-check-success form-switch">
                                        <input type="checkbox" checked name="status" value="on"
                                            class="form-check-input" id="status" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="order">Order</label>
                                    {{-- <div class="demo-inline-spacing"> --}}
                                    <div class="input-group">
                                        <input id="order" name="order" type="number" aria-label="Order"
                                            aria-describedby="order" class="touchspin" value="1" />
                                    </div>
                                    {{-- </div> --}}
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
    <script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>

    <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-quill-editor.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/create-page.js')) }}"></script>

    <script src="{{ asset(mix('js/scripts/forms/form-number-input.js')) }}"></script>

    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection
