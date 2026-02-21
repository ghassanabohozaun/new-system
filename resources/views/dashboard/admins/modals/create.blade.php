<div class="modal fade" id="createAdminModal" tabindex="-1" role="dialog" aria-labelledby="createAdminModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="forms-sample" action="{!! route('dashboard.admins.store') !!}" method="POST" enctype="multipart/form-data"
            id="create_admin_form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAdminModalLabel">{!! __('admins.create_new_admin') !!}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_ar">{!! __('admins.name_ar') !!}</label>
                                <input type="text" id="name_ar" name="name[ar]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('admins.enter_name_ar') !!}">
                                <strong id="name_ar_error" class="text-danger small"></strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_en">{!! __('admins.name_en') !!}</label>
                                <input type="text" id="name_en" name="name[en]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('admins.enter_name_en') !!}">
                                <strong id="name_en_error" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">{!! __('admins.email') !!}</label>
                                <input type="email" id="email" name="email" class="form-control form-control-sm"
                                    autocomplete="off" placeholder="{!! __('admins.enter_email') !!}">
                                <strong id="email_error" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">{!! __('admins.password') !!}</label>
                                <div class="input-group input-group-sm">
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-sm" autocomplete="new-password"
                                        placeholder="{!! __('admins.enter_password') !!}">
                                    <button class="btn btn-outline-secondary toggle-password" type="button"
                                        data-target="password">
                                        <i class="ti-eye"></i>
                                    </button>
                                </div>
                                <strong id="password_error" class="text-danger small"></strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirm">{!! __('admins.password_confirm') !!}</label>
                                <div class="input-group input-group-sm">
                                    <input type="password" id="password_confirm" name="password_confirm"
                                        class="form-control form-control-sm" autocomplete="new-password"
                                        placeholder="{!! __('admins.enter_password_confirm') !!}">
                                    <button class="btn btn-outline-secondary toggle-password" type="button"
                                        data-target="password_confirm">
                                        <i class="ti-eye"></i>
                                    </button>
                                </div>
                                <strong id="password_confirm_error" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="role_id">{!! __('admins.role_id') !!}</label>
                                <select class="form-select form-select-sm" id="role_id" name="role_id">
                                    <option value="" selected>{!! __('general.select_from_list') !!}</option>
                                    @foreach ($roles as $role)
                                        <option value="{!! $role->id !!}">{!! $role->role !!}</option>
                                    @endforeach
                                </select>
                                <strong id="role_id_error" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{!! __('admins.status') !!}</label>
                                <div class="d-flex gap-3 mt-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="status_active" value="1" checked>
                                            {!! __('general.active') !!}
                                            <i class="input-helper"></i></label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="status_inactive" value="0">
                                            {!! __('general.inactive') !!}
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                                <strong id="status_error" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="create_admin_btn"
                        class="btn btn-primary btn-sm btn-icon-text me-2 text-white">
                        <i class="ti-save me-1" style="font-size: 0.85rem;"></i> {!! __('general.save') !!}
                        &nbsp;
                        <span class="spinner-border spinner-border-sm d-none spinner_loading" role="status"
                            aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-light btn-sm btn-icon-text" data-bs-dismiss="modal">
                        <i class="ti-close me-1" style="font-size: 0.85rem;"></i> {!! __('general.cancel') !!}
                    </button>
                </div>
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
            $('#password').css('border-color', '');
            $('#password_confirm').css('border-color', '');
            $('#role_id').css('border-color', '');
            $('#status').css('border-color', '');

            $('#name_ar_error').text('');
            $('#name_en_error').text('');
            $('#email_error').text('');
            $('#password_error').text('');
            $('#password_confirm_error').text('');
            $('#role_id_error').text('');
            $('#status_error').text('');

            // default values
            var password = document.getElementById('password');
            password.type = 'password';

            var password_confirm = document.getElementById('password_confirm');
            password_confirm.type = 'password';
        }

        // // cancel
        // $('body').on('click', '#cancel_admin_btn', function(e) {
        //     $('#createAdminModal').modal('hide');
        //     $('#create_admin_form')[0].reset();
        //     resetCreateForm();
        // });

        // hide
        $('#createAdminModal').on('hidden.bs.modal', function(e) {
            $('#createAdminModal').modal('hide');
            $('#create_admin_form')[0].reset();
            resetCreateForm();
        });


        // create
        $('#create_admin_form').on('submit', function(e) {
            e.preventDefault();
            // reset
            resetCreateForm();

            // paramters
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
                        $('#responsiveTable').load(location.href + (' #responsiveTable'));
                        $('#create_admin_form')[0].reset();
                        resetCreateForm();
                        $('#createAdminModal').modal('hide');
                        flasher.success("{!! __('general.add_success_message') !!}", "{!! __('general.success') !!}");
                    } else {
                        flasher.error("{!! __('general.add_error_message') !!}", "{!! __('general.error') !!}");
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
