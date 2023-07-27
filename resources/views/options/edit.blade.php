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

                         <!-- end page title end breadcrumb -->
            <form action="{{ route('admin.options.update', $option->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="key">Key</label>
                                <select name="key" id="key"class="select2 form-select">
                                    <option value="address_uz" @if($option->key == 'address_uz') selected @endif>Address UZ</option>
                                    <option value="address_ru" @if($option->key == 'address_ru') selected @endif>Address RU</option>
                                    <option value="address_en" @if($option->key == 'address_en') selected @endif>Address EN</option>
                                    <option value="lanrdmarks_uz" @if($option->key == 'lanrdmarks_uz') selected @endif>Lanrdmarks UZ</option>
                                    <option value="lanrdmarks_ru" @if($option->key == 'lanrdmarks_ru') selected @endif>Lanrdmarks RU</option>
                                    <option value="lanrdmarks_en" @if($option->key == 'lanrdmarks_en') selected @endif>Lanrdmarks EN</option>
                                    <option value="phone" @if($option->key == 'phone') selected @endif>Phone</option>
                                    <option value="fax" @if($option->key == 'fax') selected @endif>Fax</option>
                                    <option value="email" @if($option->key == 'email') selected @endif>E-mail</option>
                                    <option value="map" @if($option->key == 'map') selected @endif>Google or Yandex MAP</option>
                                    <option value="instagram" @if($option->key == 'instagram') selected @endif>Instagram</option>
                                    <option value="facebook" @if($option->key == 'facebook') selected @endif>Facebook</option>
                                    <option value="youtube" @if($option->key == 'youtube') selected @endif>Youtube</option>
                                </select>
                                @if($errors->has('key'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $errors->first('key') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <label for="title_ru">Value</label>
                                <input type="text" id="value" class="form-control" name="value" value="{{ $option->value }}">
                                @if($errors->has('value'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $errors->first('value') }}
                                    </div>
                                @endif
                            </div>

                        </div><br><samp></samp>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-block">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
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
