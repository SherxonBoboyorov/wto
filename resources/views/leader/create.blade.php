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
                        <form action="{{ route('admin.leaders.store') }}" enctype="multipart/form-data"
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
                                <label class="form-label" for="name_uz">Name Uz</label>

                                <input type="text" id="name_uz" name="name_uz" class="form-control"
                                    placeholder="Name Uz" aria-label="Name Uz" aria-describedby="name_uz" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Name is required</div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="name_en">Name En</label>

                                <input type="text" id="name_en" class="form-control" placeholder="Name En"
                                    name="name_en" aria-label="Name En" aria-describedby="name_en" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Name is required</div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="name_ru">Name Ru</label>
                                <input type="text" id="name_ru" class="form-control" name="name_ru"
                                    placeholder="Name Ru" aria-label="Name Ru" aria-describedby="name_ru" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Name is required</div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label class="form-label" for="phone">Phone</label>
        
                                        <input type="text" id="phone" class="form-control" placeholder="Phone"
                                            name="phone" aria-label="Phone" aria-describedby="phone" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Phone is required</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" class="form-control" name="email"
                                            placeholder="Email" aria-label="Email" aria-describedby="email" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Name is required</div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label class="form-label" for="position_uz">Position Uz</label>

                                        <input type="text" id="position_uz" name="position_uz" class="form-control"
                                            placeholder="Position Uz" aria-label="Position Uz"
                                            aria-describedby="position_uz" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Position is required</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label class="form-label" for="position_en">Position En</label>

                                        <input type="text" id="position_en" class="form-control"
                                            placeholder="Position En" name="position_en" aria-label="Position En"
                                            aria-describedby="position_en" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Position is required</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label class="form-label" for="position_ru">Position Ru</label>
                                        <input type="text" id="position_ru" class="form-control" name="position_ru"
                                            placeholder="Position Ru" aria-label="Position Ru"
                                            aria-describedby="position_ru" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Position is required</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label class="form-label" for="reception_days_uz">Reception days Uz</label>

                                        <input type="text" id="reception_days_uz" name="reception_days_uz" class="form-control"
                                            placeholder="Reception days Uz" aria-label="Reception days Uz"
                                            aria-describedby="reception_days_uz" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Reception days is required</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label class="form-label" for="reception_days_en">Reception days En</label>

                                        <input type="text" id="reception_days_en" class="form-control"
                                            placeholder="Reception days En" name="reception_days_en" aria-label="Reception days En"
                                            aria-describedby="reception_days_en" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Reception days is required</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label class="form-label" for="reception_days_ru">Reception days Ru</label>
                                        <input type="text" id="reception_days_ru" class="form-control" name="reception_days_ru"
                                            placeholder="Reception days Ru" aria-label="Reception days Ru"
                                            aria-describedby="reception_days_ru" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Reception days is required</div>
                                    </div>
                                </div>
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
                            </div>
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
