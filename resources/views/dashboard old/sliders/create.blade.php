@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="app-content content">

        <form class="form" action="{!! route('dashboard.sliders.store') !!}" method="post" enctype="multipart/form-data" id="storeSliderFrom">
            @csrf
            <div class="content-wrapper">
                <!-- begin: content header -->
                <div class="content-header row">
                    <!-- begin: content header left-->
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                        <h3 class="content-header-title mb-0 d-inline-block">{!! __('sliders.sliders') !!}</h3>
                        <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.index') !!}">
                                            {!! __('dashboard.home') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.sliders.index') !!}">
                                            {!! __('sliders.sliders') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <a href="#">
                                            {!! __('sliders.create_new_slider') !!}
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
                                            {!! __('sliders.create_new_slider') !!}
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

                                                        <!-- begin: row title -->
                                                        <div class="row">
                                                            <!-- begin: input -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="title_ar">{!! __('sliders.title_ar') !!}</label>
                                                                    <input type="text" id="title_ar" name="title[ar]"
                                                                        value="{!! old('title.ar') !!}"
                                                                        class="form-control" autocomplete="off"
                                                                        placeholder="{!! __('sliders.enter_title_ar') !!}">
                                                                    <span class="text text-danger" id="title_ar_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->

                                                            <!-- begin: input -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="title_en">{!! __('sliders.title_en') !!}</label>
                                                                    <input type="text" id="title_en" name="title[en]"
                                                                        value="{!! old('title.en') !!}"
                                                                        class="form-control " autocomplete="off"
                                                                        placeholder="{!! __('sliders.enter_title_en') !!}">
                                                                    <span class="text text-danger" id="title_en_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->


                                                        </div>
                                                        <!-- end: row title -->

                                                        <!-- begin: row url -->
                                                        <div class="row">
                                                            <!-- begin: input -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="url_ar">{!! __('sliders.url_ar') !!}</label>
                                                                    <input type="text" id="url_ar" name="url[ar]"
                                                                        value="{!! old('url.ar') !!}"
                                                                        class="form-control" autocomplete="off"
                                                                        placeholder="{!! __('sliders.enter_url_ar') !!}">
                                                                    <span class="text text-danger" id="url_ar_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->

                                                            <!-- begin: input -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="url_en">{!! __('sliders.url_en') !!}</label>
                                                                    <input type="text" id="url_en" name="url[en]"
                                                                        value="{!! old('url.en') !!}"
                                                                        class="form-control " autocomplete="off"
                                                                        placeholder="{!! __('sliders.enter_url_en') !!}">
                                                                    <span class="text text-danger" id="url_en_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->


                                                        </div>
                                                        <!-- end: row url -->


                                                        <!-- begin: row -->
                                                        <div class="row">
                                                            <!-- begin: input details-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="details_ar">{!! __('sliders.details_ar') !!}</label>
                                                                    <textarea type="text" rows="5" id="details_ar" name="details[ar]" class="form-control"
                                                                        placeholder="{!! __('sliders.enter_details_ar') !!}"></textarea>
                                                                    <span class="text text-danger" id="details_ar_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->

                                                            <!-- begin: input -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="details_en">{!! __('sliders.details_en') !!}</label>
                                                                    <textarea type="text" rows="5" id="details_en" name="details[en]" class="form-control "
                                                                        placeholder="{!! __('sliders.enter_details_en') !!}"></textarea>
                                                                    <span class="text text-danger" id="details_en_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->
                                                        </div>
                                                        <!-- end: row details-->


                                                        <!-- begin: row  status-->
                                                        <div class="row">

                                                            <!-- begin: input -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="status">{!! __('sliders.status') !!}</label>
                                                                    <div class="input-group">
                                                                        <div
                                                                            class="d-inline-block custom-control custom-radio mr-1">
                                                                            <input type="radio"
                                                                                class="custom-control-input bg-success"
                                                                                name="status" id="activeStatusRadio"
                                                                                value="1">
                                                                            <label class="custom-control-label"
                                                                                for="activeStatusRadio">{!! __('general.active') !!}
                                                                            </label>
                                                                        </div>
                                                                        <div
                                                                            class="d-inline-block custom-control custom-radio mr-1">
                                                                            <input type="radio"
                                                                                class="custom-control-input bg-danger"
                                                                                name="status" id="inActiveStatusRadio"
                                                                                value="0">
                                                                            <label class="custom-control-label"
                                                                                for="inActiveStatusRadio">{!! __('general.inactive') !!}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <span class="text text-danger" id="status_error">
                                                                    </span>
                                                                </div>


                                                            </div>
                                                            <!-- end: input -->

                                                            <!-- begin: input -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="details_status">{!! __('sliders.details_status') !!}</label>
                                                                    <div class="input-group">
                                                                        <div
                                                                            class="d-inline-block custom-control custom-radio mr-1">
                                                                            <input type="radio"
                                                                                class="custom-control-input bg-success"
                                                                                name="details_status"
                                                                                id="activeDetailsStatusRadio"
                                                                                value="1">
                                                                            <label class="custom-control-label"
                                                                                for="activeDetailsStatusRadio">{!! __('general.active') !!}
                                                                            </label>
                                                                        </div>
                                                                        <div
                                                                            class="d-inline-block custom-control custom-radio mr-1">
                                                                            <input type="radio"
                                                                                class="custom-control-input bg-danger"
                                                                                name="details_status"
                                                                                id="inActiveDetailsStatusRadio"
                                                                                value="0">
                                                                            <label class="custom-control-label"
                                                                                for="inActiveDetailsStatusRadio">{!! __('general.inactive') !!}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->

                                                            <!-- begin: input -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="button_status">{!! __('sliders.button_status') !!}</label>
                                                                    <div class="input-group">
                                                                        <div
                                                                            class="d-inline-block custom-control custom-radio mr-1">
                                                                            <input type="radio"
                                                                                class="custom-control-input bg-success"
                                                                                name="button_status"
                                                                                id="activeButtonStatusRadio"
                                                                                value="1">
                                                                            <label class="custom-control-label"
                                                                                for="activeButtonStatusRadio">{!! __('general.active') !!}
                                                                            </label>
                                                                        </div>
                                                                        <div
                                                                            class="d-inline-block custom-control custom-radio mr-1">
                                                                            <input type="radio"
                                                                                class="custom-control-input bg-danger"
                                                                                name="button_status"
                                                                                id="inActiveButtonStatusRadio"
                                                                                value="0">
                                                                            <label class="custom-control-label"
                                                                                for="inActiveButtonStatusRadio">{!! __('general.inactive') !!}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->
                                                        </div>
                                                        <!-- end: row  status-->

                                                        <!-- begin: row  photo-->
                                                        <div class="row">
                                                            <!-- begin: input -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="photo">{!! __('sliders.photo') !!}</label>
                                                                    <input type="file" id="single_image_create"
                                                                        accept="image/*" name="photo"
                                                                        class="form-control ">
                                                                    <span class="text text-warning">
                                                                        <strong>{!! __('sliders.slider_size') !!}</strong>
                                                                    </span>
                                                                    <span class="text text-danger" id="photo_error">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- end: input -->
                                                        </div>
                                                        <!-- end: row  photo -->





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
    <script type="text/javascript">
        var lang = "{!! Lang() !!}";
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
        });


        // reset create slider from
        function resetCreateSliderFrom() {
            $('#title_ar').css('border-color', '');
            $('#title_en').css('border-color', '');
            $('#details_ar').css('border-color', '');
            $('#details_en').css('border-color', '');
            $('#url_en').css('border-color', '');
            $('#url_ar').css('border-color', '');
            $('#order').css('border-color', '');
            $('#photo').css('border-color', '');
            $('#status').css('border-color', '');

            $('#title_ar_error').text('');
            $('#title_en_error').text('');
            $('#details_ar_error').text('');
            $('#details_en_error').text('');
            $('#url_en_error').text('');
            $('#url_ar_error').text('');
            $('#order_error').text('');
            $('#photo_error').text('');
            $('#status_error').text('');

        }
        // store
        $("#storeSliderFrom").on('submit', function(e) {

            e.preventDefault();
            resetCreateSliderFrom()
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
                        $('#storeSliderFrom')[0].reset();
                        resetCreateSliderFrom()
                        flasher.success("{!! __('general.add_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.add_error_message') !!}");
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
                        } else if (key == 'url.en') {
                            key = 'url_en';
                        } else if (key == 'url.en') {
                            key = 'url_en';
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
