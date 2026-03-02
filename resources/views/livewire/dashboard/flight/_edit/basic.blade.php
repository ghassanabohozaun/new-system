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
                        <input type="text" wire:model.live="name_ar" class="form-control" autocomplete="off"
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
                        <input type="text" wire:model.live="name_en" class="form-control" autocomplete="off"
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
                        <input type="number" wire:model.live="days_num" class="form-control" autocomplete="off"
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
                        <input type="number" wire:model.live="nights_num" class="form-control" autocomplete="off"
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
                        <input type="date" wire:model.live="offer_duration_from" class="form-control"
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
                        <input type="date" wire:model.live="offer_duration_to" class="form-control"
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
                <div class="form-group theme-warning">
                    <label class="form-label-premium" for="country_id">{!! __('flights.country_id') !!} <span
                            class="text-danger">*</span></label>
                    <div class="input-group-premium">
                        <span class="input-group-text"><i class="mdi mdi-earth"></i></span>
                        <select type="text" wire:model="country_id"
                            wire:change="changeCountry($event.target.value)" id="country_id" name="country_id"
                            class="form-control">
                            <option value="" selected='selected'>
                                {!! __('flights.select') !!} {!! __('flights.country_id') !!}
                            </option>
                            @foreach ($countries as $key => $country)
                                <option value="{!! $country->id !!}">{!! $country->name !!}</option>
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
                <div class="form-group theme-warning">
                    <label class="form-label-premium" for="city_id">{!! __('flights.city_id') !!} <span
                            class="text-danger">*</span></label>
                    <div class="input-group-premium">
                        <span class="input-group-text"><i class="mdi mdi-city"></i></span>
                        <select type="text" wire:model="city_id" id="city_id" name="city_id"
                            {!! $disabledGovernorate == 1 ? 'disabled' : '' !!} class="form-control"
                            @error('city_id') style="border-color: rgb(246, 78, 96)" @enderror>
                            <option value="" selected='selected'>
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
                        <textarea type="text" wire:model.live="details_ar" class="form-control h-auto" autocomplete="off" rows="5"
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
                        <textarea wire:model.live="details_en" class="form-control h-auto" autocomplete="off" rows="5"
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
