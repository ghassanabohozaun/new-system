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

        <form class="form" action="" method="post" enctype="multipart/form-data" id="updateTicketFrom">
            @csrf
            @method('PUT')
            <div class="content-wrapper">
                <!-- begin: content header -->
                <div class="content-header row">
                    <!-- begin: content header left-->
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                        <h3 class="content-header-title mb-0 d-inline-block">{!! __('tickets.tickets') !!}</h3>
                        <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.index') !!}">
                                            {!! __('dashboard.home') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.tickets.index') !!}">
                                            {!! __('tickets.tickets') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <a href="#">
                                            {!! __('tickets.update_ticket') !!}
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
                            <button class="btn btn-info  btn-glow px-2" type="submit">
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
                                            {!! __('tickets.update_ticket') !!}
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
                                            <!--begin::table-->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="col-md-12">

                                                        <!-- begin: row id -->
                                                        <div class="row d-none">
                                                            <!-- begin: input -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" id="ticketId" name="id"
                                                                        value="{!! $ticket->id !!}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->

                                                            <!-- begin: input -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" id="hidden_photo"
                                                                        name="hidden_photo" value="hidden_photo"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->

                                                        </div>
                                                        <!-- end: row is -->

                                                        <!-- begin: row title -->
                                                        <div class="row">
                                                            <!-- begin: input -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="title_ar">{!! __('tickets.title_ar') !!}</label>
                                                                    <input type="text" id="title_ar" name="title[ar]"
                                                                        value="{!! old('title.ar', $ticket->getTranslation('title', 'ar')) !!}"
                                                                        class="form-control" autocomplete="off"
                                                                        placeholder="{!! __('tickets.enter_title_ar') !!}">
                                                                    <span class="text text-danger" id="title_ar_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->

                                                            <!-- begin: input -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="title_en">{!! __('tickets.title_en') !!}</label>
                                                                    <input type="text" id="title_en" name="title[en]"
                                                                        value="{!! old('title.en', $ticket->getTranslation('title', 'en')) !!}"
                                                                        class="form-control " autocomplete="off"
                                                                        placeholder="{!! __('tickets.enter_title_en') !!}">
                                                                    <span class="text text-danger" id="title_en_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->


                                                        </div>
                                                        <!-- end: row title -->


                                                        <!-- begin: row details-->
                                                        <div class="row">
                                                            <!-- begin: input details-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="details_ar">{!! __('tickets.details_ar') !!}</label>
                                                                    <textarea type="text" rows="5" id="details_ar" name="details[ar]" class="form-control"
                                                                        placeholder="{!! __('tickets.enter_details_ar') !!}">{!! old('details.ar', $ticket->getTranslation('details', 'ar')) !!}</textarea>
                                                                    <span class="text text-danger" id="details_ar_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->

                                                            <!-- begin: input -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="details_en">{!! __('tickets.details_en') !!}</label>
                                                                    <textarea type="text" rows="5" id="details_en" name="details[en]" class="form-control "
                                                                        placeholder="{!! __('tickets.enter_details_en') !!}">{!! old('details.en', $ticket->getTranslation('details', 'en')) !!}</textarea>
                                                                    <span class="text text-danger" id="details_en_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->
                                                        </div>
                                                        <!-- end: row details-->


                                                        <!-- begin: row price -->
                                                        <div class="row">
                                                            <!-- begin: input -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="price">{!! __('tickets.price') !!}</label>
                                                                    <input type="number" id="price" name="price"
                                                                        value="{!! old('title.ar', $ticket->price) !!}"
                                                                        class="form-control" autocomplete="off"
                                                                        placeholder="{!! __('tickets.enter_price') !!}">
                                                                    <span class="text text-danger" id="price_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->
                                                        </div>
                                                        <!-- end: row price -->


                                                        <!-- begin: row from -->
                                                        <div class="row">

                                                            <!-- begin: input -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="from_country_id">{!! __('tickets.from_country_id') !!}</label>
                                                                    <br />
                                                                    <select class="from_country_id_select2 form-control"
                                                                        id="from_country_id" name="from_country_id"
                                                                        style="width: 100%">
                                                                        @foreach ($countries as $country)
                                                                            <option value="{{ $country->id }}"
                                                                                {{ old('from_country_id', $ticket->from_country_id) == $country->id ? 'selected' : '' }}>
                                                                                {{ $country->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="text text-danger"
                                                                        id="from_country_id_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->


                                                            <!-- begin: input -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="from_city_id">{!! __('tickets.from_city_id') !!}</label>
                                                                    <br />
                                                                    <select class="from_city_id_select2 form-control"
                                                                        id="from_city_id" name="from_city_id"
                                                                        style="width: 100%">
                                                                        @foreach ($cities as $city)
                                                                            <option value="{{ $city->id }}"
                                                                                {{ old('from_city_id', $ticket->from_city_id) == $city->id ? 'selected' : '' }}>
                                                                                {{ $city->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="text text-danger"
                                                                        id="from_city_id_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->
                                                        </div>
                                                        <!-- end: row from -->



                                                        <!-- begin: row to -->
                                                        <div class="row">

                                                            <!-- begin: input -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="to_country_id">{!! __('tickets.to_country_id') !!}</label>
                                                                    <br />
                                                                    <select class="to_country_id_select2 form-control"
                                                                        id="to_country_id" name="to_country_id"
                                                                        style="width: 100%">
                                                                        @foreach ($countries as $country)
                                                                            <option value="{{ $country->id }}"
                                                                                {{ old('to_country_id', $ticket->to_country_id) == $country->id ? 'selected' : '' }}>
                                                                                {{ $country->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="text text-danger"
                                                                        id="to_country_id_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->


                                                            <!-- begin: input -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="to_city_id">{!! __('tickets.to_city_id') !!}</label>
                                                                    <br />
                                                                    <select class="to_city_id_select2 form-control"
                                                                        id="to_city_id" name="to_city_id"
                                                                        style="width: 100%">
                                                                        @foreach ($cities as $city)
                                                                            <option value="{{ $city->id }}"
                                                                                {{ old('to_city_id', $ticket->to_city_id) == $city->id ? 'selected' : '' }}>
                                                                                {{ $city->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="text text-danger" id="to_city_id_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->
                                                        </div>
                                                        <!-- end: row to -->

                                                        <!-- begin: row photo-->
                                                        <div class="row">
                                                            <!-- begin: input -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="photo">{!! __('tickets.photo') !!}</label>
                                                                    <input type="file" id="single_image_create"
                                                                        accept="image/*" name="photo"
                                                                        class="form-control ">
                                                                    <span class="text text-danger" id="photo_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->
                                                        </div>
                                                        <!-- end: row photo-->

                                                        <!-- begin: row  status-->
                                                        <div class="row">

                                                            <!-- begin: input -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="status">{!! __('tickets.status') !!}</label>
                                                                    <div class="input-group">
                                                                        <div
                                                                            class="d-inline-block custom-control custom-radio mr-1">
                                                                            <input type="radio"
                                                                                class="custom-control-input bg-success"
                                                                                name="status" id="activeStatusRadio"
                                                                                value="1"
                                                                                @checked($ticket->status == 1)>
                                                                            <label class="custom-control-label"
                                                                                for="activeStatusRadio">{!! __('general.enable') !!}
                                                                            </label>
                                                                        </div>
                                                                        <div
                                                                            class="d-inline-block custom-control custom-radio mr-1">
                                                                            <input type="radio"
                                                                                class="custom-control-input bg-danger"
                                                                                name="status" id="inActiveStatusRadio"
                                                                                value="0"
                                                                                @checked($ticket->status == 0)>
                                                                            <label class="custom-control-label"
                                                                                for="inActiveStatusRadio">{!! __('general.disabled') !!}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <span class="text text-danger" id="status_error">
                                                                    </span>
                                                                </div>


                                                            </div>
                                                            <!-- end: input -->
                                                        </div>
                                                        <!-- end: row  status-->
                                                    </div>
                                                </div>
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
        $(".from_country_id_select2").select2({
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

        $(".to_country_id_select2").select2({
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


        // select 2
        var cityPath = "{{ route('dashboard.cities.autocomplete.city') }}";
        $(".from_city_id_select2").select2({
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

        $(".to_city_id_select2").select2({
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



        var lang = "{!! Lang() !!}";
        var logo = "{!! $ticket->photo !!}";


        $("#single_image_create").fileinput({
            theme: 'fa5',
            language: lang,
            allowedFileTypes: ['image'],
            maxFileCount: 1,
            enableResumableUpload: true,
            initialPreviewAsData: true,
            allowedFileTypes: ['image'],
            showCancel: false,
            showUpload: false,
            initialPreviewAsData: true,
            initialPreview: logo === '' ? [] : [
                "{!! asset('/uploads/tickets/' . $ticket->photo) !!}",
            ],
        });


        // reset update ticket from
        function resetUpdateTicketFrom() {
            $('#title_ar').css('border-color', '');
            $('#title_en').css('border-color', '');
            $('#details_ar').css('border-color', '');
            $('#details_en').css('border-color', '');
            $('#price').css('border-color', '');
            $('#from_country_id').css('border-color', '');
            $('#from_city_id').css('border-color', '');
            $('#to_country_id').css('border-color', '');
            $('#to_city_id').css('border-color', '');
            $('#photo').css('border-color', '');
            $('#status').css('border-color', '');

            $('#title_ar_error').text('');
            $('#title_en_error').text('');
            $('#details_ar_error').text('');
            $('#details_en_error').text('');
            $('#price_error').text('');
            $('#from_country_id_error').text('');
            $('#from_city_id_error').text('');
            $('#to_country_id_error').text('');
            $('#to_city_id_error').text('');
            $('#photo_error').text('');
            $('#status_error').text('');
        }

        // store
        $("#updateTicketFrom").on('submit', function(e) {

            e.preventDefault();
            resetUpdateTicketFrom()
            var id = $('#ticketId').val();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = "{!! route('dashboard.tickets.update', ':id') !!}".replace(':id', id);

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
                        //$('#updateTicketFrom')[0].reset();
                        resetUpdateTicketFrom()
                        flasher.success("{!! __('general.update_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.update_error_message') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        if (key == 'title.en') {
                            key = 'title_en';
                        } else if (key == 'title.ar') {
                            key = 'title_ar';
                        } else if (key == 'details.ar') {
                            key = 'details_ar';
                        } else if (key == 'details.en') {
                            key = 'details_en';
                        }
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
