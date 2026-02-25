<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg modal-center" role="document">
        <form class="form" action="{!! route('dashboard.users.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_user_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title test_answer_header" id="createUserModalLabel">{!! __('users.create_new_user') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal body-->
                <div class="modal-body">

                    <!-- begin: row -->
                    <div class="row">
                        <!-- begin: input -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_ar">{!! __('users.name_ar') !!}</label>
                                <input type="text" id="name_ar" name="name[ar]" class="form-control"
                                    autocomplete="off" placeholder="{!! __('users.enter_name_ar') !!}">
                                <span class="text text-danger">
                                    <strong id="name_ar_error"></strong>
                                </span>
                            </div>
                        </div>
                        <!-- end: input -->

                        <!-- begin: input -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="question">{!! __('users.name_en') !!}</label>
                                <input type="text" id="name_en" name="name[en]" class="form-control"
                                    autocomplete="off" placeholder="{!! __('users.enter_name_en') !!}">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">{!! __('users.mobile') !!}</label>
                                <input type="text" id="mobile" name="mobile" class="form-control"
                                    autocomplete="off" placeholder="{!! __('users.enter_mobile') !!}">
                                <span class="text text-danger">
                                    <strong id="mobile_error"></strong>
                                </span>
                            </div>
                        </div>
                        <!-- end: input -->

                        <!-- begin: input -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">{!! __('users.email') !!}</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    autocomplete="off" placeholder="{!! __('users.enter_email') !!}">
                                <span class="text text-danger">
                                    <strong id="email_error"></strong>
                                </span>

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
                                <label for="password">{!! __('users.password') !!}</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    autocomplete="off" placeholder="{!! __('users.enter_password') !!}">
                                <span class="text text-danger">
                                    <strong id="password_error"></strong>
                                </span>
                            </div>
                        </div>
                        <!-- end: input -->

                        <!-- begin: input -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirm">{!! __('users.password_confirm') !!}</label>
                                <input type="password" id="password_confirm" name="password_confirm"
                                    class="form-control" autocomplete="off" placeholder="{!! __('users.enter_password_confirm') !!}">
                                <span class="text text-danger">
                                    <strong id="password_confirm_error"></strong>
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
                                <label for="status">{!! __('users.status') !!}</label>
                                <div class="input-group">
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input bg-success" name="status"
                                            id="colorRadio1" value="1">
                                        <label class="custom-control-label" for="colorRadio1">{!! __('general.active') !!}
                                        </label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" class="custom-control-input bg-danger" name="status"
                                            id="colorRadio2" value="0">
                                        <label class="custom-control-label" for="colorRadio2">{!! __('general.inactive') !!}
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


                    <!--begin::modal footer-->
                    <div class="modal-footer">
                        <button type="submit" id="create_user_btn" class="btn btn-info font-weight-bold ">
                            <span class="la la-save"></span>
                            {{ __('general.save') }}
                            <i class="la la-refresh spinner spinner_loading d-none">
                            </i>
                        </button>

                        <button type="button" id="cancel_user_btn" class="btn btn-light-dark font-weight-bold"
                            data-dismiss="modal">
                            <span class="la la-close"></span>
                            {{ __('general.cancel') }}
                        </button>
                    </div>
                    <!--end::modal footer-->

                </div>
                <!--end::modal body-->
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        // reset
        function resetCreateForm() {
            $('#name_ar').css('border-color', '');
            $('#name_en').css('border-color', '');
            $('#email').css('border-color', '');
            $('#mobile').css('border-color', '');
            $('#password').css('border-color', '');
            $('#password_confirm').css('border-color', '');
            $('#country_id').css('border-color', '');
            $('#governorate_id').css('border-color', '');
            $('#city_id').css('border-color', '');
            $('#status').css('border-color', '');

            $('#name_ar_error').text('');
            $('#name_en_error').text('');
            $('#email_error').text('');
            $('#mobile_error').text('');
            $('#password_error').text('');
            $('#password_confirm_error').text('');
            $('#country_id_error').text('');
            $('#governorate_id_error').text('');
            $('#city_id_error').text('');
            $('#status_error').text('');
        }

        // cancel
        $('body').on('click', '#cancel_user_btn', function(e) {
            $('#createUserModal').modal('hide');
            $('#create_user_form')[0].reset();
            resetCreateForm();
        });

        // hide
        $('#createUserModal').on('hidden.bs.modal', function(e) {
            $('#createUserModal').modal('hide');
            $('#create_user_form')[0].reset();
            resetCreateForm();
        });

        // create
        $('#create_user_form').on('submit', function(e) {
            e.preventDefault();
            // reset
            resetCreateForm();


            // paramters
            var currentPage = $('#yajra-datatable').DataTable().page();
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
                        $('#yajra-datatable').DataTable().page(currentPage).draw(false);
                        $('#create_user_form')[0].reset();
                        resetCreateForm();
                        $('#createUserModal').modal('hide');
                        flasher.success("{!! __('general.add_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.add_error_message') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        if (key == 'name.ar') {
                            key = 'name_ar';
                        } else if (key == 'name.en') {
                            key = 'name_en';
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
