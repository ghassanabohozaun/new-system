@extends('layouts.dashboard.app')

@section('title')
    {{ __('reservations.edit_reservation') }} - {{ $reservation->client_name }}
@endsection

@push('css')
    <link rel="stylesheet" href="{!! asset('assets/dashboard/vendors/select2/select2.min.css') !!}">
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">

                    <!-- Header & Breadcrumb -->
                    <div class="d-md-flex align-items-center justify-content-between border-bottom mb-4 pb-3">
                        <nav aria-label="breadcrumb" class="mb-3 mb-md-0">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.index') }}">{!! __('dashboard.dashboard') !!}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.reservations.index') }}">{!! __('reservations.reservations') !!}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{!! __('reservations.edit_reservation') !!}</li>
                            </ol>
                        </nav>
                        <div class="btn-wrapper">
                            <a href="{{ route('dashboard.reservations.index') }}"
                                class="btn btn-outline-dark btn-sm me-0 custom-shadow-sm">
                                <i class="mdi mdi-arrow-left"></i> {!! __('general.back') !!}
                            </a>
                        </div>
                    </div>

                    <!-- Main Form Card -->
                    <form action="{{ route('dashboard.reservations.update', $reservation->id) }}" method="POST"
                        id="edit_reservation_form">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="reservation_id" value="{{ $reservation->id }}">

                        <div class="row">
                            <!-- Left Column: Core Data -->
                            <div class="col-lg-8 mt-2">
                                <div class="card shadow-sm border-0 mb-4 h-100">
                                    <div class="card-body p-4">
                                        <h4 class="card-title fw-bold mb-4 pb-2 border-bottom text-primary">
                                            <i class="mdi mdi-information-variant me-2"></i>{!! __('reservations.client_info') !!} &
                                            {!! __('reservations.service') !!}
                                        </h4>

                                        <div class="row g-3">
                                            <!-- Service -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="service" class="form-label-premium"><i
                                                            class="mdi mdi-shape-outline me-1 text-primary"></i>{!! __('reservations.service') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-card-bulleted"></i></span>
                                                        <select class="form-select form-control" id="service"
                                                            name="service">
                                                            <option value="">{!! __('general.select') !!}</option>
                                                            <option value="flight"
                                                                {{ $reservation->service == 'flight' ? 'selected' : '' }}>
                                                                {!! __('reservations.flight') !!}</option>
                                                            <option value="tour"
                                                                {{ $reservation->service == 'tour' ? 'selected' : '' }}>
                                                                {!! __('reservations.tour') !!}</option>
                                                            <option value="ticket"
                                                                {{ $reservation->service == 'ticket' ? 'selected' : '' }}>
                                                                {!! __('reservations.ticket') !!}</option>
                                                        </select>
                                                    </div>
                                                    <strong id="service_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <!-- Nationality -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nationality" class="form-label-premium"><i
                                                            class="mdi mdi-earth me-1 text-primary"></i>{!! __('reservations.nationality') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group input-group-premium">
                                                        <span class="input-group-text"><i class="mdi mdi-flag"></i></span>
                                                        <input type="text" id="nationality" name="nationality"
                                                            class="form-control" value="{{ $reservation->nationality }}"
                                                            placeholder="{!! __('reservations.nationality') !!}">
                                                    </div>
                                                    <strong id="nationality_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <h5 class="fw-bold mb-3 pb-2 border-bottom text-secondary"><i
                                                        class="mdi mdi-account-group me-2"></i>{!! __('reservations.client_info') !!}</h5>
                                            </div>

                                            <!-- Client Name -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="client_name" class="form-label-premium"><i
                                                            class="mdi mdi-account me-1 text-primary"></i>{!! __('reservations.client_name') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-format-title"></i></span>
                                                        <input type="text" id="client_name" name="client_name"
                                                            class="form-control" value="{{ $reservation->client_name }}"
                                                            placeholder="{!! __('reservations.client_name') !!}">
                                                    </div>
                                                    <strong id="client_name_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <!-- Passport Number -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="client_passport_number" class="form-label-premium"><i
                                                            class="mdi mdi-card-account-details me-1 text-primary"></i>{!! __('reservations.client_passport_number') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-passport"></i></span>
                                                        <input type="text" id="client_passport_number"
                                                            name="client_passport_number" class="form-control"
                                                            value="{{ $reservation->client_passport_number }}"
                                                            placeholder="{!! __('reservations.client_passport_number') !!}">
                                                    </div>
                                                    <strong id="client_passport_number_error"
                                                        class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <!-- Client Mobile -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="client_mobile" class="form-label-premium"><i
                                                            class="mdi mdi-phone me-1 text-primary"></i>{!! __('reservations.client_mobile') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-dialpad"></i></span>
                                                        <input type="text" id="client_mobile" name="client_mobile"
                                                            class="form-control"
                                                            value="{{ $reservation->client_mobile }}"
                                                            placeholder="{!! __('reservations.client_mobile') !!}">
                                                    </div>
                                                    <strong id="client_mobile_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <!-- Client Email -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="client_email" class="form-label-premium"><i
                                                            class="mdi mdi-email me-1 text-primary"></i>{!! __('reservations.client_email') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group input-group-premium">
                                                        <span class="input-group-text"><i class="mdi mdi-at"></i></span>
                                                        <input type="email" id="client_email" name="client_email"
                                                            class="form-control" value="{{ $reservation->client_email }}"
                                                            placeholder="{!! __('reservations.client_email') !!}">
                                                    </div>
                                                    <strong id="client_email_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column: Flight / Ticket & Numbers -->
                            <div class="col-lg-4 mt-2">
                                <div class="card shadow-sm border-0 mb-4 h-100 bg-light-blue"
                                    style="background-color: #fcfcfc;">
                                    <div class="card-body p-4">
                                        <h4 class="card-title fw-bold mb-4 pb-2 border-bottom text-primary">
                                            <i class="mdi mdi-airplane-takeoff me-2"></i>{!! __('reservations.flight_details') !!}
                                        </h4>

                                        <div class="row g-3">
                                            <!-- Flight Selection (Select2) -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="flight_id" class="form-label-premium"><i
                                                            class="mdi mdi-airplane me-1 text-primary"></i>{!! __('reservations.flight') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-airplane-marker"></i></span>
                                                        <select class="form-select form-control select2-modal"
                                                            id="flight_id" name="flight_id"
                                                            data-placeholder="{!! __('general.select') !!}">
                                                            <option value="">{!! __('general.select') !!}</option>
                                                            @foreach ($flights as $flight)
                                                                <option value="{{ $flight->id }}"
                                                                    {{ $reservation->flight_id == $flight->id ? 'selected' : '' }}>
                                                                    {{ $flight->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <strong id="flight_id_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <!-- Ticket Selection (Select2) -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="ticket_id" class="form-label-premium"><i
                                                            class="mdi mdi-ticket me-1 text-primary"></i>{!! __('reservations.ticket') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-ticket-confirmation"></i></span>
                                                        <select class="form-select form-control select2-modal"
                                                            id="ticket_id" name="ticket_id"
                                                            data-placeholder="{!! __('general.select') !!}">
                                                            <option value="">{!! __('general.select') !!}</option>
                                                            @foreach ($tickets as $ticket)
                                                                <option value="{{ $ticket->id }}"
                                                                    {{ $reservation->ticket_id == $ticket->id ? 'selected' : '' }}>
                                                                    {{ $ticket->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <strong id="ticket_id_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <h5 class="fw-bold mb-3 pb-2 border-bottom text-secondary"><i
                                                        class="mdi mdi-account-multiple-plus me-2"></i>{!! __('reservations.passengers') !!}
                                                </h5>
                                            </div>

                                            <!-- Number of Adults -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="number_of_adult" class="form-label-premium"><i
                                                            class="mdi mdi-human-male me-1 text-primary"></i>{!! __('reservations.number_of_adult') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-numeric"></i></span>
                                                        <input type="number" id="number_of_adult" name="number_of_adult"
                                                            class="form-control"
                                                            value="{{ $reservation->number_of_adult }}" min="1">
                                                    </div>
                                                    <strong id="number_of_adult_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <!-- Number of Children -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="number_of_children" class="form-label-premium"><i
                                                            class="mdi mdi-human-child me-1 text-primary"></i>{!! __('reservations.number_of_children') !!}</label>
                                                    <div class="input-group input-group-premium">
                                                        <input type="number" id="number_of_children"
                                                            name="number_of_children" class="form-control border-start"
                                                            value="{{ $reservation->number_of_children }}"
                                                            min="0">
                                                    </div>
                                                    <strong id="number_of_children_error"
                                                        class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <!-- Number of Babies -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="number_of_babies" class="form-label-premium"><i
                                                            class="mdi mdi-human-baby me-1 text-primary"></i>{!! __('reservations.number_of_babies') !!}</label>
                                                    <div class="input-group input-group-premium">
                                                        <input type="number" id="number_of_babies"
                                                            name="number_of_babies" class="form-control border-start"
                                                            value="{{ $reservation->number_of_babies }}" min="0">
                                                    </div>
                                                    <strong id="number_of_babies_error"
                                                        class="text-danger small"></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Full Width: Itinerary & Notes -->
                            <div class="col-12 mt-2">
                                <div class="card shadow-sm border-0 mb-5">
                                    <div class="card-body p-4">
                                        <h4 class="card-title fw-bold mb-4 pb-2 border-bottom text-primary">
                                            <i class="mdi mdi-map-clock me-2"></i>{!! __('reservations.itinerary') !!} &
                                            {!! __('reservations.notes') !!}
                                        </h4>

                                        <div class="row g-3">
                                            <!-- Departure Country Selection (Select2) -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="depature_country_id" class="form-label-premium"><i
                                                            class="mdi mdi-map-marker-radius me-1 text-primary"></i>{!! __('reservations.depature_country') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-earth-box"></i></span>
                                                        <select class="form-select form-control select2-modal"
                                                            id="depature_country_id" name="depature_country_id"
                                                            data-placeholder="{!! __('general.select') !!}">
                                                            <option value="">{!! __('general.select') !!}</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->id }}"
                                                                    {{ $reservation->depature_country_id == $country->id ? 'selected' : '' }}>
                                                                    {{ $country->getTranslation('name', Lang()) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <strong id="depature_country_id_error"
                                                        class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <!-- Departure Date -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="depature_date" class="form-label-premium"><i
                                                            class="mdi mdi-calendar-export me-1 text-primary"></i>{!! __('reservations.depature_date') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-calendar"></i></span>
                                                        <input type="date" id="depature_date" name="depature_date"
                                                            class="form-control"
                                                            value="{{ $reservation->depature_date }}">
                                                    </div>
                                                    <strong id="depature_date_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <!-- Return Date -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="return_date" class="form-label-premium"><i
                                                            class="mdi mdi-calendar-import me-1 text-primary"></i>{!! __('reservations.return_date') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-calendar-check"></i></span>
                                                        <input type="date" id="return_date" name="return_date"
                                                            class="form-control" value="{{ $reservation->return_date }}">
                                                    </div>
                                                    <strong id="return_date_error" class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <!-- Economy Class Name -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="economy_class_name" class="form-label-premium"><i
                                                            class="mdi mdi-seat-passenger me-1 text-primary"></i>{!! __('reservations.economy_class_name') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group input-group-premium">
                                                        <span class="input-group-text"><i class="mdi mdi-sofa"></i></span>
                                                        <input type="text" id="economy_class_name"
                                                            name="economy_class_name" class="form-control"
                                                            value="{{ $reservation->economy_class_name }}"
                                                            placeholder="{!! __('reservations.economy_class_name') !!}">
                                                    </div>
                                                    <strong id="economy_class_name_error"
                                                        class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <!-- Economy Class Type -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="economy_class_type" class="form-label-premium"><i
                                                            class="mdi mdi-transfer me-1 text-primary"></i>{!! __('reservations.economy_class_type') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group input-group-premium">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-swap-horizontal"></i></span>
                                                        <select class="form-select form-control" id="economy_class_type"
                                                            name="economy_class_type">
                                                            <option value="">{!! __('general.select') !!}</option>
                                                            <option value="direct_flight"
                                                                {{ $reservation->economy_class_type == 'direct_flight' ? 'selected' : '' }}>
                                                                {!! __('reservations.direct_flight') !!}</option>
                                                            <option value="transit"
                                                                {{ $reservation->economy_class_type == 'transit' ? 'selected' : '' }}>
                                                                {!! __('reservations.transit') !!}</option>
                                                        </select>
                                                    </div>
                                                    <strong id="economy_class_type_error"
                                                        class="text-danger small"></strong>
                                                </div>
                                            </div>

                                            <!-- Notes -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="notes" class="form-label-premium"><i
                                                            class="mdi mdi-text-box-outline me-1 text-primary"></i>{!! __('reservations.notes') !!}
                                                        <span class="text-danger">*</span></label>
                                                    <textarea id="notes" name="notes" class="form-control" rows="5"
                                                        placeholder="{!! __('reservations.notes') !!}...">{{ $reservation->notes }}</textarea>
                                                    <strong id="notes_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Command HUD -->
                        <x-dashboard.command-hud formId="edit_reservation_form" hudId="edit_reservation_hud"
                            countId="edit_reservation_count" discardId="edit_reservation_discard"
                            submitId="edit_reservation_save" />
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{!! asset('assets/dashboard/vendors/select2/select2.min.js') !!}"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2 natively for full page inputs
            $('.select2-modal').select2({
                theme: 'bootstrap-5',
                width: '100%',
                dropdownParent: $('body')
            });

            // Initialize HUD
            initHud('edit_reservation_form', {
                hudId: 'edit_reservation_hud',
                countId: 'edit_reservation_count',
                discardId: 'edit_reservation_discard',
                submitId: 'edit_reservation_save',
                isCreate: false
            });

            // Sync Select2 changes to HUD
            $('.select2-modal').on('change', function() {
                $(this).trigger('input');
            });

            $('#edit_reservation_discard').on('click', function() {
                window.location.reload();
            });

            window.handleFormSubmit('#edit_reservation_form', {
                url: "{{ route('dashboard.reservations.update', $reservation->id) }}",
                successMessage: "{!! __('general.update_success_message') !!}",
                isCreate: false,
                onSuccess: function() {
                    setTimeout(function() {
                        window.location.href = "{{ route('dashboard.reservations.index') }}";
                    }, 1500);
                }
            });
        });
    </script>
@endpush
