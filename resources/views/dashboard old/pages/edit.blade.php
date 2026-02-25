@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@push('style')
    <link href="{!! asset('vendor/summernote/summernote-bs5.css') !!}" rel="stylesheet">
@endpush

@section('content')
    <div class="app-content content">
        <form id="updatePageForm" class="form" action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="content-wrapper">
                <!-- begin: content header -->
                <div class="content-header row">
                    <!-- begin: content header left-->
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                        <h3 class="content-header-title mb-0 d-inline-block">{!! __('pages.pages') !!}</h3>
                        <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.index') !!}">
                                            {!! __('dashboard.home') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.pages.index') !!}">
                                            {!! __('pages.pages') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <a href="#">
                                            {!! __('pages.update_page') !!}
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
                            <button type="submit" class="btn btn-info btn-glow px-2">
                                <i class="la la-save"></i>
                                {!! __('general.save') !!}
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
                                            {!! __('pages.update_page') !!}
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

                                            <div class="form-body">
                                                <!-- begin: row -->
                                                <div class="row ">
                                                    <!-- begin: input -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" id='pageId' name="id" readonly
                                                                value="{!! $page->id !!}" class="form-control">

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end: row -->

                                                <!-- begin: row  title -->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title_ar">{!! __('pages.title_ar') !!}</label>
                                                            <input type="text" id="title_ar" name="title[ar]"
                                                                value="{!! old('title.ar', $page->getTranslation('title', 'ar')) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('pages.enter_title_ar') !!}">
                                                            <span class="text text-danger">
                                                                <strong id="title_ar_error"> </strong>
                                                            </span>

                                                        </div>
                                                    </div>
                                                    <!-- end: input -->

                                                    <!-- begin: input -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title_en">{!! __('pages.title_en') !!}</label>
                                                            <input type="text" id="title_en" name="title[en]"
                                                                value="{!! old('title.en', $page->getTranslation('title', 'en')) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('pages.enter_title_en') !!}">
                                                            <span class="text text-danger">
                                                                <strong id="title_en_error"> </strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row  title -->

                                                <!-- begin: row  details ar-->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="details_ar">{!! __('pages.details_ar') !!}</label>
                                                            <textarea rows="5" id="details_ar" name="details[ar]" class="form-control details_ar_summernote"
                                                                placeholder="{!! __('pages.enter_details_ar') !!}">{!! old('details.ar', $page->getTranslation('details', 'ar')) !!}</textarea>
                                                            <span class="text text-danger">
                                                                <strong id="details_ar_error"> </strong>
                                                            </span>

                                                        </div>
                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row  details ar-->

                                                <!-- begin: row  details en-->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="details_en">{!! __('pages.details_en') !!}</label>
                                                            <textarea rows="5" id="details_en" name="details[en]" class="form-control details_en_summernote"
                                                                placeholder="{!! __('pages.enter_details_en') !!}">{!! old('details.en', $page->getTranslation('details', 'en')) !!}</textarea>
                                                            <span class="text text-danger">
                                                                <strong id="details_en_error"> </strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row  details en-->

                                                <!-- begin: row  photo-->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="photo">{!! __('pages.photo') !!}</label>
                                                            <input type="file" id="single_image_edit" name="photo"
                                                                class="form-control">
                                                            <span class="text text-danger">
                                                                <strong id="photo_error"> </strong>
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
                                                            <label for="logo">{!! __('pages.status') !!}</label>
                                                            <div class="input-group">
                                                                <div
                                                                    class="d-inline-block custom-control custom-radio mr-1">
                                                                    <input type="radio"
                                                                        class="custom-control-input bg-success"
                                                                        name="status" id="activeStatusRadio"
                                                                        value="1" @checked($page->status == 1)>
                                                                    <label class="custom-control-label"
                                                                        for="activeStatusRadio">{!! __('general.active') !!}
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="d-inline-block custom-control custom-radio mr-1">
                                                                    <input type="radio"
                                                                        class="custom-control-input bg-danger"
                                                                        name="status" id="inActiveStatusRadio"
                                                                        value="0" @checked($page->status == 0)>
                                                                    <label class="custom-control-label"
                                                                        for="inActiveStatusRadio">{!! __('general.inactive') !!}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <span class="text text-danger">
                                                                <strong id="status_error"> </strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row status-->

                                            </div>
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
    <script src="{!! asset('vendor/summernote/summernote.js') !!}"></script>
    <script type="text/javascript">
        //properties
        var lang = "{!! Lang() !!}";
        var page = "{!! $page->photo !!}";

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

        // details en summernote
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



        // file input
        $("#single_image_edit").fileinput({
            theme: 'fa5',
            language: lang,
            allowedFileTypes: ['image'],
            maxFileCount: 1,
            enableResumableUpload: true,
            initialPreviewAsData: true,
            allowedFileTypes: ['image'],
            showCancel: true,
            showUpload: false,
            initialPreviewAsData: true,
            initialPreview: page === '' ? [] : [
                "{!! asset('/uploads/pages/' . $page->photo) !!}",
            ],
        });

        $('#single_image_edit').on('filecleared', function(event) {
            event.preventDefault();
            var id = $('#pageId').val();
            $.ajax({
                url: "{{ route('dashboard.pages.delete.photo') }}",
                data: {
                    id: id
                },
                type: 'post',
                dataType: 'JSON',
                success: function(data) {
                    if (data.status == true) {
                        flasher.success("{!! __('general.delete_image_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.delete_image_error_message') !!}");
                    }
                }, //end success
            })

        });


        // reset form
        function resetUpdatePageFrom() {
            $('#title_ar').css('border-color', '');
            $('#title_en').css('border-color', '');
            $('#details_ar').css('border-color', '');
            $('#details_en').css('border-color', '');
            $('#photo').css('border-color', '');
            $('#status').css('border-color', '');
            $('.details_ar_summernote').next('.note-editor').removeClass(
                'is-invalid-summernote-editor');
            $('.details_en_summernote').next('.note-editor').removeClass(
                'is-invalid-summernote-editor');

            $('#title_ar_error').text('');
            $('#title_en_error').text('');
            $('#details_ar_error').text('');
            $('#details_en_error').text('');
            $('#photo_error').text('');
            $('#status_error').text('');
        }

        // update
        $('#updatePageForm').on('submit', function(e) {
            e.preventDefault();
            resetUpdatePageFrom();

            var id = $('#pageId').val();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = "{!! route('dashboard.pages.update', ':id') !!}".replace(':id', id);

            $.ajax({
                url: url,
                type: type,
                data: data,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data.status == true) {
                        resetUpdatePageFrom();
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
                                'is-invalid-summernote-editor');
                        }

                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                    });
                }, //end error

            }); // end ajax
        }); //end submit
    </script>
@endpush
