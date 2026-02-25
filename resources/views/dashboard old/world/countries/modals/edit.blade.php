<div class="modal fade" id="updateCountryModal" role="dialog" aria-labelledby="updateCountryModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="" method="POST" enctype="multipart/form-data" id='update_country_form'>
            @csrf
            @method('PUT')
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCountryModalLabel">{!! __('world.update_country') !!}
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
                            <div class="row d-none">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" id="id_edit" name="id" class="form-control">
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
                                        <label for="name">{!! __('world.country_name_ar') !!}</label>
                                        <input type="text" id="name_ar_edit" name="name[ar]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('world.enter_country_name_ar') !!}">
                                        <span class="text text-danger">
                                            <strong id="name_ar_error_edit"></strong>
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
                                        <input type="text" id="name_en_edit" name="name[en]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('world.enter_country_name_en') !!}">
                                        <span class="text text-danger">
                                            <strong id="name_en_error_edit"></strong>
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
                                        <label for="phone_code">{!! __('world.phone_code') !!}</label>
                                        <input type="text" id="phone_code_edit" name="phone_code"
                                            value="{!! old('phone_code', $country->phone_code) !!}" class="form-control" autocomplete="off"
                                            placeholder="{!! __('world.enter_phone_code') !!}">
                                        <span class="text text-danger">
                                            <strong id="phone_code_error_edit"></strong>
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
                                        <label for="flag_code">{!! __('world.flag_code') !!}</label>
                                        <input type="text" id="flag_code_edit" name="flag_code"
                                            value="{!! old('flag_code', $country->flag_code) !!}" class="form-control" autocomplete="off"
                                            placeholder="{!! __('world.enter_flag_code') !!}">
                                        <span class="text text-danger">
                                            <strong id="flag_code_error_edit"></strong>
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
                                                    name="status" id="status_active_edit" value="1">
                                                <label class="custom-control-label"
                                                    for="status_active_edit">{!! __('general.active') !!}
                                                </label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" class="custom-control-input bg-danger"
                                                    name="status" id="status_inactive_edit" value="0">
                                                <label class="custom-control-label"
                                                    for="status_inactive_edit">{!! __('general.inactive') !!}
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
                        <!-- end: row -->

                    </div>
                </div>
                <!--begin::modal footer-->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info font-weight-bold ">
                        <span class="la la-save"></span>
                        {{ __('general.save') }}
                        <i class="la la-refresh spinner spinner_loading d-none">
                        </i>
                    </button>

                    <button type="button" id="cancel_country_btn_edit" class="btn btn-light-dark font-weight-bold"
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
        // show edit modal
        $('body').on('click', '.edit_country_button', function(e) {
            e.preventDefault();
            var country_id = $(this).attr('country-id');
            var country_name_ar = $(this).attr('country-name-ar');
            var country_name_en = $(this).attr('country-name-en');
            var country_phone_code = $(this).attr('country-phone-code');
            var country_flag_code = $(this).attr('country-flag-code');
            var country_status = $(this).attr('country-status');


            $('#id_edit').val(country_id);
            $('#name_ar_edit').val(country_name_ar);
            $('#name_en_edit').val(country_name_en);
            $('#phone_code_edit').val(country_phone_code);
            $('#flag_code_edit').val(country_flag_code);

            if (country_status == 1) {
                $('#status_active_edit').prop('checked', true);
            } else {
                $('#status_inactive_edit').prop('checked', true);
            }

            $('#updateCountryModal').modal('show');
        })

        // reset
        function resetEditForm() {
            $('#name_ar_edit').css('border-color', '');
            $('#name_en_edit').css('border-color', '');
            $('#phone_code_edit').css('border-color', '');
            $('#flag_code_edit').css('border-color', '');
            $('#status_edit').css('border-color', '');

            $('#name_ar_error_edit').text('');
            $('#name_en_error_edit').text('');
            $('#phone_code_error_edit').text('');
            $('#flag_code_error_edit').text('');
            $('#status_error_edit').text('');


        }

        // cancel
        $('body').on('click', '#cancel_country_btn_edit', function(e) {
            $('#updateCountryModal').modal('hide');
            $('#update_country_form')[0].reset();
            resetEditForm();
        });

        // hide
        $('#updateCountryModal').on('hidden.bs.modal', function(e) {
            $('#updateCountryModal').modal('hide');
            $('#update_country_form')[0].reset();
            resetEditForm();
        });


        // update
        $('#update_country_form').on('submit', function(e) {
            e.preventDefault();
            // reset
            resetEditForm();

            // paramters
            var country_id = $('#id_edit').val();
            //var currentPage = $('#yajra-datatable').DataTable().page();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = "{!! route('dashboard.countries.update', 'id') !!}".replace('id', country_id);

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
                        // $('#yajra-datatable').DataTable().page(currentPage).draw(false);
                        $('#update_country_form')[0].reset();
                        resetEditForm();
                        $('#updateCountryModal').modal('hide');
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
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }
            });

        });
    </script>
@endpush
