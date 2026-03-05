@extends('layouts.dashboard.app')

@section('title')
    {!! $title !!}
@endsection

@push('css')
    <link rel="stylesheet" href="{!! asset('assets/dashboard/vendors/select2/select2.min.css') !!}">
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
                                    <a href="{{ route('dashboard.tickets.index') }}">{!! __('tickets.tickets') !!}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{!! __('tickets.update_ticket') !!}</li>
                            </ol>
                        </nav>
                        <div class="btn-wrapper">
                            <a href="{{ route('dashboard.tickets.index') }}"
                                class="btn btn-outline-dark btn-sm me-0 custom-shadow-sm">
                                <i class="mdi mdi-arrow-left"></i> {!! __('general.back') !!}
                            </a>
                        </div>
                    </div>
                    <!--------------------  End Breadcrumb  ---------------------------->

                    <div class="row">
                        <div class="col-md-12">
                            <form id="updateTicketForm" action="{!! route('dashboard.tickets.update', $ticket->id) !!}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $ticket->id }}">

                                <div class="card card-rounded card-settings-premium">
                                    <div class="card-body">
                                        <h4 class="card-title card-title-dash mb-4">
                                            <i class="mdi mdi-pencil-circle-outline text-primary me-2"></i>
                                            {!! __('tickets.update_ticket') !!}
                                        </h4>

                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3 theme-primary">
                                                    <label class="form-label-premium" for="title_ar">{!! __('tickets.title_ar') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-translate"></i></span>
                                                        <input type="text" id="title_ar" name="title[ar]"
                                                            class="form-control"
                                                            value="{{ old('title.ar', $ticket->getTranslation('title', 'ar')) }}"
                                                            placeholder="{!! __('tickets.enter_title_ar') !!}">
                                                    </div>
                                                    <strong id="title_ar_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3 theme-primary">
                                                    <label class="form-label-premium"
                                                        for="title_en">{!! __('tickets.title_en') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-alpha-e-box-outline"></i></span>
                                                        <input type="text" id="title_en" name="title[en]"
                                                            class="form-control"
                                                            value="{{ old('title.en', $ticket->getTranslation('title', 'en')) }}"
                                                            placeholder="{!! __('tickets.enter_title_en') !!}">
                                                    </div>
                                                    <strong id="title_en_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3 theme-info">
                                                    <label class="form-label-premium"
                                                        for="details_ar">{!! __('tickets.details_ar') !!} <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <textarea id="details_ar" name="details[ar]" rows="4" class="form-control" placeholder="{!! __('tickets.enter_details_ar') !!}">{!! old('details.ar', $ticket->getTranslation('details', 'ar')) !!}</textarea>
                                                    </div>
                                                    <strong id="details_ar_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3 theme-info">
                                                    <label class="form-label-premium"
                                                        for="details_en">{!! __('tickets.details_en') !!} <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <textarea id="details_en" name="details[en]" rows="4" class="form-control" placeholder="{!! __('tickets.enter_details_en') !!}">{!! old('details.en', $ticket->getTranslation('details', 'en')) !!}</textarea>
                                                    </div>
                                                    <strong id="details_en_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group mb-3 theme-success">
                                                    <label class="form-label-premium"
                                                        for="price">{!! __('tickets.price') !!} <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-currency-usd"></i></span>
                                                        <input type="number" step="0.01" id="price"
                                                            name="price" class="form-control"
                                                            value="{!! old('price', $ticket->price) !!}"
                                                            placeholder="{!! __('tickets.enter_price') !!}">
                                                    </div>
                                                    <strong id="price_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <div class="col-md-6 theme-primary">
                                                <div class="form-group mb-3">
                                                    <label class="form-label-premium"
                                                        for="from_country_id">{!! __('tickets.from_country_id') !!} <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-premium select2-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-map-marker-radius"></i></span>
                                                        <select class="form-control from_country_id_select"
                                                            id="from_country_id" name="from_country_id"
                                                            style="width: 100%">
                                                            @if ($ticket->from_country_id && isset($countries))
                                                                @foreach ($countries as $country)
                                                                    <option value="{{ $country->id }}"
                                                                        data-flag-code="{{ $country->flag_code }}"
                                                                        {{ $ticket->from_country_id == $country->id ? 'selected' : '' }}>
                                                                        {{ $country->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <strong id="from_country_id_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6 theme-primary">
                                                <div class="form-group mb-3">
                                                    <label class="form-label-premium"
                                                        for="from_city_id">{!! __('tickets.from_city_id') !!} <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-premium select2-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-city-variant-outline"></i></span>
                                                        <select class="form-control from_city_id_select" id="from_city_id"
                                                            name="from_city_id" style="width: 100%">
                                                            @if ($ticket->from_city_id && isset($cities))
                                                                @foreach ($cities as $city)
                                                                    <option value="{{ $city->id }}"
                                                                        {{ $ticket->from_city_id == $city->id ? 'selected' : '' }}>
                                                                        {{ $city->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <strong id="from_city_id_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <div class="col-md-6 theme-info">
                                                <div class="form-group mb-3">
                                                    <label class="form-label-premium"
                                                        for="to_country_id">{!! __('tickets.to_country_id') !!} <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-premium select2-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-map-marker"></i></span>
                                                        <select class="form-control to_country_id_select"
                                                            id="to_country_id" name="to_country_id" style="width: 100%">
                                                            @if ($ticket->to_country_id && isset($countries))
                                                                @foreach ($countries as $country)
                                                                    <option value="{{ $country->id }}"
                                                                        data-flag-code="{{ $country->flag_code }}"
                                                                        {{ $ticket->to_country_id == $country->id ? 'selected' : '' }}>
                                                                        {{ $country->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <strong id="to_country_id_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6 theme-info">
                                                <div class="form-group mb-3">
                                                    <label class="form-label-premium"
                                                        for="to_city_id">{!! __('tickets.to_city_id') !!} <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-premium select2-premium">
                                                        <span class="input-group-text"><i class="mdi mdi-city"></i></span>
                                                        <select class="form-control to_city_id_select" id="to_city_id"
                                                            name="to_city_id" style="width: 100%">
                                                            @if ($ticket->to_city_id && isset($cities))
                                                                @foreach ($cities as $city)
                                                                    <option value="{{ $city->id }}"
                                                                        {{ $ticket->to_city_id == $city->id ? 'selected' : '' }}>
                                                                        {{ $city->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <strong id="to_city_id_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <x-dashboard.file-input name="photo" id="ticket_photo_input"
                                                    label="{!! __('tickets.photo') !!}" placeholderIcon="mdi-image-outline"
                                                    currentImageUrl="{{ $ticket->photo ? asset('uploads/tickets/' . $ticket->photo) : null }}"
                                                    isRequired="false" errorId="photo_error" />
                                            </div>

                                            <div class="col-md-12 mt-3 theme-warning">
                                                <label class="form-label-premium">{!! __('tickets.status') !!} <span
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
                                                            id="status_active_edit" value="1"
                                                            {{ $ticket->status == 1 ? 'checked' : '' }}>
                                                    </div>
                                                </div>
                                                <strong id="status_error" class="text-danger small"></strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <x-dashboard.command-hud formId="updateTicketForm" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{!! asset('assets/dashboard/vendors/select2/select2.min.js') !!}"></script>

    <script>
        $(document).ready(function() {
            var countryPath = "{{ route('dashboard.addresses.countries.autocomplete.country') }}";
            var cityPath = "{{ route('dashboard.addresses.cities.autocomplete.city') }}";

            // 1. Initialize Autocomplete for Countries
            window.initSelect2Autocomplete(".from_country_id_select, .to_country_id_select", {
                url: "{{ route('dashboard.addresses.countries.autocomplete.country') }}",
                showFlag: true
            });

            // 2. Initialize Autocomplete for Cities with Dependencies
            window.initSelect2Autocomplete(".from_city_id_select", {
                url: "{{ route('dashboard.addresses.cities.autocomplete.city') }}",
                dependencySelector: ".from_country_id_select"
            });

            window.initSelect2Autocomplete(".to_city_id_select", {
                url: "{{ route('dashboard.addresses.cities.autocomplete.city') }}",
                dependencySelector: ".to_country_id_select"
            });

            // Initialize Floating Command HUD
            initHud('updateTicketForm');

            // --- Generic Form Handler ---
            window.handleFormSubmit('#updateTicketForm', {
                successMessage: "{!! __('general.update_success_message') !!}",
                resetForm: false,
                onSuccess: function() {
                    if (window.activeHud) window.activeHud.changedFields.clear();
                    setTimeout(function() {
                        window.location.href = "{!! route('dashboard.tickets.index') !!}";
                    }, 1500);
                }
            });


        });
    </script>
@endpush
