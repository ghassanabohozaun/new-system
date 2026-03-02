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
                <span class="chip-text">{!! __('tours.name') !!}</span>
                <div class="filter-popover" id="name_popover">
                    <div class="mb-3 theme-primary">
                        <label class="form-label d-block fw-bold mb-1">{!! __('tours.name_ar') !!}</label>
                        <div class="input-group-premium">
                            <span class="input-group-text"><i class="mdi mdi-pencil-outline"></i></span>
                            <input type="text" class="form-control" name="name_ar"
                                placeholder="{!! __('tours.enter_name_ar') !!}">
                        </div>
                    </div>
                    <div class="mb-3 theme-primary">
                        <label class="form-label d-block fw-bold mb-1">{!! __('tours.name_en') !!}</label>
                        <div class="input-group-premium">
                            <span class="input-group-text"><i class="mdi mdi-pencil-outline"></i></span>
                            <input type="text" class="form-control" name="name_en"
                                placeholder="{!! __('tours.enter_name_en') !!}">
                        </div>
                    </div>
                    <div class="popover-actions">
                        <button type="button"
                            class="btn btn-primary btn-sm text-white js-apply-filter">{!! __('general.apply') !!}</button>
                    </div>
                </div>
            </div>

            <!-- Price Filter Chip -->
            <div class="filter-chip js-filter-chip" data-target="price_popover">
                <i class="mdi mdi-cash"></i>
                <span class="chip-text">{!! __('tours.price') !!}</span>
                <div class="filter-popover" id="price_popover">
                    <div class="mb-3 theme-success">
                        <label class="form-label d-block fw-bold mb-1">{!! __('tours.price') !!}</label>
                        <div class="input-group-premium">
                            <span class="input-group-text"><i class="mdi mdi-currency-usd"></i></span>
                            <input type="number" class="form-control" name="price"
                                placeholder="{!! __('tours.enter_price') !!}">
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
                <span class="chip-text">{!! __('tours.location') !!}</span>
                <div class="filter-popover" id="location_popover">
                    <div class="mb-3 theme-primary">
                        <label class="form-label d-block fw-bold mb-1">{!! __('tours.country_id') !!}</label>
                        <div class="input-group-premium select2-premium">
                            <span class="input-group-text"><i class="mdi mdi-map-marker-radius"></i></span>
                            <select class="form-control country_id_select" id="filter_tour_country_id" name="country_id"
                                style="width: 100%">
                                @if (isset($country) && $country)
                                    <option value="{{ $country->id }}" selected
                                        {{ $country->flag_code ? 'data-flag-code=' . $country->flag_code : '' }}>
                                        {{ $country->getTranslation('name', app()->getLocale()) }}
                                    </option>
                                @else
                                    <option></option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 theme-info">
                        <label class="form-label d-block fw-bold mb-1">{!! __('tours.city_id') !!}</label>
                        <div class="input-group-premium select2-premium">
                            <span class="input-group-text"><i class="mdi mdi-city-variant-outline"></i></span>
                            <select class="form-control city_id_select" id="filter_tour_city_id" name="city_id"
                                style="width: 100%">
                                @if (isset($city) && $city)
                                    <option value="{{ $city->id }}" selected>
                                        {{ $city->getTranslation('name', app()->getLocale()) }}
                                    </option>
                                @else
                                    <option></option>
                                @endif
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
                <i class="mdi mdi-toggle-switch-outline"></i>
                <span class="chip-text">{!! __('tours.status_short') !!}</span>
                <div class="filter-popover" id="status_popover">
                    <div class="mb-3 theme-warning">
                        <label class="form-label d-block fw-bold mb-1">{!! __('tours.status') !!}</label>
                        <div class="input-group-premium">
                            <span class="input-group-text"><i class="mdi mdi-check-circle-outline"></i></span>
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
