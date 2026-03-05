<div class="card border-0 shadow-sm premium-glass-card overflow-hidden">
    <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pt-4 px-4">
        <h4 class="text-primary mb-0 fw-bold">
            <i class="mdi mdi-information-outline me-2"></i>{!! __('flights.basic') !!}
        </h4>
    </div>
    <div class="card-body p-4 pt-2">
        <!-- begin: name-->
        <div class="row mt-1">
            <!-- begin: input -->
            <div class="col-md-6">
                <div class="form-group theme-primary">
                    <label class="form-label-premium" for="name_ar">{!! __('flights.name_ar') !!} <span
                            class="text-danger">*</span></label>
                    <div class="input-group-premium">
                        <span class="input-group-text"><i class="mdi mdi-translate"></i></span>
                        <input type="text" wire:model.blur="name_ar" class="form-control" autocomplete="off"
                            placeholder="{!! __('flights.enter_name_ar') !!}"
                            @error('name_ar') style="border-color: rgb(246, 78, 96)" @enderror>
                    </div>
                    @error('name_ar')
                        <span class="text text-danger small">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- end: input -->


            <!-- begin: input -->
            <div class="col-md-6">
                <div class="form-group theme-primary">
                    <label class="form-label-premium" for="name_en">{!! __('flights.name_en') !!} <span
                            class="text-danger">*</span></label>
                    <div class="input-group-premium">
                        <span class="input-group-text"><i class="mdi mdi-alpha-n-box-outline"></i></span>
                        <input type="text" wire:model.blur="name_en" class="form-control" autocomplete="off"
                            placeholder="{!! __('flights.enter_name_en') !!}"
                            @error('name_en') style="border-color: rgb(246, 78, 96)" @enderror>
                    </div>
                    @error('name_en')
                        <span class="text text-danger small">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- end: input -->

        </div>
        <!-- end: name -->


        <!-- begin: days_num-->
        <div class="row mt-1">
            <!-- begin: input -->
            <div class="col-md-3">
                <div class="form-group theme-success">
                    <label class="form-label-premium" for="days_num">{!! __('flights.days_num') !!} <span
                            class="text-danger">*</span></label>
                    <div class="input-group-premium">
                        <span class="input-group-text"><i class="mdi mdi-calendar-today"></i></span>
                        <input type="number" wire:model.blur="days_num" class="form-control" autocomplete="off"
                            placeholder="{!! __('flights.enter_days_num') !!}"
                            @error('days_num') style="border-color: rgb(246, 78, 96)" @enderror>
                    </div>
                    @error('days_num')
                        <span class="text text-danger small">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- end: input -->


            <!-- begin: input -->
            <div class="col-md-3">
                <div class="form-group theme-success">
                    <label class="form-label-premium" for="nights_num">{!! __('flights.nights_num') !!} <span
                            class="text-danger">*</span></label>
                    <div class="input-group-premium">
                        <span class="input-group-text"><i class="mdi mdi-weather-night"></i></span>
                        <input type="number" wire:model.blur="nights_num" class="form-control" autocomplete="off"
                            placeholder="{!! __('flights.enter_nights_num') !!}"
                            @error('nights_num') style="border-color: rgb(246, 78, 96)" @enderror>
                    </div>
                    @error('nights_num')
                        <span class="text text-danger small">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- end: input -->

            <!-- begin: input -->
            <div class="col-md-3">
                <div class="form-group theme-primary">
                    <label class="form-label-premium" for="offer_duration_from">{!! __('flights.offer_duration_from') !!} <span
                            class="text-danger">*</span></label>
                    <div class="input-group-premium">
                        <span class="input-group-text"><i class="mdi mdi-calendar-range"></i></span>
                        <input type="date" wire:model.blur="offer_duration_from" class="form-control"
                            autocomplete="off" placeholder="{!! __('flights.enter_offer_duration_from') !!}"
                            @error('offer_duration_from') style="border-color: rgb(246, 78, 96)" @enderror>
                    </div>
                    @error('offer_duration_from')
                        <span class="text text-danger small">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- end: input -->

            <!-- begin: input -->
            <div class="col-md-3">
                <div class="form-group theme-primary">
                    <label class="form-label-premium" for="offer_duration_to">{!! __('flights.offer_duration_to') !!} <span
                            class="text-danger">*</span></label>
                    <div class="input-group-premium">
                        <span class="input-group-text"><i class="mdi mdi-calendar-range"></i></span>
                        <input type="date" wire:model.blur="offer_duration_to" class="form-control"
                            autocomplete="off" placeholder="{!! __('flights.enter_offer_duration_to') !!}"
                            @error('offer_duration_to') style="border-color: rgb(246, 78, 96)" @enderror>
                    </div>
                    @error('offer_duration_to')
                        <span class="text text-danger small">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- end: input -->

        </div>
        <!-- end: days_num -->


        <!-- begin: country_id , city_id , category_id-->
        <div class="row">

            <!-- begin: input -->
            <div class="col-md-3">
                <div class="form-group theme-warning" wire:ignore>
                    <label class="form-label-premium" for="country_id_select">{!! __('flights.country_id') !!} <span
                            class="text-danger">*</span></label>
                    <div class="input-group-premium select2-premium">
                        <span class="input-group-text"><i class="mdi mdi-earth"></i></span>
                        <select id="country_id_select" name="country_id" class="form-control">
                            <option value="">
                                {!! __('flights.select') !!} {!! __('flights.country_id') !!}
                            </option>
                            @foreach ($countries as $key => $country)
                                <option value="{!! $country->id !!}"
                                    {{ $country->flag_code ? 'data-flag-code=' . $country->flag_code : '' }}>
                                    {!! $country->name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('country_id')
                        <span class="text text-danger small">
                            <strong class="strong-weight">{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- end: input -->

            <!-- begin: input -->
            <div class="col-md-3">
                <div class="form-group theme-warning" wire:ignore>
                    <label class="form-label-premium" for="city_id_select">{!! __('flights.city_id') !!} <span
                            class="text-danger">*</span></label>
                    <div class="input-group-premium select2-premium">
                        <span class="input-group-text"><i class="mdi mdi-city"></i></span>
                        <select id="city_id_select" name="city_id" class="form-control" {!! $disabledGovernorate == 1 ? 'disabled' : '' !!}>
                            <option value="">
                                {!! __('flights.select') !!} {!! __('flights.city_id') !!}
                            </option>
                            @foreach ($cities as $key => $city)
                                <option value="{!! $city->id !!}">{!! $city->name !!}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('city_id')
                        <span class="text text-danger small">
                            <strong class="strong-weight">{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- end: input -->


            <!-- begin: input -->
            <div class="col-md-3">
                <div class="form-group theme-warning">
                    <label class="form-label-premium" for="category_id">{!! __('flights.category_id') !!} <span
                            class="text-danger">*</span></label>
                    <div class="input-group-premium">
                        <span class="input-group-text"><i class="mdi mdi-apps"></i></span>
                        <select type="text" wire:model="category_id" id="category_id" name="category_id"
                            class="form-control">
                            <option value="">
                                {!! __('flights.select') !!} {!! __('flights.category_id') !!}
                            </option>
                            @foreach ($categories as $key => $category)
                                <option value="{!! $category->id !!}">{!! $category->name !!}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                        <span class="text text-danger small">
                            <strong class="strong-weight">{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- end: input -->

        </div>
        <!-- end: country_id , city_id , category_id -->



        <!-- begin: details-->
        <div class="row mt-1">
            <!-- begin: input -->
            <div class="col-md-6">
                <div class="form-group theme-info">
                    <label class="form-label-premium" for="details_ar">{!! __('flights.details_ar') !!} <span
                            class="text-danger">*</span></label>
                    <div class="input-group-premium">
                        <textarea wire:model.blur="details_ar" class="form-control h-auto" autocomplete="off" rows="5"
                            placeholder="{!! __('flights.enter_details_ar') !!}" @error('details_ar') style="border-color: rgb(246, 78, 96)" @enderror></textarea>
                    </div>
                    @error('details_ar')
                        <span class="text text-danger small">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- end: input -->


            <!-- begin: input -->
            <div class="col-md-6">
                <div class="form-group theme-info">
                    <label class="form-label-premium" for="details_en">{!! __('flights.details_en') !!} <span
                            class="text-danger">*</span></label>
                    <div class="input-group-premium">
                        <textarea wire:model.blur="details_en" class="form-control h-auto" autocomplete="off" rows="5"
                            placeholder="{!! __('flights.enter_details_en') !!}" @error('details_en') style="border-color: rgb(246, 78, 96)" @enderror></textarea>
                    </div>
                    @error('details_en')
                        <span class="text text-danger small">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- end: input -->

        </div>
        <!-- end: details -->
    </div>
</div>


@push('scripts')
    <script>
        $(document).ready(function() {
            const initSelects = () => {
                const $countrySelect = $('#country_id_select');
                const $citySelect = $('#city_id_select');

                // Initialize Country Select2
                $countrySelect.select2({
                    placeholder: "{!! __('flights.select') !!} {!! __('flights.country_id') !!}",
                    allowClear: true,
                    templateResult: window.formatSelect2Country,
                    templateSelection: window.formatSelect2Country
                }).on('change', function(e) {
                    const val = $(this).val();
                    @this.set('country_id', val);
                    @this.call('changeCountry', val);
                });

                // Initialize City Select2
                $citySelect.select2({
                    placeholder: "{!! __('flights.select') !!} {!! __('flights.city_id') !!}",
                    allowClear: true
                }).on('change', function(e) {
                    @this.set('city_id', $(this).val());
                });
            };

            initSelects();

            // Re-initialize after Livewire updates
            document.addEventListener('livewire:load', function() {
                initSelects();
                // Update City options when Livewire updates them
                Livewire.on('citiesUpdated', function(event) {
                    const cities = event.cities || event;
                    const $citySelect = $('#city_id_select');
                    $citySelect.empty().append(
                        '<option value="">{!! __('flights.select') !!} {!! __('flights.city_id') !!}</option>'
                        );
                    $.each(cities, function(id, name) {
                        $citySelect.append(new Option(name, id));
                    });
                    $citySelect.prop('disabled', false).trigger('change');
                });
            });

        });
    </script>
@endpush
