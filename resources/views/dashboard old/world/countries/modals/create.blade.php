<div class="modal fade" id="createCountryModal" role="dialog" aria-labelledby="createCountryModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="{!! route('dashboard.countries.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_country_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="createCountryModalLabel">{!! __('world.create_new_country') !!}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal body-->
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-12">

                            <!-- begin: row -->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">{!! __('world.country_name_ar') !!}</label>
                                        <input type="text" id="name_ar" name="name[ar]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('world.enter_country_name_ar') !!}">
                                        <span class="text text-danger">
                                            <strong id="name_ar_error"></strong>
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
                                        <label for="name">{!! __('world.country_name_en') !!}</label>
                                        <input type="text" id="name_en" name="name[en]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('world.enter_country_name_en') !!}">
                                        <span class="text text-danger">
                                            <strong id="name_en_error"></strong>
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
                                        <label for="name">{!! __('world.phone_code') !!}</label>
                                        <input type="text" id="phone_code" name="phone_code"
                                            value="{!! old('phone_code') !!}" class="form-control" autocomplete="off"
                                            placeholder="{!! __('world.enter_phone_code') !!}">
                                        <span class="text text-danger">
                                            <strong id="phone_code_error"></strong>
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
                                        <label for="name">{!! __('world.flag_code') !!}</label>
                                        <input type="text" id="flag_code" name="flag_code"
                                            value="{!! old('flag_code') !!}" class="form-control" autocomplete="off"
                                            placeholder="{!! __('world.enter_flag_code') !!}">
                                        <span class="text text-danger">
                                            <strong id="flag_code_error"></strong>
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
                                        <label for="status">{!! __('world.status') !!}</label>
                                        <div class="input-group">
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" class="custom-control-input bg-success"
                                                    name="status" id="colorRadio1" value="1">
                                                <label class="custom-control-label"
                                                    for="colorRadio1">{!! __('general.active') !!}
                                                </label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" class="custom-control-input bg-danger"
                                                    name="status" id="colorRadio2" value="0">
                                                <label class="custom-control-label"
                                                    for="colorRadio2">{!! __('general.inactive') !!}
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

                            <!-- end: input -->
                        </div>
                        <!-- end: row -->

                    </div>
                </div>
                <!--end: form-->

                <!--begin::modal footer-->
                <div class="modal-footer">
                    <button type="submit" id="create_country_btn" class="btn btn-info font-weight-bold ">
                        <span class="la la-save"></span>
                        {{ __('general.save') }}
                        <i class="la la-refresh spinner spinner_loading d-none">
                        </i>
                    </button>

                    <button type="button" id="cancel_country_btn" class="btn btn-light-dark font-weight-bold"
                        data-dismiss="modal">
                        <span class="la la-close"></span>
                        {{ __('general.cancel') }}
                    </button>
                </div>
                <!--end::modal footer-->

            </div>
            <!--end::modal body-->
        </form>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        // reset
        function resetCreateForm() {
            $('#name_ar').css('border-color', '');
            $('#name_en').css('border-color', '');
            $('#phone_code').css('border-color', '');
            $('#flag_code').css('border-color', '');
            $('#status').css('border-color', '');

            $('#name_ar_error').text('');
            $('#name_en_error').text('');
            $('#phone_code_error').text('');
            $('#flag_code_error').text('');
            $('#status_error').text('');

        }


        // cancel
        $('body').on('click', '#cancel_governorate_btn', function(e) {
            $('#createCountryModal').modal('hide');
            $('#create_country_form')[0].reset();
            resetCreateForm();
        });

        // hide
        $('#createCountryModal').on('hidden.bs.modal', function(e) {
            $('#createCountryModal').modal('hide');
            $('#create_country_form')[0].reset();
            resetCreateForm();
        });


        // create
        $('#create_country_form').on('submit', function(e) {
            e.preventDefault();
            // reset
            resetCreateForm();

            // paramters
            // var currentPage = $('#yajra-datatable').DataTable().page();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');


            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('.spinner_loading').removeClass('d-none');
                },
                success: function(data) {
                    if (data.status == true) {
                        console.log(data);
                        $('#myTable').load(location.href + (' #myTable'));
                        $('#create_country_form')[0].reset();
                        resetCreateForm();
                        $('#createCountryModal').modal('hide');
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
            });

        });
    </script>
@endpush
