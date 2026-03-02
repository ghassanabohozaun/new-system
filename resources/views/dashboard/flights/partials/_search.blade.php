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
            <!-- Name Filter Chip -->
            <div class="filter-chip js-filter-chip" data-target="name_popover">
                <i class="mdi mdi-pencil-box-outline"></i>
                <span class="chip-text">{!! __('flights.flight_name') !!}</span>
                <div class="filter-popover" id="name_popover">
                    <div class="mb-3 theme-primary">
                        <label class="form-label d-block fw-bold mb-1">{!! __('flights.flight_name') !!}</label>
                        <div class="input-group-premium">
                            <span class="input-group-text"><i class="mdi mdi-pencil-box-outline"></i></span>
                            <input type="text" class="form-control" name="flight_name"
                                placeholder="{!! __('flights.enter_flight_name') !!}">
                        </div>
                    </div>
                    <div class="popover-actions">
                        <button type="button"
                            class="btn btn-primary btn-sm text-white js-apply-filter">{!! __('general.apply') !!}</button>
                    </div>
                </div>
            </div>

            <!-- Country/City Chip -->
            <div class="filter-chip js-filter-chip" data-target="location_popover">
                <i class="mdi mdi-map-marker-radius"></i>
                <span class="chip-text">{!! __('flights.country_id') !!}</span>
                <div class="filter-popover" id="location_popover">
                    <!-- Country -->
                    <div class="mb-3 theme-primary">
                        <label class="form-label d-block fw-bold mb-1">{!! __('flights.country_id') !!}</label>
                        <div class="input-group-premium select2-premium">
                            <span class="input-group-text"><i class="mdi mdi-map-marker-radius"></i></span>
                            <select class="form-control country_id_select" id="filter_flight_country_id"
                                name="country_id" style="width: 100%">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <!-- City -->
                    <div class="mb-3 theme-info">
                        <label class="form-label d-block fw-bold mb-1">{!! __('flights.city_id') !!}</label>
                        <div class="input-group-premium select2-premium">
                            <span class="input-group-text"><i class="mdi mdi-city-variant-outline"></i></span>
                            <select class="form-control city_id_select" id="filter_flight_city_id" name="city_id"
                                style="width: 100%">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="popover-actions">
                        <button type="button"
                            class="btn btn-primary btn-sm text-white js-apply-filter">{!! __('general.apply') !!}</button>
                    </div>
                </div>
            </div>

            <!-- Category Chip -->
            <div class="filter-chip js-filter-chip" data-target="category_popover">
                <i class="icon-layers"></i>
                <span class="chip-text">{!! __('flights.category_id') !!}</span>
                <div class="filter-popover" id="category_popover">
                    <div class="mb-3 theme-success">
                        <label class="form-label d-block fw-bold mb-1">{!! __('flights.category_id') !!}</label>
                        <div class="input-group-premium">
                            <span class="input-group-text"><i class="mdi mdi-layers-outline"></i></span>
                            <select class="form-control" name="category_id">
                                <option value="">{!! __('general.select_from_list') !!}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->getTranslation('name', app()->getLocale()) }}
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

            <!-- Status Chip -->
            <div class="filter-chip js-filter-chip" data-target="status_popover">
                <i class="icon-options"></i>
                <span class="chip-text">{!! __('flights.status') !!}</span>
                <div class="filter-popover" id="status_popover">
                    <div class="mb-3 theme-warning">
                        <label class="form-label d-block fw-bold mb-1">{!! __('flights.status') !!}</label>
                        <div class="input-group-premium">
                            <span class="input-group-text"><i class="mdi mdi-toggle-switch-outline"></i></span>
                            <select class="form-control" name="status">
                                <option value="">{!! __('general.select_from_list') !!}</option>
                                <option value="1">{!! __('general.enable') !!}</option>
                                <option value="0">{!! __('general.disabled') !!}</option>
                            </select>
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
                <i class="icon-refresh"></i>
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
                        if ($popover.attr('id') === 'location_popover') {
                            const $countrySelect = $popover.find('.country_id_select');
                            const $citySelect = $popover.find('.city_id_select');

                            if (!$countrySelect.hasClass("select2-hidden-accessible")) {
                                window.initSelect2Autocomplete($countrySelect, {
                                    url: "{{ route('dashboard.addresses.countries.autocomplete.country') }}",
                                    showFlag: true,
                                    dropdownParent: $popover
                                });
                            }

                            if (!$citySelect.hasClass("select2-hidden-accessible")) {
                                window.initSelect2Autocomplete($citySelect, {
                                    url: "{{ route('dashboard.addresses.cities.autocomplete.city') }}",
                                    dependencySelector: $countrySelect,
                                    dropdownParent: $popover
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
