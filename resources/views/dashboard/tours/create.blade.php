@extends('layouts.dashboard.app')

@section('title')
    {!! $title !!}
@endsection

@push('css')
    <link rel="stylesheet" href="{!! asset('assets/dashboard/vendors/select2/select2.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/dashboard/vendors/summernote/summernote-lite.min.css') !!}">
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <!--------------------  Start Breadcrumb  ---------------------------->
                    <div class="d-md-flex align-items-center justify-content-between border-bottom mb-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.index') }}">{!! __('dashboard.dashboard') !!}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.tours.index') }}">{!! __('tours.tours') !!}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{!! __('tours.create_new_tour') !!}</li>
                            </ol>
                        </nav>
                    </div>
                    <!--------------------  End Breadcrumb  ---------------------------->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <h4 class="card-title mb-4 d-flex align-items-center">

                                        <i class="mdi mdi-plus-circle-outline text-primary me-2"></i>

                                        {!! __('tours.create_new_tour') !!}
                                    </h4>

                                    <form id="createTourForm" action="{!! route('dashboard.tours.store') !!}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3 theme-primary">
                                                    <label class="form-label-premium" for="name_ar">{!! __('tours.name_ar') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-translate"></i></span>
                                                        <input type="text" id="name_ar" name="name[ar]"
                                                            class="form-control" placeholder="{!! __('tours.enter_name_ar') !!}">
                                                    </div>
                                                    <strong id="name_ar_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3 theme-primary">
                                                    <label class="form-label-premium"
                                                        for="name_en">{!! __('tours.name_en') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-alpha-n-box-outline"></i></span>
                                                        <input type="text" id="name_en" name="name[en]"
                                                            class="form-control" placeholder="{!! __('tours.enter_name_en') !!}">
                                                    </div>
                                                    <strong id="name_en_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3 theme-info">
                                                    <label class="form-label-premium"
                                                        for="title_ar">{!! __('tours.title_ar') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-format-title"></i></span>
                                                        <input type="text" id="title_ar" name="title[ar]"
                                                            class="form-control" placeholder="{!! __('tours.enter_title_ar') !!}">
                                                    </div>
                                                    <strong id="title_ar_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3 theme-info">
                                                    <label class="form-label-premium"
                                                        for="title_en">{!! __('tours.title_en') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-alpha-t-box-outline"></i></span>
                                                        <input type="text" id="title_en" name="title[en]"
                                                            class="form-control" placeholder="{!! __('tours.enter_title_en') !!}">
                                                    </div>
                                                    <strong id="title_en_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3 theme-info">
                                                    <label class="form-label-premium"
                                                        for="details_ar">{!! __('tours.details_ar') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <textarea id="details_ar" name="details[ar]" class="form-control summernote"></textarea>
                                                    </div>
                                                    <strong id="details_ar_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3 theme-info">
                                                    <label class="form-label-premium"
                                                        for="details_en">{!! __('tours.details_en') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <textarea id="details_en" name="details[en]" class="form-control summernote"></textarea>
                                                    </div>
                                                    <strong id="details_en_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group mb-3 theme-success">
                                                    <label class="form-label-premium"
                                                        for="price">{!! __('tours.price') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-currency-usd"></i></span>
                                                        <input type="number" step="0.01" id="price"
                                                            name="price" class="form-control"
                                                            placeholder="{!! __('tours.enter_price') !!}">
                                                    </div>
                                                    <strong id="price_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <div class="col-md-4 theme-primary">
                                                <div class="form-group mb-3">
                                                    <label class="form-label-premium"
                                                        for="country_id">{!! __('tours.country_id') !!} <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-map-marker-radius"></i></span>
                                                        <select class="form-control country_id_select"
                                                            id="tour_country_id" name="country_id" style="width: 100%">
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                    <strong id="country_id_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <div class="col-md-4 theme-primary">
                                                <div class="form-group mb-3">
                                                    <label class="form-label-premium"
                                                        for="city_id">{!! __('tours.city_id') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-city-variant-outline"></i></span>
                                                        <select class="form-control city_id_select" id="tour_city_id"
                                                            name="city_id" style="width: 100%">
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                    <strong id="city_id_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3 theme-primary">
                                                    <label class="form-label-premium"
                                                        for="tour_guide_name_ar">{!! __('tours.tour_guide_name_ar') !!} <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-account-star"></i></span>
                                                        <input type="text" id="tour_guide_name_ar"
                                                            name="tour_guide_name[ar]" class="form-control"
                                                            placeholder="{!! __('tours.enter_tour_guide_name_ar') !!}">
                                                    </div>
                                                    <strong id="tour_guide_name_ar_error"
                                                        class="text-danger small"></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3 theme-primary">
                                                    <label class="form-label-premium"
                                                        for="tour_guide_name_en">{!! __('tours.tour_guide_name_en') !!} <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-account-star-outline"></i></span>
                                                        <input type="text" id="tour_guide_name_en"
                                                            name="tour_guide_name[en]" class="form-control"
                                                            placeholder="{!! __('tours.enter_tour_guide_name_en') !!}">
                                                    </div>
                                                    <strong id="tour_guide_name_en_error"
                                                        class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <x-dashboard.file-input name="photo" id="tour_photo_input"
                                                    label="{!! __('tours.photo') !!}" placeholderIcon="mdi-image-outline"
                                                    isRequired="false" errorId="photo_error" />
                                            </div>

                                            <div class="col-md-12 mt-3 theme-warning">
                                                <label class="form-label-premium">{!! __('tours.status') !!} <span
                                                        class="text-danger">*</span></label>
                                                <div
                                                    class="input-group-premium p-3 d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <i class="mdi mdi-power me-2 text-warning fs-4"></i>
                                                        <span
                                                            class="text-dark fw-medium small">{{ __('general.active') }}</span>
                                                    </div>
                                                    <div class="form-check form-switch mb-0">
                                                        <input type="hidden" name="status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="status"
                                                            id="status_active_create" value="1" checked>
                                                    </div>
                                                </div>
                                                <strong id="status_error" class="text-danger small"></strong>
                                            </div>
                                        </div>
                                        <x-dashboard.command-hud formId="createTourForm" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{!! asset('assets/dashboard/vendors/select2/select2.min.js') !!}"></script>
    <script src="{!! asset('assets/dashboard/vendors/summernote/summernote-lite.min.js') !!}"></script>

    <script>
        $(document).ready(function() {
            // Initialize Summernote
            $('.summernote').summernote({
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            // Initialize Autocomplete for Countries
            window.initSelect2Autocomplete(".country_id_select", {
                url: "{{ route('dashboard.addresses.countries.autocomplete.country') }}",
                showFlag: true
            });

            // Initialize Autocomplete for Cities
            window.initSelect2Autocomplete(".city_id_select", {
                url: "{{ route('dashboard.addresses.cities.autocomplete.city') }}",
                dependencySelector: ".country_id_select"
            });

            // Initialize Floating Command HUD
            initHud('createTourForm');

            // Handle Form Submission
            window.handleFormSubmit('#createTourForm', {
                successMessage: "{!! __('general.add_success_message') !!}",
                resetForm: false,
                onSuccess: function() {
                    if (window.activeHud) window.activeHud.changedFields.clear();
                    setTimeout(function() {
                        window.location.href = "{!! route('dashboard.tours.index') !!}";
                    }, 1500);
                }
            });
        });
    </script>
@endpush
