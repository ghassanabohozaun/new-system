<div class="modal fade" id="updateAdminModal" tabindex="-1" role="dialog" aria-labelledby="updateAdminModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="forms-sample" action="" method="POST" enctype="multipart/form-data" id="update_admin_form">
            @csrf
            @method('PUT')
            <input type="hidden" id="id_edit" name="id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateAdminModalLabel">{!! __('admins.update_admin') !!}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_ar_edit">{!! __('admins.name_ar') !!}</label>
                                <input type="text" id="name_ar_edit" name="name[ar]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('admins.enter_name_ar') !!}">
                                <strong id="name_ar_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_en_edit">{!! __('admins.name_en') !!}</label>
                                <input type="text" id="name_en_edit" name="name[en]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('admins.enter_name_en') !!}">
                                <strong id="name_en_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email_edit">{!! __('admins.email') !!}</label>
                                <input type="email" id="email_edit" name="email"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('admins.enter_email') !!}">
                                <strong id="email_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_edit">{!! __('admins.password') !!}</label>
                                <div class="input-group input-group-sm">
                                    <input type="password" id="password_edit" name="password"
                                        class="form-control form-control-sm" autocomplete="new-password"
                                        placeholder="{!! __('admins.enter_password') !!}">
                                    <button class="btn btn-outline-secondary toggle-password" type="button"
                                        data-target="password_edit">
                                        <i class="ti-eye"></i>
                                    </button>
                                </div>
                                <strong id="password_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirm_edit">{!! __('admins.password_confirm') !!}</label>
                                <div class="input-group input-group-sm">
                                    <input type="password" id="password_confirm_edit" name="password_confirm"
                                        class="form-control form-control-sm" autocomplete="new-password"
                                        placeholder="{!! __('admins.enter_password_confirm') !!}">
                                    <button class="btn btn-outline-secondary toggle-password" type="button"
                                        data-target="password_confirm_edit">
                                        <i class="ti-eye"></i>
                                    </button>
                                </div>
                                <strong id="password_confirm_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="role_id_edit">{!! __('admins.role_id') !!}</label>
                                <select class="form-select form-select-sm" id="role_id_edit" name="role_id">
                                    <option value="">{!! __('general.select_from_list') !!}</option>
                                    @foreach ($roles as $role)
                                        <option value="{!! $role->id !!}">{!! $role->role !!}</option>
                                    @endforeach
                                </select>
                                <strong id="role_id_error_edit" class="text-danger small"></strong>
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
                                                id="status_active_edit" value="1">
                                            {!! __('general.active') !!}
                                            <i class="input-helper"></i></label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="status_inactive_edit" value="0">
                                            {!! __('general.inactive') !!}
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                                <strong id="status_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="update_admin_btn"
                        class="btn btn-primary btn-icon-text btn-sm me-2 text-white">
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
        // show edit modal
        $('body').on('click', '.edit_admin_button', function(e) {
            e.preventDefault();
            var admin_id = $(this).attr('admin-id');
            var admin_name_ar = $(this).attr('admin-name-ar');
            var admin_name_en = $(this).attr('admin-name-en');
            var admin_email = $(this).attr('admin-email');
            var admin_role_id = $(this).attr('admin-role-id');
            var admin_status = $(this).attr('admin-status');

            $('#id_edit').val(admin_id);
            $('#name_ar_edit').val(admin_name_ar);
            $('#name_en_edit').val(admin_name_en);
            $('#email_edit').val(admin_email);
            $('#role_id_edit').val(admin_role_id);

            if (admin_status == 1) {
                $('#status_active_edit').prop('checked', true);
            } else {
                $('#status_inactive_edit').prop('checked', true);
            }

            $('#updateAdminModal').modal('show');
        })

        // reset
        function resetEditForm() {
            $('#name_ar_edit').css('border-color', '');
            $('#name_en_edit').css('border-color', '');
            $('#email_edit').css('border-color', '');
            $('#password_confirm_edit').css('border-color', '');
            $('#role_id_edit').css('border-color', '');

            $('#name_ar_error_edit').text('');
            $('#name_en_error_edit').text('');
            $('#email_error_edit').text('');
            $('#password_confirm_error_edit').text('');
            $('#role_id_error_edit').text('');

            // reset password type
            var password_edit = document.getElementById('password_edit');
            password_edit.type = 'password';

            var password_confirm_edit = document.getElementById('password_confirm_edit');
            password_confirm_edit.type = 'password';

        }

        // cancel
        $('body').on('click', '#cancel_admin_btn_edit', function(e) {
            $('#updateAdminModal').modal('hide');
            $('#update_admin_form')[0].reset();
            resetEditForm();
        });

        // hide
        $('#updateAdminModal').on('hidden.bs.modal', function(e) {
            $('#updateAdminModal').modal('hide');
            $('#update_admin_form')[0].reset();
            resetEditForm();
        });


        // update
        $('#update_admin_form').on('submit', function(e) {
            e.preventDefault();
            // reset
            resetEditForm();

            // paramters
            var admin_id = $('#id_edit').val();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = "{!! route('dashboard.admins.update', 'id') !!}".replace('id', admin_id);

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
                        $('#update_admin_form')[0].reset();
                        resetEditForm();
                        $('.admin_name_section').load(location.href + ' .admin_name_section');

                        flasher.success("{!! __('general.add_success_message') !!}", "{!! __('general.success') !!}");
                        $('#updateAdminModal').modal('hide');
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
