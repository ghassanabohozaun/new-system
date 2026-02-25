<div class="modal fade" id="createAdminModal" tabindex="-1" role="dialog" aria-labelledby="createAdminModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-md" role="document">
        <form class="forms-sample" action="{!! route('dashboard.admins.store') !!}" method="POST" enctype="multipart/form-data"
            id="create_admin_form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAdminModalLabel">
                        <i class="mdi mdi-plus-circle me-2"></i>{!! __('admins.create_new_admin') !!}
                    </h5>
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


                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label text-dark fw-bold"><i
                                        class="mdi mdi-account-circle me-1 text-primary"></i>{!! __('admins.photo') !!}</label>
                                <div
                                    class="slider-upload-card d-flex align-items-stretch gap-3 border rounded-3 p-3 bg-light">

                                    <!-- Preview Thumbnail -->
                                    <div id="photo_preview_create"
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
                                        <input type="file" id="photo_create" name="photo"
                                            class="form-control form-control-sm" autocomplete="off" accept="image/*">
                                        <strong id="photo_error" class="text-danger small d-block mt-1"></strong>
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
        // reset
        function resetCreateForm() {
            $('#create_admin_form')[0].reset();
            window.clearFormErrors('#create_admin_form');

            // default values
            if (document.getElementById('password')) document.getElementById('password').type = 'password';
            if (document.getElementById('password_confirm')) document.getElementById('password_confirm').type = 'password';

            // reset
            $('#photo_preview_create').html(
                '<div class="text-center text-muted"><i class="mdi mdi-account-outline" style="font-size:2.5rem; opacity:0.3;"></i></div>'
                );
        }

        // hide
        $('#createAdminModal').on('hidden.bs.modal', function(e) {
            resetCreateForm();
        });

        // Photo preview logic for Create
        $('#photo_create').on('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var container = $('#photo_preview_create');
                    container.html('<img src="' + e.target.result +
                        '" style="width:100%;height:100%;object-fit:cover;border-radius:inherit;">');
                }
                reader.readAsDataURL(file);
            }
        });

        window.handleFormSubmit('#create_admin_form', {
            modalToHide: '#createAdminModal',
            successMessage: "{!! __('general.add_success_message') !!}",
            onSuccess: function() {
                resetCreateForm();
            }
        });
    </script>
@endpush
