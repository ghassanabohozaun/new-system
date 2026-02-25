@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/vendors/css/forms/selects/select2.min.css') !!}">
    @if (Lang() == 'ar')
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css-rtl/my-select2-style.css') !!}">
    @endif
@endpush
@section('content')
    <div class="app-content content">

        <form class="form" action="{!! route('dashboard.reservations.store') !!}" method="post" enctype="multipart/form-data"
            id="storeReservationForm">
            @csrf
            <div class="content-wrapper">
                <!-- begin: content header -->
                <div class="content-header row">
                    <!-- begin: content header left-->
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                        <h3 class="content-header-title mb-0 d-inline-block">{!! __('reservations.reservations') !!}</h3>
                        <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.index') !!}">
                                            {!! __('dashboard.home') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.reservations.index') !!}">
                                            {!! __('reservations.reservations') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <a href="#">
                                            {!! __('reservations.create_new_reservation') !!}
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- end: content header left-->

                    <!-- begin: content header right-->
                    <div class="content-header-right col-md-6 col-12">
                        <div class="float-md-right mb-2">
                            <button class="btn btn-info btn-glow px-2" type="submit">
                                <i class="la la-save"></i>
                                {!! __('general.save') !!}
                                <i class="la la-refresh spinner spinner_loading d-none">
                                </i>
                            </button>
                        </div>
                    </div>
                    <!-- end: content header right-->


                </div> <!-- end :content header -->

                <!-- begin: content body -->
                <div class="content-body">

                    <section id="basic-form-layouts">
                        <div class="row match-height">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- begin: card header -->
                                    <div class="card-header">
                                        <h4 class="card-title" id="basic-layout-colored-form-control">
                                            {!! __('reservations.create_new_reservation') !!}
                                        </h4>
                                        <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="reload-form"><i class="ft-rotate-cw"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end: card header -->

                                    <!-- begin: card content -->
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <!--begin::form-->


                                            <!-- begin: row  -->
                                            <div class="row">
                                                <!-- begin: input -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="flight_id">{!! __('reservations.flight_id') !!}</label>
                                                        <select id="flight_id" name="flight_id" class="form-control">
                                                            <option value="" selected='selected'>
                                                                {!! __('general.select_from_list') !!}
                                                            </option>
                                                            @foreach ($flights as $key => $flight)
                                                                <option value="{!! $flight->id !!}">
                                                                    {!! $flight->name !!}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text text-danger" id="flight_id_error">
                                                        </span>

                                                    </div>
                                                </div>
                                                <!-- end: input -->

                                                <!-- begin: input -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="service">{!! __('reservations.service') !!}</label>
                                                        <select id="service" name="service" class="form-control">
                                                            <option value="" selected='selected'>
                                                                {!! __('general.select_from_list') !!}
                                                            </option>

                                                            <option value="flight">{!! __('reservations.flight') !!}
                                                            </option>

                                                            <option value="tour">{!! __('reservations.tour') !!}
                                                            </option>

                                                            <option value="ticket">{!! __('reservations.ticket') !!}
                                                            </option>

                                                        </select>
                                                        <span class="text text-danger" id="service_error">
                                                        </span>

                                                    </div>
                                                </div>
                                                <!-- end: input -->

                                                <!-- begin: input -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="client_name">{!! __('reservations.client_name') !!}</label>
                                                        <input type="text" id="client_name" name="client_name"
                                                            class="form-control" autocomplete="off"
                                                            placeholder="{!! __('reservations.enter_client_name') !!}">
                                                        <span class="text text-danger" id="client_name_error">
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- end: input -->

                                                <!-- begin: input -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="client_passport_number">{!! __('reservations.client_passport_number') !!}</label>
                                                        <input type="text" id="client_passport_number"
                                                            name="client_passport_number" class="form-control"
                                                            autocomplete="off" placeholder="{!! __('reservations.enter_client_passport_number') !!}">
                                                        <span class="text text-danger" id="client_passport_number_error">
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- end: input -->


                                            </div>
                                            <!-- end: row -->


                                            <!-- begin: row  -->
                                            <div class="row">
                                                <!-- begin: input -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="client_mobile">{!! __('reservations.client_mobile') !!}</label>
                                                        <input type="text" id="client_mobile" name="client_mobile"
                                                            class="form-control" autocomplete="off"
                                                            placeholder="{!! __('reservations.enter_client_mobile') !!}">
                                                        <span class="text text-danger" id="client_mobile_error">
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- end: input -->

                                                <!-- begin: input -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="client_email">{!! __('reservations.client_email') !!}</label>
                                                        <input type="text" id="client_email" name="client_email"
                                                            class="form-control" autocomplete="off"
                                                            placeholder="{!! __('reservations.enter_client_email') !!}">
                                                        <span class="text text-danger" id="client_email_error">
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- end: input -->
                                            </div>
                                            <!-- end: row -->

                                            <!-- begin: row  -->
                                            <div class="row">

                                                <!-- begin: input -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="number_of_adult">{!! __('reservations.number_of_adult') !!}</label>
                                                        <input type="number" id="number_of_adult" name="number_of_adult"
                                                            class="form-control" autocomplete="off"
                                                            placeholder="{!! __('reservations.enter_number_of_adult') !!}">
                                                        <span class="text text-danger" id="number_of_adult_error">
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- end: input -->

                                                <!-- begin: input -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="number_of_children">{!! __('reservations.number_of_children') !!}</label>
                                                        <input type="number" id="number_of_children"
                                                            name="number_of_children" class="form-control"
                                                            autocomplete="off" placeholder="{!! __('reservations.enter_number_of_children') !!}">
                                                        <span class="text text-danger" id="number_of_children_error">
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- end: input -->

                                                <!-- begin: input -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="number_of_babies">{!! __('reservations.number_of_babies') !!}</label>
                                                        <input type="number" id="number_of_babies"
                                                            name="number_of_babies" class="form-control"
                                                            autocomplete="off" placeholder="{!! __('reservations.enter_number_of_babies') !!}">
                                                        <span class="text text-danger" id="number_of_babies_error">
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- end: input -->

                                                <!-- begin: input -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="nationality">{!! __('reservations.nationality') !!}</label>
                                                        <input type="text" id="nationality" name="nationality"
                                                            class="form-control" autocomplete="off"
                                                            placeholder="{!! __('reservations.enter_nationality') !!}">
                                                        <span class="text text-danger" id="nationality_error">
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- end: input -->


                                            </div>
                                            <!-- end: row -->


                                            <!-- begin: row  -->
                                            <div class="row">
                                                <!-- begin: input -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="depature_country_id">{!! __('reservations.depature_country_id') !!}</label>
                                                        <br />
                                                        <select class="depature_country_id_select form-control"
                                                            id="depature_country_id" name="depature_country_id"
                                                            style="width: 100%">
                                                        </select>
                                                        <span class="text text-danger" id="depature_country_id_error">
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- end: input -->

                                                <!-- begin: input -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="depature_date">{!! __('reservations.depature_date') !!}</label>
                                                        <input type="date" id="depature_date" name="depature_date"
                                                            class="form-control" autocomplete="off"
                                                            placeholder="{!! __('reservations.enter_depature_date') !!}">
                                                        <span class="text text-danger" id="depature_date_error">
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- end: input -->

                                                <!-- begin: input -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="return_date">{!! __('reservations.return_date') !!}</label>
                                                        <input type="date" id="return_date" name="return_date"
                                                            class="form-control" autocomplete="off"
                                                            placeholder="{!! __('reservations.enter_return_date') !!}">
                                                        <span class="text text-danger" id="return_date_error">
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- end: input -->
                                            </div>
                                            <!-- end: row -->



                                            <!-- begin: row  -->
                                            <div class="row">
                                                <!-- begin: input -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="ticket_id">{!! __('reservations.ticket_id') !!}</label>
                                                        <select id="ticket_id" name="ticket_id" class="form-control">
                                                            <option value="" selected='selected'>
                                                                {!! __('general.select_from_list') !!}
                                                            </option>
                                                            @foreach ($tickets as $key => $ticket)
                                                                <option value="{!! $ticket->id !!}">
                                                                    {!! $ticket->title !!}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text text-danger" id="ticket_id_error">
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- end: input -->

                                                <!-- begin: input -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="economy_class_name">{!! __('reservations.economy_class_name') !!}</label>
                                                        <input type="text" id="economy_class_name"
                                                            name="economy_class_name" class="form-control"
                                                            autocomplete="off" placeholder="{!! __('reservations.enter_economy_class_name') !!}">
                                                        <span class="text text-danger" id="economy_class_name_error">
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- end: input -->


                                                <!-- begin: input -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="economy_class_type">{!! __('reservations.economy_class_type') !!}</label>
                                                        <select id="economy_class_type" name="economy_class_type"
                                                            class="form-control">
                                                            <option value="" selected='selected'>
                                                                {!! __('general.select_from_list') !!}
                                                            </option>

                                                            <option value="transit">{!! __('reservations.transit') !!}
                                                            </option>

                                                            <option value="direct_flight">{!! __('reservations.direct_flight') !!}
                                                            </option>

                                                        </select>
                                                        <span class="text text-danger" id="economy_class_type_error">
                                                        </span>

                                                    </div>
                                                </div>
                                                <!-- end: input -->


                                            </div>
                                            <!-- end: row -->

                                            <!-- begin: row  -->
                                            <div class="row">
                                                <!-- begin: input -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="notes">{!! __('reservations.notes') !!}</label>
                                                        <textarea id="notes" name="notes" rows="6" class="form-control" autocomplete="off"
                                                            placeholder="{!! __('reservations.enter_notes') !!}"></textarea>
                                                        <span class="text text-danger" id="notes_error">
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- end: input -->
                                            </div>
                                            <!-- end: row -->



                                            <!--end: form-->
                                        </div>
                                        <!--end::table-->
                                    </div>
                                    <!-- end: card content -->
                                </div>
                            </div> <!-- end: card  -->
                        </div><!-- end: row  -->
                    </section><!-- end: sections  -->
                </div><!-- end: content body  -->
            </div> <!-- end: content wrapper  -->
        </form>
    </div><!-- end: content app  -->
@endsection
@push('scripts')
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>

    <script type="text/javascript">
        // select 2
        var countryPath = "{{ route('dashboard.countries.autocomplete.country') }}";
        $(".depature_country_id_select").select2({
            minimumInputLength: 1,
            maximumInputLength: 20,
            placeholder: '{!! __('general.select_from_list') !!}',
            allowClear: true,
            escapeMarkup: function(markup) {
                return markup;
            },
            language: {
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
            },

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



        // reset create slider from
        function resetCreateTicketFrom() {
            $('#flight_id').css('border-color', '');
            $('#service').css('border-color', '');
            $('#client_name').css('border-color', '');
            $('#client_mobile').css('border-color', '');
            $('#client_email').css('border-color', '');
            $('#client_passport_number').css('border-color', '');
            $('#number_of_adult').css('border-color', '');
            $('#number_of_children').css('border-color', '');
            $('#number_of_babies').css('border-color', '');
            $('#nationality').css('border-color', '');
            $('#depature_country_id').css('border-color', '');
            $('#depature_date').css('border-color', '');
            $('#return_date').css('border-color', '');
            $('#ticket_id').css('border-color', '');
            $('#economy_class_name').css('border-color', '');
            $('#economy_class_type').css('border-color', '');
            $('#notes').css('border-color', '');

            $('#flight_id_error').text('');
            $('#service_error').text('');
            $('#client_name_error').text('');
            $('#client_mobile_error').text('');
            $('#client_email_error').text('');
            $('#client_passport_number_error').text('');
            $('#number_of_adult_error').text('');
            $('#number_of_children_error').text('');
            $('#number_of_babies_error').text('');
            $('#nationality_error').text('');
            $('#depature_country_id_error').text('');
            $('#depature_date_error').text('');
            $('#return_date_error').text('');
            $('#ticket_id_error').text('');
            $('#economy_class_name_error').text('');
            $('#economy_class_type_error').text('');
            $('#notes_error').text('');

        }

        // store
        $("#storeReservationForm").on('submit', function(e) {

            e.preventDefault();
            resetCreateTicketFrom()
            var data = new FormData(this);

            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                type: type,
                data: data,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.spinner_loading').removeClass('d-none');
                },
                success: function(data) {
                    if (data.status == true) {
                        console.log(data);
                        $('#storeReservationForm')[0].reset();
                        $(".depature_country_id_select").val('').trigger('change');
                        resetCreateTicketFrom()
                        flasher.success("{!! __('general.add_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.add_error_message') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');

                    });
                }, //end error
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }

            }); // end ajax


        });
    </script>
@endpush
