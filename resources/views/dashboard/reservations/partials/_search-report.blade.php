<div class="card mb-4">
    <div class="card-body">
        <h4 class="card-title mb-4 d-flex align-items-center">
            <span class="card-icon-premium me-3">
                <i class="mdi mdi-filter-variant text-primary"></i>
            </span>
            {!! __('general.filters') !!}
        </h4>

        <div class="form-body">
            <div class="row">
                <!-- Flight Selection -->
                <div class="form-group col-md-3 mb-3 theme-primary">
                    <label class="form-label d-block fw-bold mb-2" for="flight_id">{!! __('reservations.flight_id') !!}</label>
                    <div class="input-group-premium select2-premium">
                        <span class="input-group-text"><i class="mdi mdi-airplane-marker"></i></span>
                        <select id="flight_id" name="flight_id" class="form-control select2-modal">
                            <option value="">{!! __('general.select_from_list') !!}</option>
                            @foreach ($flights as $flight)
                                <option value="{{ $flight->id }}">{{ $flight->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Service Selection -->
                <div class="form-group col-md-3 mb-3 theme-info">
                    <label class="form-label d-block fw-bold mb-2" for="service">{!! __('reservations.service') !!}</label>
                    <div class="input-group-premium">
                        <span class="input-group-text"><i class="mdi mdi-layers-outline"></i></span>
                        <select id="service" name="service" class="form-control">
                            <option value="">{!! __('general.select_from_list') !!}</option>
                            <option value="flight">{!! __('reservations.flight') !!}</option>
                            <option value="tour">{!! __('reservations.tour') !!}</option>
                            <option value="ticket">{!! __('reservations.ticket') !!}</option>
                        </select>
                    </div>
                </div>

                <!-- Ticket Selection -->
                <div class="form-group col-md-3 mb-3 theme-primary">
                    <label class="form-label d-block fw-bold mb-2" for="ticket_id">{!! __('reservations.ticket_id') !!}</label>
                    <div class="input-group-premium select2-premium">
                        <span class="input-group-text"><i class="mdi mdi-ticket-confirmation"></i></span>
                        <select id="ticket_id" name="ticket_id" class="form-control select2-modal">
                            <option value="">{!! __('general.select_from_list') !!}</option>
                            @foreach ($tickets as $ticket)
                                <option value="{{ $ticket->id }}">{{ $ticket->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Class Type -->
                <div class="form-group col-md-3 mb-3 theme-warning">
                    <label class="form-label d-block fw-bold mb-2"
                        for="economy_class_type">{!! __('reservations.economy_class_type') !!}</label>
                    <div class="input-group-premium">
                        <span class="input-group-text"><i class="mdi mdi-account-group-outline"></i></span>
                        <select id="economy_class_type" name="economy_class_type" class="form-control">
                            <option value="">{!! __('general.select_from_list') !!}</option>
                            <option value="transit">{!! __('reservations.transit') !!}</option>
                            <option value="direct_flight">{!! __('reservations.direct_flight') !!}</option>
                        </select>
                    </div>
                </div>

                <!-- Departure Country -->
                <div class="form-group col-md-3 mb-3 theme-primary">
                    <label class="form-label d-block fw-bold mb-2"
                        for="depature_country_id">{!! __('reservations.depature_country_id') !!}</label>
                    <div class="input-group-premium select2-premium">
                        <span class="input-group-text"><i class="mdi mdi-earth"></i></span>
                        <select id="depature_country_id" name="depature_country_id"
                            class="form-control depature_country_id_select" style="width: 100%">
                        </select>
                    </div>
                </div>

                <!-- Created At -->
                <div class="form-group col-md-3 mb-3 theme-info">
                    <label class="form-label d-block fw-bold mb-2" for="created_at">{!! __('reservations.created_at') !!}</label>
                    <div class="input-group-premium">
                        <span class="input-group-text"><i class="mdi mdi-calendar-clock"></i></span>
                        <input type="date" id="created_at" name="created_at" class="form-control">
                    </div>
                </div>

                <!-- Departure Date -->
                <div class="form-group col-md-3 mb-3 theme-info">
                    <label class="form-label d-block fw-bold mb-2" for="depature_date">{!! __('reservations.depature_date') !!}</label>
                    <div class="input-group-premium">
                        <span class="input-group-text"><i class="mdi mdi-calendar-export"></i></span>
                        <input type="date" id="depature_date" name="depature_date" class="form-control">
                    </div>
                </div>

                <!-- Return Date -->
                <div class="form-group col-md-3 mb-3 theme-info">
                    <label class="form-label d-block fw-bold mb-2" for="return_date">{!! __('reservations.return_date') !!}</label>
                    <div class="input-group-premium">
                        <span class="input-group-text"><i class="mdi mdi-calendar-import"></i></span>
                        <input type="date" id="return_date" name="return_date" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Init Premium Select2
            $('.select2-modal').select2({
                theme: 'bootstrap-5',
                width: '100%',
                dropdownParent: $('body')
            });

            // Init Autocomplete for Country
            if ($('.depature_country_id_select').length) {
                window.initSelect2Autocomplete('.depature_country_id_select', {
                    url: "{{ route('dashboard.addresses.countries.autocomplete.country') }}",
                    showFlag: true
                });
            }
        });
    </script>
@endpush
