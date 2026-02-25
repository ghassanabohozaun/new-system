<div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createCategoryModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="{!! route('dashboard.categories.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_category_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header  mb-2">
                    <h5 class="modal-title test_answer_header" id="createCategoryModalLabel">{!! __('categories.create_new_category') !!}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal header-->
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <!-- begin: row -->
                                <div class="row">
                                    <!-- begin: input -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{!! __('categories.name_ar') !!}</label>
                                            <input type="text" name="name[ar]" id="name_ar" class="form-control"
                                                autocomplete="off" placeholder="{!! __('categories.enter_name_ar') !!}">
                                            <span class="text text-danger">
                                                <strong id="name_ar_error"> </strong>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- end: input -->

                                    <!-- begin: input -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{!! __('categories.name_en') !!}</label>
                                            <input type="text" name="name[en]" id="name_en" class="form-control"
                                                autocomplete="off" placeholder="{!! __('categories.enter_name_en') !!}">
                                            <span class="text text-danger">
                                                <strong id="name_en_error"> </strong>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- end: input -->
                                </div>
                                <!-- end: row -->

                                <!-- begin: row -->
                                <div class="row">
                                    <!-- begin: input -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon">{!! __('categories.icon') !!}</label>
                                            <input type="file" id="single_image_create" name="icon"
                                                accept="image/*" accept="image/*" class="form-control border-primary ">
                                            <span class="text text-danger">
                                                <strong id="icon_error"> </strong>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- end: input -->
                                </div>
                                <!-- end: row -->

                                <!-- begin: row -->
                                <div class="row">
                                    <!-- begin: input -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="logo">{!! __('categories.status') !!}</label>
                                            <div class="input-group">
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" class="custom-control-input bg-success"
                                                        name="status" id="colorRadio1" value="1">
                                                    <label class="custom-control-label"
                                                        for="colorRadio1">{!! __('general.enable') !!}
                                                    </label>
                                                </div>
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" class="custom-control-input bg-danger"
                                                        name="status" id="colorRadio2" value="0">
                                                    <label class="custom-control-label"
                                                        for="colorRadio2">{!! __('general.disabled') !!}
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
                                <!-- end: row -->



                            </div>
                            <!--end: form-->
                        </div>
                    </div>
                </div>
                <!--end::modal header-->

                <!--begin::modal footer-->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info font-weight-bold ">
                        {{ __('general.save') }}
                        <i class="la la-refresh spinner spinner_loading d-none">
                        </i>
                    </button>

                    <button type="button" id="cancel_category_btn" class="btn btn-light-dark font-weight-bold">
                        {{ __('general.cancel') }}</button>
                </div>
                <!--end::modal footer-->

            </div>
        </form>
    </div>
</div>

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

        // reset create category from
        function resetCreateCategoryFrom() {
            $('#name_ar').css('border-color', '');
            $('#name_en').css('border-color', '');
            $('#status').css('border-color', '');
            $('#parent').css('border-color', '');
            $('#icon').css('border-color', '');

            $('#name_ar_error').text('');
            $('#name_en_error').text('');
            $('#status_error').text('');
            $('#parent_error').text('');
            $('#icon_error').text('');
        }

        // cancel
        $('body').on('click', '#cancel_category_btn', function(e) {
            $('#create_category_form')[0].reset();
            $('#createCategoryModal').modal('hide');
            resetCreateCategoryFrom();
        });

        // hide
        $('#createCategoryModal').on('hidden.bs.modal', function(e) {
            $('#create_category_form')[0].reset();
            $('#createCategoryModal').modal('hide');
            resetCreateCategoryFrom();
        });


        // store
        $("#create_category_form").on('submit', function(e) {
            e.preventDefault();
            resetCreateCategoryFrom()

            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            var currentPage = $('#yajra-datatable').DataTable().page();

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
                        $('#yajra-datatable').DataTable().page(currentPage).draw(false);
                        $('#create_category_form')[0].reset();
                        $('#createCategoryModal').modal('hide');
                        resetCreateCategoryFrom()
                        flasher.success("{!! __('general.add_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.add_error_message') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        if (key == 'name.en') {
                            key = 'name_en';
                        } else if (key == 'name.ar') {
                            key = 'name_ar';
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
