<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form class="forms-sample" action="{!! route('dashboard.profile.change.password') !!}" method="POST" enctype="multipart/form-data"
            id="change_passowrd_form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">{!! __('profile.change_password') !!}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
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
                    </div>

                    <div class="row">
                        <div class="col-md-12">
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
        function resetChangePasswordForm() {
            $('#change_passowrd_form')[0].reset();
            $('#change_passowrd_form input, #change_passowrd_form select').removeClass('is-invalid');
            $('#change_passowrd_form strong.text-danger').text('');

            // default values
            if (document.getElementById('password')) document.getElementById('password').type = 'password';
            if (document.getElementById('password_confirm')) document.getElementById('password_confirm').type = 'password';
        }

        function resetChangePasswordForm() {
            $('#change_passowrd_form')[0].reset();
            window.clearFormErrors('#change_passowrd_form');
        }

        // hide
        $('#changePasswordModal').on('hidden.bs.modal', function(e) {
            resetChangePasswordForm();
        });


        window.handleFormSubmit('#change_passowrd_form', {
            modalToHide: '#changePasswordModal',
            successMessage: "{!! __('general.update_success_message') !!}",
            onSuccess: function() {
                resetChangePasswordForm();
            }
        });
    </script>
@endpush
