@push('style')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/vendors/css/forms/selects/select2.min.css') !!}">
    @if (Lang() == 'ar')
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css-rtl/my-select2-style.css') !!}">
    @endif
@endpush

<div class="card">
    <!-- begin: card header -->
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-colored-form-control">
            {!! __('general.filters') !!}
        </h4>
        <a class="heading-elements" data-action="collapse"><i class="ft-minus"></i></a>
    </div>
    <!-- end: card header -->

    <!-- begin: card content  show-->
    <div class="card-content collapse show ">
        <div class="card-body">
            <form class="form">
                <div class="form-body">

                    <div class="row">
                        <!-- begin: input  class="sr-only"-->
                        <div class="form-group col-md-2">
                            <label for="flight_name">{!! __('flights.flight_name') !!}</label>
                            <input type="text" class="form-control" placeholder="{!! __('flights.enter_flight_name') !!}"
                                id="flight_name" name="flight_name">
                        </div>
                        <!-- end: input -->


                        <!-- begin: input -->
                        <div class="form-group col-md-2">
                            <label for="country_id">{!! __('flights.country_id') !!}</label>
                            <select class="country_id_select form-control" id="country_id" name="country_id"
                                style="width: 100%">

                            </select>
                        </div>
                        <!-- end: input -->

                        <!-- begin: input -->
                        <div class="form-group col-md-2">
                            <label for="city_id">{!! __('flights.city_id') !!}</label>
                            <select class="city_id_select form-control" id="city_id" name="city_id"
                                style="width: 100%">

                            </select>
                        </div>
                        <!-- end: input -->

                        <!-- begin: input -->
                        <div class="form-group col-md-2">
                            <label for="category_id">{!! __('flights.category_id') !!}</label>
                            <select type="text" id="category_id" class="form-control">
                                <option value="">
                                    {!! __('flights.select') !!} {!! __('flights.category_id') !!}
                                </option>
                                @foreach ($categories as $key => $category)
                                    <option value="{!! $category->id !!}">{!! $category->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- end: input -->

                        <!-- begin: input -->
                        <div class="form-group col-md-2">
                            <label for="status">{!! __('flights.status') !!}</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">{!! __('general.select_from_list') !!}</option>
                                <option value="1">{!! __('general.enable') !!}</option>
                                <option value="0">{!! __('general.disabled') !!}</option>
                            </select>
                        </div>
                        <!-- end: input -->

                    </div>

                    <div class="form-actions" style="margin-top: -8px">
                        <button type="button" class="btn btn-sm btn-secondary mr-1" id="flight_search_btn">
                            <i class="la la-search"></i> {!! __('general.search') !!}
                        </button>
                        <button type="submit" class="btn btn-sm btn-light-dark mr-1" id="flight_reset_btn">
                            <i class="la la-close"></i> {!! __('general.reset') !!}
                        </button>

                        {{-- <a href="{!! route('dashboard.flights.export') !!}" type="button" class="btn btn-sm btn-light mr-1">
                            <i class="la la-file-excel-o"></i> {!! __('general.excel') !!}
                        </a>

                        <a href="javascript:void(0)" class="btn btn-sm btn-warning btn-glow mr-1">
                            <span class="la la-file-pdf-o"></span> {!! __('general.pdf') !!}
                        </a> --}}
                    </div>
                </div>

            </form>
        </div>
    </div>
    <!-- end: card content -->

</div> <!-- end: card  -->

@push('scripts')
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>

    <script>
        $('body').on('click', '#flight_search_btn', function(e) {
            e.preventDefault();
            var flight_name = $('#flight_name').val();
            var country_id = $('#country_id').val();
            var city_id = $('#city_id').val();
            var category_id = $('#category_id').val();
            var status = $('#status').val();

            loadData(flight_name, country_id, city_id, category_id, status);
        })


        // reset
        $('body').on('click', '#flight_reset_btn', function(e) {
            e.preventDefault();
            $('#flight_name').val('');
            $(".country_id_select").val('').trigger('change');
            $(".city_id_select").val('').trigger('change');
            $('#category_id').val('');
            $('#status').val('');

            loadData();
        });



        // select 2 language
        var select2Language = {
            inputTooShort: function() {
                return "{!! __('general.inputTooShort') !!}";
            },
            inputTooLong: function() {
                return "{!! __('general.inputTooLong') !!}";
            },
            errorLoading: function() {
                return "{!! __('general.errorLoading') !!}";
            },
            noResults: function() {
                return "<span>{!! __('general.noResults2') !!}";
            },
            searching: function() {
                return " {!! __('general.searching') !!}";
            }
        };


        // select 2
        var countryPath = "{{ route('dashboard.countries.autocomplete.country') }}";
        $(".country_id_select").select2({
            minimumInputLength: 1,
            maximumInputLength: 20,
            placeholder: '{!! __('general.select_from_list') !!}',
            allowClear: true,
            escapeMarkup: function(markup) {
                return markup;
            },

            language: select2Language,

            ajax: {
                url: countryPath,
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    console.log(data);
                    return {
                        results: $.map(data, function(item) {
                            if ('{!! Lang() !!}' === 'en') {
                                return {
                                    text: item.country_en,
                                    id: item.id
                                }
                            } else {
                                return {
                                    text: item.country_ar,
                                    id: item.id
                                }
                            }
                        })
                    };
                },
                cache: true
            }
        });


        // select 2
        var cityPath = "{{ route('dashboard.cities.autocomplete.city') }}";
        $(".city_id_select").select2({
            minimumInputLength: 1,
            maximumInputLength: 20,
            placeholder: '{!! __('general.select_from_list') !!}',
            allowClear: true,
            escapeMarkup: function(markup) {
                return markup;
            },

            language: select2Language,

            ajax: {
                url: cityPath,
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    console.log(data);
                    return {
                        results: $.map(data, function(item) {
                            if ('{!! Lang() !!}' === 'en') {
                                return {
                                    text: item.city_en,
                                    id: item.id
                                }
                            } else {
                                return {
                                    text: item.city_ar,
                                    id: item.id
                                }
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endpush
