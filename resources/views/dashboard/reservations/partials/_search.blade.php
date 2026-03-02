@push('css')
    <link rel="stylesheet" href="{!! asset('assets/dashboard/vendors/select2/select2.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/dashboard/css/filter.css') !!}">
@endpush

<div class="query-bar-container">
    <div class="query-bar js-query-bar">
        <span class="query-bar-label">
            <i class="mdi mdi-magnify"></i> {!! __('general.search') !!}:
        </span>

        <form class="js-filter-form d-flex align-items-center gap-2">
            <!-- Client Search Chip -->
            <div class="filter-chip js-filter-chip" data-target="search_popover">
                <i class="mdi mdi-account-search-outline"></i>
                <span class="chip-text">{!! __('reservations.client_info') !!}</span>
                <div class="filter-popover" id="search_popover">
                    <div class="mb-3 theme-primary">
                        <label class="form-label d-block fw-bold mb-1">{!! __('general.search') !!}</label>
                        <div class="input-group-premium">
                            <span class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                            <input type="text" class="form-control" name="search_term"
                                placeholder="{!! __('reservations.search_placeholder') !!}">
                        </div>
                    </div>
                    <div class="popover-actions">
                        <button type="button"
                            class="btn btn-primary btn-sm text-white js-apply-filter">{!! __('general.apply') !!}</button>
                    </div>
                </div>
            </div>

            <!-- Service Filter Chip -->
            <div class="filter-chip js-filter-chip" data-target="service_popover">
                <i class="mdi mdi-layers-outline"></i>
                <span class="chip-text">{!! __('reservations.service') !!}</span>
                <div class="filter-popover" id="service_popover">
                    <div class="mb-3 theme-info">
                        <label class="form-label d-block fw-bold mb-1">{!! __('reservations.service') !!}</label>
                        <div class="input-group-premium">
                            <span class="input-group-text"><i class="mdi mdi-shape-outline"></i></span>
                            <select class="form-control" name="service">
                                <option value="">{!! __('reservations.all_services') !!}</option>
                                <option value="flight">{!! __('reservations.flight') !!}</option>
                                <option value="tour">{!! __('reservations.tour') !!}</option>
                                <option value="ticket">{!! __('reservations.ticket') !!}</option>
                            </select>
                        </div>
                    </div>
                    <div class="popover-actions">
                        <button type="button"
                            class="btn btn-primary btn-sm text-white js-apply-filter">{!! __('general.apply') !!}</button>
                    </div>
                </div>
            </div>

            <!-- Flight Filter Chip -->
            <div class="filter-chip js-filter-chip" data-target="flight_popover">
                <i class="mdi mdi-airplane-takeoff"></i>
                <span class="chip-text">{!! __('reservations.flight') !!}</span>
                <div class="filter-popover" id="flight_popover">
                    <div class="mb-3 theme-primary">
                        <label class="form-label d-block fw-bold mb-1">{!! __('reservations.select_flight') !!}</label>
                        <div class="input-group-premium select2-premium">
                            <span class="input-group-text"><i class="mdi mdi-airplane"></i></span>
                            <select class="form-control flight_id_select" name="flight_id" style="width: 100%">
                                <option value="">{!! __('general.all') !!}</option>
                                @foreach ($flights as $flight)
                                    <option value="{{ $flight->id }}">{{ $flight->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="popover-actions">
                        <button type="button"
                            class="btn btn-primary btn-sm text-white js-apply-filter">{!! __('general.apply') !!}</button>
                    </div>
                </div>
            </div>

            <!-- Departure Country Chip -->
            <div class="filter-chip js-filter-chip" data-target="country_popover">
                <i class="mdi mdi-map-marker-radius"></i>
                <span class="chip-text">{!! __('reservations.depature_country') !!}</span>
                <div class="filter-popover" id="country_popover">
                    <div class="mb-3 theme-primary">
                        <label class="form-label d-block fw-bold mb-1">{!! __('reservations.depature_country') !!}</label>
                        <div class="input-group-premium select2-premium">
                            <span class="input-group-text"><i class="mdi mdi-earth"></i></span>
                            <select class="form-control depature_country_id_select" name="depature_country_id"
                                style="width: 100%">
                                <option value="">{!! __('general.all') !!}</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->getTranslation('name', Lang()) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="popover-actions">
                        <button type="button"
                            class="btn btn-primary btn-sm text-white js-apply-filter">{!! __('general.apply') !!}</button>
                    </div>
                </div>
            </div>

            <!-- Depature Date Chip -->
            <div class="filter-chip js-filter-chip" data-target="depature_date_popover">
                <i class="mdi mdi-calendar-export"></i>
                <span class="chip-text">{!! __('reservations.depature_date') !!}</span>
                <div class="filter-popover" id="depature_date_popover">
                    <div class="mb-3 theme-info">
                        <label class="form-label d-block fw-bold mb-1">{!! __('reservations.depature_date') !!}</label>
                        <div class="input-group-premium">
                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            <input type="date" class="form-control" name="depature_date">
                        </div>
                    </div>
                    <div class="popover-actions">
                        <button type="button"
                            class="btn btn-primary btn-sm text-white js-apply-filter">{!! __('general.apply') !!}</button>
                    </div>
                </div>
            </div>

            <!-- Return Date Chip -->
            <div class="filter-chip js-filter-chip" data-target="return_date_popover">
                <i class="mdi mdi-calendar-import"></i>
                <span class="chip-text">{!! __('reservations.return_date') !!}</span>
                <div class="filter-popover" id="return_date_popover">
                    <div class="mb-3 theme-info">
                        <label class="form-label d-block fw-bold mb-1">{!! __('reservations.return_date') !!}</label>
                        <div class="input-group-premium">
                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            <input type="date" class="form-control" name="return_date">
                        </div>
                    </div>
                    <div class="popover-actions">
                        <button type="button"
                            class="btn btn-primary btn-sm text-white js-apply-filter">{!! __('general.apply') !!}</button>
                    </div>
                </div>
            </div>

            <!-- Economy Class Type Chip -->
            <div class="filter-chip js-filter-chip" data-target="class_popover">
                <i class="mdi mdi-account-group-outline"></i>
                <span class="chip-text">{!! __('reservations.economy_class_type') !!}</span>
                <div class="filter-popover" id="class_popover">
                    <div class="mb-3 theme-warning">
                        <label class="form-label d-block fw-bold mb-1">{!! __('reservations.economy_class_type') !!}</label>
                        <div class="input-group-premium">
                            <span class="input-group-text"><i class="mdi mdi-stairs"></i></span>
                            <select class="form-control" name="economy_class_type">
                                <option value="">{!! __('general.all') !!}</option>
                                <option value="direct_flight">{!! __('reservations.direct_flight') !!}</option>
                                <option value="transit">{!! __('reservations.transit') !!}</option>
                            </select>
                        </div>
                    </div>
                    <div class="popover-actions">
                        <button type="button"
                            class="btn btn-primary btn-sm text-white js-apply-filter">{!! __('general.apply') !!}</button>
                    </div>
                </div>
            </div>

            <!-- Created At Chip -->
            <div class="filter-chip js-filter-chip" data-target="created_at_popover">
                <i class="mdi mdi-clock-outline"></i>
                <span class="chip-text">{!! __('reservations.created_at') !!}</span>
                <div class="filter-popover" id="created_at_popover">
                    <div class="mb-3 theme-info">
                        <label class="form-label d-block fw-bold mb-1">{!! __('reservations.created_at') !!}</label>
                        <div class="input-group-premium">
                            <span class="input-group-text"><i class="mdi mdi-calendar-clock"></i></span>
                            <input type="date" class="form-control" name="created_at">
                        </div>
                    </div>
                    <div class="popover-actions">
                        <button type="button"
                            class="btn btn-primary btn-sm text-white js-apply-filter">{!! __('general.apply') !!}</button>
                    </div>
                </div>
            </div>

            <!-- Reset Button -->
            <div class="filter-chip reset-chip js-reset-btn">
                <i class="mdi mdi-refresh"></i>
                <span>{!! __('general.reset') !!}</span>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script src="{!! asset('assets/dashboard/vendors/select2/select2.min.js') !!}"></script>

    <script>
        $(document).ready(function() {
            // 1. Popover Logic
            $('.js-filter-chip').on('click', function(e) {
                if ($(e.target).closest('.filter-popover').length) return;
                const $chip = $(this);
                const $popover = $chip.find('.filter-popover');
                const isVisible = $popover.is(':visible');

                $('.filter-popover').fadeOut(100);
                $('.js-filter-chip').removeClass('popover-open');

                if (!isVisible) {
                    $popover.fadeIn(200, function() {
                        const popId = $popover.attr('id');

                        // Safety: Check if popover overflows screen edges
                        const rect = this.getBoundingClientRect();
                        if (rect.left < 10) {
                            $(this).css({
                                left: '0',
                                right: 'auto'
                            });
                        } else if (rect.right > (window.innerWidth - 10)) {
                            $(this).css({
                                left: 'auto',
                                right: '0'
                            });
                        }

                        // Initialize Select2 after it's visible to ensure correct height calculation
                        if (popId === 'country_popover') {
                            const $countrySelect = $popover.find('.depature_country_id_select');
                            if (!$countrySelect.hasClass("select2-hidden-accessible")) {
                                window.initSelect2Autocomplete($countrySelect, {
                                    url: "{{ route('dashboard.addresses.countries.autocomplete.country') }}",
                                    showFlag: true,
                                    dropdownParent: $popover
                                });
                            }
                        } else if (popId === 'flight_popover') {
                            const $flightSelect = $popover.find('.flight_id_select');
                            if (!$flightSelect.hasClass("select2-hidden-accessible")) {
                                $flightSelect.select2({
                                    dropdownParent: $popover,
                                    theme: 'bootstrap-5',
                                    width: '100%'
                                });
                            }
                        }
                    });
                    $chip.addClass('popover-open');
                }
            });

            $(document).on('click', function(e) {
                if (!$(e.target).closest('.js-filter-chip').length) {
                    $('.filter-popover').fadeOut(100);
                    $('.js-filter-chip').removeClass('popover-open');
                }
            });

            $('.js-apply-filter').on('click', function() {
                const $popover = $(this).closest('.filter-popover');
                const $chip = $popover.closest('.js-filter-chip');
                let hasValue = false;
                $popover.find('input, select').each(function() {
                    if ($(this).val() && $(this).val() !== "") hasValue = true;
                });
                if (hasValue) {
                    $chip.addClass('active');
                } else {
                    $chip.removeClass('active');
                }
                $popover.fadeOut(100);
                $('.js-filter-btn').trigger('click');
            });

            // Init filter handler
            window.initFilterHandler({
                form: ".js-filter-form",
                container: "#table_data",
                loader: ".table-loader-overlay"
            });
        });
    </script>
@endpush
