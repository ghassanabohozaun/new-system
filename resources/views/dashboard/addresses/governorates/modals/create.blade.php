<div class="modal fade" id="createGovernorateModal" tabindex="-1" role="dialog"
    aria-labelledby="createGovernorateModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <form class="forms-sample" action="{!! route('dashboard.addresses.governorates.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_governorate_form'>
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createGovernorateModalLabel">
                        <i class="icon-plus me-2"></i>{!! __('addresses.create_new_governorate') !!}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_ar">{!! __('addresses.governorate_name_ar') !!}</label>
                                <input type="text" id="name_ar" name="name[ar]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('addresses.enter_governorate_name_ar') !!}">
                                <strong id="name_ar_error" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_en">{!! __('addresses.governorate_name_en') !!}</label>
                                <input type="text" id="name_en" name="name[en]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('addresses.enter_governorate_name_en') !!}">
                                <strong id="name_en_error" class="text-danger small"></strong>
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
        function resetCreateForm() {
            $('#create_governorate_form')[0].reset();
            clearErrors();
        }

        function clearErrors() {
            $('#create_governorate_form input').removeClass('is-invalid');
            $('#create_governorate_form strong.text-danger').text('');
        }

        $('#createGovernorateModal').on('hidden.bs.modal', function() {
            resetCreateForm();
        });

        $('#create_governorate_form').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            const data = new FormData(this);

            $.ajax({
                url: form.attr('action'),
                data: data,
                type: 'POST',
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    clearErrors();
                    $('.spinner_loading').removeClass('d-none');
                },
                success: function(data) {
                    if (data.status) {
                        $('#responsiveTable').load(location.href + ' #responsiveTable');
                        $('#createGovernorateModal').modal('hide');
                        resetCreateForm();
                        flasher.success("{!! __('general.add_success_message') !!}");
                    }
                },
                error: function(xhr) {
                    const errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        const field = key.replace(/\./g, '_');
                        $(`#${field}`).addClass('is-invalid');
                        $(`#${field}_error`).text(value[0]);
                    });
                },
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }
            });
        });
    </script>
@endpush
