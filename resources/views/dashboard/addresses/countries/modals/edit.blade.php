<div class="modal fade" id="updateCountryModal" tabindex="-1" role="dialog" aria-labelledby="updateCountryModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered custom-modal-md" role="document">
        <form class="forms-sample" action="" method="POST" enctype="multipart/form-data" id='update_country_form'>
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCountryModalLabel">
                        <i class="mdi mdi-pencil me-2"></i>{!! __('addresses.update_country') !!}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id_edit" name="id">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_ar_edit">{!! __('addresses.country_name_ar') !!}</label>
                                <input type="text" id="name_ar_edit" name="name[ar]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('addresses.enter_country_name_ar') !!}">
                                <strong id="name_ar_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_en_edit">{!! __('addresses.country_name_en') !!}</label>
                                <input type="text" id="name_en_edit" name="name[en]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('addresses.enter_country_name_en') !!}">
                                <strong id="name_en_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone_code_edit">{!! __('addresses.phone_code') !!}</label>
                                <input type="text" id="phone_code_edit" name="phone_code"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('addresses.enter_phone_code') !!}">
                                <strong id="phone_code_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="flag_code_edit">{!! __('addresses.flag_code') !!}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <span id="flag_preview_edit"
                                            class="flag-icon flag-icon-default shadow-sm rounded-1"
                                            style="width: 20px; height: 15px;"></span>
                                    </span>
                                    <input type="text" id="flag_code_edit" name="flag_code"
                                        class="form-control form-control-sm border-start-0 border-end-0 bg-white open-flags-reference"
                                        readonly autocomplete="off" placeholder="{!! __('addresses.select_flag_code') !!}"
                                        style="cursor: pointer;" data-target-input="flag_code_edit">
                                    <span class="input-group-text bg-white border-start-0 open-flags-reference"
                                        style="cursor: pointer;" data-target-input="flag_code_edit">
                                        <i class="ti-mouse-alt text-muted"></i>
                                    </span>
                                </div>
                                <strong id="flag_code_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{!! __('addresses.status') !!}</label>
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
        $('body').on('click', '.edit_country_button', function(e) {
            e.preventDefault();
            var country_id = $(this).attr('country-id');
            var country_name_ar = $(this).attr('country-name-ar');
            var country_name_en = $(this).attr('country-name-en');
            var country_phone_code = $(this).attr('country-phone-code');
            var country_flag_code = $(this).attr('country-flag-code');
            var country_status = $(this).attr('country-status');

            // Set dynamic action URL
            const url = "{!! route('dashboard.addresses.countries.update', 'id') !!}".replace('id', country_id);
            $('#update_country_form').attr('action', url);

            $('#id_edit').val(country_id);
            $('#name_ar_edit').val(country_name_ar);
            $('#name_en_edit').val(country_name_en);
            $('#phone_code_edit').val(country_phone_code);
            $('#flag_code_edit').val(country_flag_code).trigger('change');

            // Handle radio button status
            if (country_status == 1) {
                $('#update_country_form #status_active').prop('checked', true);
            } else {
                $('#update_country_form #status_inactive').prop('checked', true);
            }

            $('#updateCountryModal').modal('show');
        });

        $('#updateCountryModal').on('hidden.bs.modal', function() {
            window.clearFormErrors('#update_country_form');
            $('#flag_preview_edit').attr('class', 'flag-icon flag-icon-default shadow-sm rounded-1');
        });

        // Update flag preview on change
        $('#flag_code_edit').on('change', function() {
            const code = $(this).val();
            if (code) {
                $('#flag_preview_edit').attr('class',
                    `flag-icon flag-icon-${code.toLowerCase()} shadow-sm rounded-1`);
            } else {
                $('#flag_preview_edit').attr('class', 'flag-icon flag-icon-default shadow-sm rounded-1');
            }
        });

        window.handleFormSubmit('#update_country_form', {
            modalToHide: '#updateCountryModal',
            successMessage: "{!! __('general.update_success_message') !!}",
            suffix: '_edit',
            resetForm: false
        });
    </script>
@endpush
