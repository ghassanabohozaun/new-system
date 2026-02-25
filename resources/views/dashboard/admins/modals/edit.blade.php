<div class="modal fade" id="updateAdminModal" tabindex="-1" role="dialog" aria-labelledby="updateAdminModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="photo">{!! __('admins.photo') !!}</label>
                                <input type="file" id="photo_edit" name="photo"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('admins.enter_photo') !!}">
                                <strong id="photo_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>
                        <div class="col-md-6 {{ Lang() == 'ar' ? 'text-right' : 'text-left' }}">
                            <img id="photo_preview_edit" src="" alt="Photo Preview"
                                class="img-thumbnail d-none" style="max-height: 100px;">
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
            var admin_photo = $(this).attr('admin-photo');

            $('#id_edit').val(admin_id);
            $('#name_ar_edit').val(admin_name_ar);
            $('#name_en_edit').val(admin_name_en);
            $('#email_edit').val(admin_email);
            $('#role_id_edit').val(admin_role_id);
            if (admin_photo && admin_photo !== "" && admin_photo !== "null") {
                $('#photo_preview_edit').attr('src', "{{ asset('uploads/adminsPhotos') }}/" + admin_photo)
                    .removeClass('d-none');
            } else {
                $('#photo_preview_edit').addClass('d-none').attr('src', '');
            }

            if (admin_status == 1) {
                $('#status_active_edit').prop('checked', true);
            } else {
                $('#status_inactive_edit').prop('checked', true);
            }

            $('#updateAdminModal').modal('show');
        })

        // reset
        function resetEditForm() {
            $('#update_admin_form input, #update_admin_form select').removeClass('is-invalid');
            $('#update_admin_form strong.text-danger').text('');

            // reset password type
            if (document.getElementById('password_edit')) document.getElementById('password_edit').type = 'password';
            if (document.getElementById('password_confirm_edit')) document.getElementById('password_confirm_edit').type =
                'password';

            $('#photo_preview_edit').addClass('d-none').attr('src', '');
        }

        // hide
        $('#updateAdminModal').on('hidden.bs.modal', function(e) {
            resetEditForm();
        });

        // Photo preview logic
        $('#photo_edit').on('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photo_preview_edit').attr('src', e.target.result).removeClass('d-none');
                }
                reader.readAsDataURL(file);
            }
        });


        $('#update_admin_form').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            const admin_id = $('#id_edit').val();
            const data = new FormData(this);
            const url = "{!! route('dashboard.admins.update', 'id') !!}".replace('id', admin_id);

            $.ajax({
                url: url,
                data: data,
                type: 'POST', // Handled as PUT by @method('PUT')
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    resetEditForm();
                    $('.spinner_loading').removeClass('d-none');
                },
                success: function(data) {
                    if (data.status) {
                        $('#responsiveTable').load(location.href + ' #responsiveTable');
                        $('.admin_name_section').load(location.href + ' .admin_name_section');
                        flasher.success("{!! __('general.update_success_message') !!}");

                        // Sync header if it's the current user
                        if (admin_id == "{{ admin()->user()->id }}") {
                            if (data.data.photo) {
                                var photoUrl = "{{ asset('uploads/adminsPhotos') }}/" + data.data.photo;
                                $('.header_admin_photo').attr('src', photoUrl);
                            }

                            var name = data.data.name;
                            if (typeof name === 'object' && name !== null) {
                                name = name["{!! app()->getLocale() !!}"];
                            }

                            $('.header_admin_name').text(name);
                            $('.header_admin_email').text(data.data.email);
                            $('.welcome-text span').text(name);
                        }

                        $('#updateAdminModal').modal('hide');
                    }
                },
                error: function(xhr) {
                    const errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        const field = key.replace(/\./g, '_');
                        let inputId = `${field}_edit`;
                        if (key === 'photo') inputId = 'photo_edit';

                        $(`#${inputId}`).addClass('is-invalid');
                        $(`#${field}_error_edit`).text(value[0]);
                    });
                },
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }
            });

        });
    </script>
@endpush
