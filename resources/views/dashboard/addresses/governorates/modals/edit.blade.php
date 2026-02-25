<div class="modal fade" id="updateGovernorateModal" tabindex="-1" role="dialog"
    aria-labelledby="updateGovernorateModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <form class="forms-sample" action="" method="POST" enctype="multipart/form-data"
            id='update_governorate_form'>
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateGovernorateModalLabel">
                        <i class="mdi mdi-pencil me-2"></i>{!! __('addresses.update_governorate') !!}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id_edit" name="id">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_ar_edit">{!! __('addresses.governorate_name_ar') !!}</label>
                                <input type="text" id="name_ar_edit" name="name[ar]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('addresses.enter_governorate_name_ar') !!}">
                                <strong id="name_ar_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_en_edit">{!! __('addresses.governorate_name_en') !!}</label>
                                <input type="text" id="name_en_edit" name="name[en]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('addresses.enter_governorate_name_en') !!}">
                                <strong id="name_en_error_edit" class="text-danger small"></strong>
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
        $('body').on('click', '.edit_governorate_button', function(e) {
            e.preventDefault();
            var governorate_id = $(this).attr('governorate-id');
            var governorate_name_ar = $(this).attr('governorate-name-ar');
            var governorate_name_en = $(this).attr('governorate-name-en');

            $('#id_edit').val(governorate_id);
            $('#name_ar_edit').val(governorate_name_ar);
            $('#name_en_edit').val(governorate_name_en);

            $('#updateGovernorateModal').modal('show');
        });

        function resetEditForm() {
            $('#update_governorate_form input').removeClass('is-invalid');
            $('#update_governorate_form strong.text-danger').text('');
        }

        $('#updateGovernorateModal').on('hidden.bs.modal', function() {
            resetEditForm();
        });

        $('#update_governorate_form').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            const governorate_id = $('#id_edit').val();
            const data = new FormData(this);
            const url = "{!! route('dashboard.addresses.governorates.update', 'id') !!}".replace('id', governorate_id);

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
                        $('#updateGovernorateModal').modal('hide');
                        flasher.success("{!! __('general.update_success_message') !!}");
                    }
                },
                error: function(xhr) {
                    const errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        const field = key.replace(/\./g, '_');
                        $(`#${field}_edit`).addClass('is-invalid');
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
