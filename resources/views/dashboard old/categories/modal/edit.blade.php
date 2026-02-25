<div class="modal fade" id="updateCategoryModal" tabindex="-1" role="dialog" aria-labelledby="updateCategoryModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="{!! route('dashboard.categories.store') !!}" method="POST" enctype="multipart/form-data"
            id='update_category_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header  mb-2">
                    <h5 class="modal-title test_answer_header" id="updateCategoryModalLabel">{!! __('categories.create_new_category') !!}
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="id_edit" name="id" class="form-control">
                                        </div>
                                    </div>
                                    <!-- end: input -->
                                </div>
                                <!-- end: row -->

                                <!-- begin: row -->
                                <div class="row">
                                    <!-- begin: input -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_ar">{!! __('categories.name_ar') !!}</label>
                                            <input type="text" name="name[ar]" id="name_ar_edit" class="form-control"
                                                autocomplete="off" placeholder="{!! __('categories.enter_name_ar') !!}">
                                            <span class="text text-danger">
                                                <strong id="name_ar_error_edit"> </strong>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- end: input -->

                                    <!-- begin: input -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_en">{!! __('categories.name_en') !!}</label>
                                            <input type="text" name="name[en]" id="name_en_edit" class="form-control"
                                                autocomplete="off" placeholder="{!! __('categories.enter_name_en') !!}">
                                            <span class="text text-danger">
                                                <strong id="name_en_error_edit"> </strong>
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
                                            <input type="file" id="single_image_update" name="icon"
                                                accept="image/*"
                                                class="form-control border-primary single_image_update">
                                            <span class="text text-danger">
                                                <strong id="icon_error_edit"> </strong>
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
                                            <label for="status">{!! __('admins.status') !!}</label>
                                            <div class="input-group">
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" class="custom-control-input bg-success"
                                                        name="status" id="status_active_edit" value="1">
                                                    <label class="custom-control-label"
                                                        for="status_active_edit">{!! __('general.enable') !!}
                                                    </label>
                                                </div>
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" class="custom-control-input bg-danger"
                                                        name="status" id="status_inactive_edit" value="0">
                                                    <label class="custom-control-label"
                                                        for="status_inactive_edit">{!! __('general.disabled') !!}
                                                    </label>
                                                </div>
                                            </div>
                                            <span class="text text-danger">
                                                <strong id="status_error_edit"> </strong>
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
                        {{ trans('general.save') }}
                    </button>

                    <button type="button" id="cancel_category_btn_edit" class="btn btn-light-dark font-weight-bold">
                        {{ trans('general.cancel') }}</button>
                </div>
                <!--end::modal footer-->

            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        // show edit modal

        var lang = "{!! Lang() !!}";

        $('body').on('click', '.edit_category_button', function(e) {
            e.preventDefault();






            var category_id = $(this).attr('category-id');
            var category_name_ar = $(this).attr('category-name-ar');
            var category_name_en = $(this).attr('category-name-en');
            var category_status = $(this).attr('category-status');
            var category_icon = $(this).attr('category-icon');
            var icon = category_icon;



            $('#id_edit').val(category_id);
            $('#name_ar_edit').val(category_name_ar);
            $('#name_en_edit').val(category_name_en);


            console.log("{!! asset('/uploads/categories/icon') !!}".replace('icon', icon));


            $(".single_image_update").fileinput({
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
                initialPreview: [
                    "{!! asset('/uploads/categories/icon') !!}".replace('icon', icon)
                ],
            });



            if (category_status == 1) {
                $('#status_active_edit').prop('checked', true);
            } else {
                $('#status_inactive_edit').prop('checked', true);
            }

            $('#updateCategoryModal').modal('show');
        })


        // reset create category from
        function resetCreateCategoryFrom() {
            $('#name_ar_edit').css('border-color', '');
            $('#name_en_edit').css('border-color', '');
            $('#status_edit').css('border-color', '');
            $('#parent_edit').css('border-color', '');
            $('#icon_edit').css('border-color', '');

            $('#name_ar_error_edit').text('');
            $('#name_en_error_edit').text('');
            $('#status_error_edit').text('');
            $('#parent_error_edit').text('');
            $('#icon_error_edit').text('');


        }

        // cancel
        $('body').on('click', '#cancel_category_btn_edit', function(e) {
            $('#update_category_form')[0].reset();
            $('#updateCategoryModal').modal('hide');
            location.reload();
            resetCreateCategoryFrom();
        });

        // hide
        $('#updateCategoryModal').on('hidden.bs.modal', function(e) {
            $('#update_category_form')[0].reset();
            $('#updateCategoryModal').modal('hide');
            location.reload();
            resetCreateCategoryFrom();
        });


        // store
        $("#update_category_form").on('submit', function(e) {
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
                success: function(data) {
                    if (data.status == true) {
                        console.log(data);
                        $('#yajra-datatable').DataTable().page(currentPage).draw(false);
                        $('#update_category_form')[0].reset();
                        $('#updateCategoryModal').modal('hide');
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
                        $('#' + key + '_error_edit').text(value[0]);
                        $('#' + key + '_edit').css('border-color', '#F64E60');
                    });
                }, //end error

            }); // end ajax


        });
    </script>
@endpush
