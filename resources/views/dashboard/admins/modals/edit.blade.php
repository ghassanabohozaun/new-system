<div class="modal fade" id="updateAdminModal" tabindex="-1" role="dialog" aria-labelledby="updateAdminModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-md" role="document">
        <form class="forms-sample" action="" method="POST" enctype="multipart/form-data" id="update_admin_form">
            @csrf
            @method('PUT')
            <input type="hidden" id="id_edit" name="id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateAdminModalLabel">
                        <i class="mdi mdi-pencil me-2"></i>{!! __('admins.update_admin') !!}
                    </h5>
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


                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label text-dark fw-bold"><i
                                        class="mdi mdi-account-circle me-1 text-primary"></i>{!! __('admins.photo') !!}</label>
                                <div
                                    class="slider-upload-card d-flex align-items-stretch gap-3 border rounded-3 p-3 bg-light">

                                    <!-- Preview Thumbnail -->
                                    <div id="photo_preview_edit"
                                        class="slider-thumb-preview rounded-3 overflow-hidden border flex-shrink-0 bg-white d-flex align-items-center justify-content-center"
                                        style="width:110px; height:110px;">
                                        <div class="text-center text-muted">
                                            <i class="mdi mdi-account-outline"
                                                style="font-size:2.5rem; opacity:0.3;"></i>
                                        </div>
                                    </div>

                                    <!-- Upload Input -->
                                    <div class="d-flex flex-column justify-content-center flex-grow-1">
                                        <div class="mb-1 text-muted small"><i
                                                class="mdi mdi-cloud-upload-outline me-1"></i>{!! __('sliders.click_to_upload') !!}
                                        </div>
                                        <input type="file" id="photo_edit" name="photo"
                                            class="form-control form-control-sm" autocomplete="off" accept="image/*">
                                        <strong id="photo_error_edit" class="text-danger small d-block mt-1"></strong>
                                    </div>

                                </div>
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
                    <button type="submit" class="btn btn-sm btn-primary text-white">
                        <i class="ti-save me-1" style="font-size: 0.85rem;"></i> {!! __('general.save') !!}
                        &nbsp;
                        <span class="spinner-border spinner-border-sm d-none spinner_loading" role="status"
                            aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">
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

            // Set dynamic action URL
            const url = "{!! route('dashboard.admins.update', 'id') !!}".replace('id', admin_id);
            $('#update_admin_form').attr('action', url);

            $('#id_edit').val(admin_id);
            $('#name_ar_edit').val(admin_name_ar);
            $('#name_en_edit').val(admin_name_en);
            $('#email_edit').val(admin_email);
            $('#role_id_edit').val(admin_role_id);
            if (admin_photo && admin_photo !== "" && admin_photo !== "null") {
                var photoBase = "{{ asset('uploads/adminsPhotos') }}";
                $('#photo_preview_edit').html('<img src="' + photoBase + '/' + admin_photo +
                    '" style="width:100%;height:100%;object-fit:cover;border-radius:inherit;">');
            } else {
                $('#photo_preview_edit').html(
                    '<div class="text-center text-muted"><i class="mdi mdi-account-outline" style="font-size:2.5rem; opacity:0.3;"></i></div>'
                );
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
            window.clearFormErrors('#update_admin_form');

            // reset password type
            if (document.getElementById('password_edit')) document.getElementById('password_edit').type =
                'password';
            if (document.getElementById('password_confirm_edit')) document.getElementById('password_confirm_edit')
                .type =
                'password';

            $('#photo_preview_edit').html(
                '<div class="text-center text-muted"><i class="mdi mdi-account-outline" style="font-size:2.5rem; opacity:0.3;"></i></div>'
            );
        }

        // hide
        $('#updateAdminModal').on('hidden.bs.modal', function(e) {
            resetEditForm();
        });

        // Photo preview on file change
        $('#photo_edit').on('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photo_preview_edit').html('<img src="' + e.target.result +
                        '" style="width:100%;height:100%;object-fit:cover;border-radius:inherit;">');
                }
                reader.readAsDataURL(file);
            }
        });

        window.handleFormSubmit('#update_admin_form', {
            modalToHide: '#updateAdminModal',
            successMessage: "{!! __('general.update_success_message') !!}",
            suffix: '_edit',
            resetForm: false,
            onSuccess: function(data) {
                $('.admin_name_section').load(location.href + ' .admin_name_section');

                const admin_id = $('#id_edit').val();
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
            }
        });
    </script>
@endpush
