<div class="modal fade" id="createCountryModal" tabindex="-1" role="dialog" aria-labelledby="createCountryModalLabel"
    aria-hidden="true">

    <div class="modal-dialog" role="document">
        <form class="forms-sample" action="{!! route('dashboard.addresses.countries.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_country_form'>
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCountryModalLabel">
                        <i class="icon-plus me-2"></i>{!! __('addresses.create_new_country') !!}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_ar">{!! __('addresses.country_name_ar') !!}</label>
                                <input type="text" id="name_ar" name="name[ar]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('addresses.enter_country_name_ar') !!}">
                                <strong id="name_ar_error" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_en">{!! __('addresses.country_name_en') !!}</label>
                                <input type="text" id="name_en" name="name[en]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('addresses.enter_country_name_en') !!}">
                                <strong id="name_en_error" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="code">{!! __('addresses.phone_code') !!}</label>
                                <input type="text" id="phone_code" name="phone_code"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('addresses.enter_phone_code') !!}">
                                <strong id="phone_code_error" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="flag_code">{!! __('addresses.flag_code') !!}</label>
                                <div class="input-group">
                                    <input type="text" id="flag_code" name="flag_code"
                                        class="form-control form-control-sm" autocomplete="off"
                                        placeholder="{!! __('addresses.enter_flag_code') !!}">
                                    <button class="btn btn-outline-secondary open-flags-reference" type="button"
                                        data-target-input="flag_code">
                                        <i class="ti-search"></i>
                                    </button>
                                </div>
                                <strong id="flag_code_error" class="text-danger small"></strong>
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
        $('#createCountryModal').on('hidden.bs.modal', function() {
            window.clearFormErrors('#create_country_form');
            $('#create_country_form')[0].reset();
        });

        window.handleFormSubmit('#create_country_form', {
            modalToHide: '#createCountryModal',
            successMessage: "{!! __('general.add_success_message') !!}"
        });
    </script>
@endpush
