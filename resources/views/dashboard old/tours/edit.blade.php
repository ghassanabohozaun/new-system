@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection
@push('style')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/vendors/css/forms/selects/select2.min.css') !!}">
    <link href="{!! asset('vendor/summernote/summernote-bs4.css') !!}" rel="stylesheet">
    @if (Lang() == 'ar')
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css-rtl/my-select2-style.css') !!}">
    @endif
@endpush
@section('content')
    <div class="app-content content">

        <form class="form" action="" method="post" enctype="multipart/form-data" id="updateTourFrom">
            @csrf
            @method('PUT')
            <div class="content-wrapper">
                <!-- begin: content header -->
                <div class="content-header row">
                    <!-- begin: content header left-->
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                        <h3 class="content-header-title mb-0 d-inline-block">{!! __('tours.tours') !!}</h3>
                        <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.index') !!}">
                                            {!! __('dashboard.home') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.tours.index') !!}">
                                            {!! __('tours.tours') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <a href="#">
                                            {!! __('tours.update_tour') !!}
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
                                            {!! __('tours.update_tour') !!}
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



                                                <div class="col-md-12">

                                                    <!-- begin: row id -->
                                                    <div class="row d-none">
                                                        <!-- begin: input -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" id="tourId" name="id"
                                                                    value="{!! $tour->id !!}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->

                                                        <!-- begin: input -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" id="hidden_photo" name="hidden_photo"
                                                                    value="hidden_photo" class="form-control">
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->

                                                    </div>
                                                    <!-- end: row id -->

                                                    <!-- begin: row name  , title-->
                                                    <div class="row">
                                                        <!-- begin: input -->
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="name_ar">{!! __('tours.name_ar') !!}</label>
                                                                <input type="text" id="name_ar" name="name[ar]"
                                                                    value="{!! old('name.ar', $tour->getTranslation('name', 'ar')) !!}" class="form-control"
                                                                    autocomplete="off"
                                                                    placeholder="{!! __('tours.enter_name_ar') !!}">
                                                                <span class="text text-danger" id="name_ar_error">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->

                                                        <!-- begin: input -->
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="name_en">{!! __('tours.name_en') !!}</label>
                                                                <input type="text" id="name_en" name="name[en]"
                                                                    value="{!! old('name.ar', $tour->getTranslation('name', 'en')) !!}" class="form-control "
                                                                    autocomplete="off"
                                                                    placeholder="{!! __('tours.enter_name_en') !!}">
                                                                <span class="text text-danger" id="name_en_error">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->

                                                        <!-- begin: input -->
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="title_ar">{!! __('tours.title_ar') !!}</label>
                                                                <input type="text" id="title_ar" name="title[ar]"
                                                                    value="{!! old('title.ar', $tour->getTranslation('title', 'ar')) !!}" class="form-control"
                                                                    autocomplete="off"
                                                                    placeholder="{!! __('tours.enter_title_ar') !!}">
                                                                <span class="text text-danger" id="title_ar_error">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->

                                                        <!-- begin: input -->
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="title_en">{!! __('tours.title_en') !!}</label>
                                                                <input type="text" id="title_en" name="title[en]"
                                                                    value="{!! old('title.en', $tour->getTranslation('title', 'en')) !!}" class="form-control "
                                                                    autocomplete="off"
                                                                    placeholder="{!! __('tours.enter_title_en') !!}">
                                                                <span class="text text-danger" id="title_en_error">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->


                                                    </div>
                                                    <!-- end: row name  ,title -->




                                                    <!-- begin: row details-->
                                                    <div class="row">
                                                        <!-- begin: input details-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="details_ar">{!! __('tours.details_ar') !!}</label>
                                                                <textarea type="text" rows="5" id="details_ar" name="details[ar]"
                                                                    class="form-control details_ar_summernote" placeholder="{!! __('tours.enter_details_ar') !!}">{!! old('details.ar', $tour->getTranslation('details', 'ar')) !!}</textarea>
                                                                <span class="text text-danger" id="details_ar_error">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->

                                                        <!-- begin: input -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="details_en">{!! __('tours.details_en') !!}</label>
                                                                <textarea type="text" rows="5" id="details_en" name="details[en]"
                                                                    class="form-control details_en_summernote" placeholder="{!! __('tours.enter_details_en') !!}">{!! old('details.en', $tour->getTranslation('details', 'en')) !!}</textarea>
                                                                <span class="text text-danger" id="details_en_error">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->

                                                    </div>
                                                    <!-- end: row details-->

                                                    <!-- begin: row tour_guide_name , price  ,country_id ,city_id-->
                                                    <div class="row">
                                                        <!-- begin: input -->
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label
                                                                    for="tour_guide_name_ar">{!! __('tours.tour_guide_name_ar') !!}</label>
                                                                <input type="text" id="tour_guide_name_ar"
                                                                    name="tour_guide_name[ar]"
                                                                    value="{!! old('tour_guide_name.ar', $tour->getTranslation('tour_guide_name', 'ar')) !!}" class="form-control"
                                                                    autocomplete="off"
                                                                    placeholder="{!! __('tours.enter_tour_guide_name_ar') !!}">
                                                                <span class="text text-danger"
                                                                    id="tour_guide_name_ar_error">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->

                                                        <!-- begin: input -->
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label
                                                                    for="tour_guide_name_en">{!! __('tours.tour_guide_name_en') !!}</label>
                                                                <input type="text" id="tour_guide_name_en"
                                                                    name="tour_guide_name[en]"
                                                                    value="{!! old('tour_guide_name.ar', $tour->getTranslation('tour_guide_name', 'en')) !!}" class="form-control "
                                                                    autocomplete="off"
                                                                    placeholder="{!! __('tours.enter_tour_guide_name_en') !!}">
                                                                <span class="text text-danger"
                                                                    id="tour_guide_name_en_error">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->

                                                        <!-- begin: input -->
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="price">{!! __('tours.price') !!}</label>
                                                                <input type="number" id="price" name="price"
                                                                    value="{!! old('price', $tour->price) !!}" class="form-control"
                                                                    autocomplete="off"
                                                                    placeholder="{!! __('tours.enter_price') !!}">
                                                                <span class="text text-danger" id="price_error">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->

                                                        <!-- begin: input -->
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="country_id">{!! __('tours.country_id') !!}</label>
                                                                <br />
                                                                <select class="country_id_select2 form-control"
                                                                    id="country_id" name="country_id"
                                                                    style="width: 100%">
                                                                    @foreach ($countries as $country)
                                                                        <option value="{{ $country->id }}"
                                                                            {{ old('country_id', $tour->country_id) == $country->id ? 'selected' : '' }}>
                                                                            {{ $country->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text text-danger" id="country_id_error">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->


                                                        <!-- begin: input -->
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="city_id">{!! __('tours.city_id') !!}</label>
                                                                <br />
                                                                <select class="city_id_select2 form-control"
                                                                    id="city_id" name="city_id" style="width: 100%">
                                                                    @foreach ($cities as $city)
                                                                        <option value="{{ $city->id }}"
                                                                            {{ old('city_id', $tour->city_id) == $city->id ? 'selected' : '' }}>
                                                                            {{ $city->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text text-danger" id="city_id_error">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->


                                                    </div>
                                                    <!-- end: row tour_guide_name  ,price -->



                                                    <!-- begin: row photo-->
                                                    <div class="row">
                                                        <!-- begin: input -->
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="photo">{!! __('tours.photo') !!}</label>
                                                                <input type="file" id="single_image_create"
                                                                    accept="image/*" accept="image/*" accept="image/*"
                                                                    name="photo" class="form-control ">
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
                                                                <label for="status">{!! __('tours.status') !!}</label>
                                                                <div class="input-group">
                                                                    <div
                                                                        class="d-inline-block custom-control custom-radio mr-1">
                                                                        <input type="radio"
                                                                            class="custom-control-input bg-success"
                                                                            name="status" id="activeStatusRadio"
                                                                            value="1" @checked($tour->status == 1)>
                                                                        <label class="custom-control-label"
                                                                            for="activeStatusRadio">{!! __('general.enable') !!}
                                                                        </label>
                                                                    </div>
                                                                    <div
                                                                        class="d-inline-block custom-control custom-radio mr-1">
                                                                        <input type="radio"
                                                                            class="custom-control-input bg-danger"
                                                                            name="status" id="inActiveStatusRadio"
                                                                            value="0" @checked($tour->status == 0)>
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
    <script src="{!! asset('vendor/summernote/summernote.js') !!}"></script>



    <script type="text/javascript">
        // select 2
        var countryPath = "{{ route('dashboard.countries.autocomplete.country') }}";
        $(".country_id_select2").select2({
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
        $(".city_id_select2").select2({
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


        // details ar summernote
        $('.details_ar_summernote').summernote({
            placeholder: '{!! __('general.write_here') !!}',
            tabsize: 2,
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });


        // details _en summernote
        $('.details_en_summernote').summernote({
            placeholder: '{!! __('general.write_here') !!}',
            tabsize: 2,
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        // photo
        var lang = "{!! Lang() !!}";
        var logo = "{!! $tour->photo !!}";
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
                "{!! asset('/uploads/tours/' . $tour->photo) !!}",
            ],
        });


        // reset update tour from
        function resetUpdateTicketFrom() {
            $('#name_ar').css('border-color', '');
            $('#name_en').css('border-color', '');
            $('#title_ar').css('border-color', '');
            $('#title_en').css('border-color', '');
            $('#details_ar').css('border-color', '');
            $('#details_en').css('border-color', '');
            $('#price').css('border-color', '');
            $('#tour_guide_name_ar').css('border-color', '');
            $('#tour_guide_name_en').css('border-color', '');
            $('#country_id').css('border-color', '');
            $('#city_id').css('border-color', '');
            $('#photo').css('border-color', '');
            $('#status').css('border-color', '');
            $('.details_ar_summernote').next('.note-editor').removeClass(
                'is-invalid-summernote-editor');
            $('.details_en_summernote').next('.note-editor').removeClass(
                'is-invalid-summernote-editor');

            $('#name_ar_error').text('');
            $('#name_en_error').text('');
            $('#title_ar_error').text('');
            $('#title_en_error').text('');
            $('#details_ar_error').text('');
            $('#details_en_error').text('');
            $('#price_error').text('');
            $('#tour_guide_name_ar_error').text('');
            $('#tour_guide_name_en_error').text('');
            $('#country_id_error').text('');
            $('#city_id_error').text('');
            $('#photo_error').text('');
            $('#status_error').text('');
        }

        // store
        $("#updateTourFrom").on('submit', function(e) {

            e.preventDefault();
            resetUpdateTicketFrom()
            var id = $('#tourId').val();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = "{!! route('dashboard.tours.update', ':id') !!}".replace(':id', id);

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
                        //$('#updateTourFrom')[0].reset();
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
                            $('.details_ar_summernote').next('.note-editor').addClass(
                                'is-invalid-summernote-editor');
                        } else if (key == 'details.en') {
                            key = 'details_en';
                            $('.details_en_summernote').next('.note-editor').addClass(
                                'is-invalid-summernote-editor')
                        } else if (key == 'name.ar') {
                            key = 'name_ar';
                        } else if (key == 'name.en') {
                            key = 'name_en';
                        } else if (key == 'tour_guide_name.ar') {
                            key = 'tour_guide_name_ar';
                        } else if (key == 'tour_guide_name.en') {
                            key = 'tour_guide_name_en';
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
