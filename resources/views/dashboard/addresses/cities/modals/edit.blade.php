<div class="modal fade" id="updateCityModal" tabindex="-1" role="dialog" aria-labelledby="updateCityModalLabel"
    aria-hidden="true">

    <div class="modal-dialog" role="document">
        <form class="forms-sample" action="" method="POST" enctype="multipart/form-data" id='update_city_form'>
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCityModalLabel">
                        <i class="mdi mdi-pencil me-2"></i>{!! __('addresses.update_city') !!}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id_edit_city" name="id">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_ar_edit">{!! __('addresses.city_name_ar') !!}</label>
                                <input type="text" id="name_ar_edit" name="name[ar]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('addresses.enter_city_name_ar') !!}">
                                <strong id="name_ar_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_en_edit">{!! __('addresses.city_name_en') !!}</label>
                                <input type="text" id="name_en_edit" name="name[en]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('addresses.enter_city_name_en') !!}">
                                <strong id="name_en_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="governorate_id_edit">{!! __('addresses.governorate_id') !!}</label>
                                <select class="form-select form-select-sm" id='governorate_id_edit'
                                    name="governorate_id">
                                    <option value="" selected="">{!! __('general.select_from_list') !!}</option>
                                    @foreach ($governorates as $governorate)
                                        <option value="{!! $governorate->id !!}">
                                            {!! $governorate->name !!}
                                        </option>
                                    @endforeach
                                </select>
                                <strong id="governorate_id_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary text-white">
                        <i class="ti-save me-1"></i> {{ __('general.save') }}
                        <span class="spinner-border spinner-border-sm d-none spinner_loading" role="status"
                            aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        {{ __('general.cancel') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        // show edit modal
        $('body').on('click', '.edit_city_button', function(e) {
            e.preventDefault();
            var city_id = $(this).attr('city-id');
            var city_name_ar = $(this).attr('city-name-ar');
            var city_name_en = $(this).attr('city-name-en');
            var governorate_id = $(this).attr('governorate-id');

            $('#id_edit_city').val(city_id);
            $('#name_ar_edit').val(city_name_ar);
            $('#name_en_edit').val(city_name_en);
            $('#governorate_id_edit').val(governorate_id);

            $('#updateCityModal').modal('show');
        });

        function resetCityEditForm() {
            $('#update_city_form input, #update_city_form select').removeClass('is-invalid');
            $('#update_city_form strong.text-danger').text('');
        }

        $('#updateCityModal').on('hidden.bs.modal', function() {
            resetCityEditForm();
        });

        $('#update_city_form').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            const city_id = $('#id_edit_city').val();
            const data = new FormData(this);
            const url = "{!! route('dashboard.addresses.cities.update', 'id') !!}".replace('id', city_id);

            $.ajax({
                url: url,
                data: data,
                type: 'POST', // Handled as PUT by @method('PUT')
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    resetCityEditForm();
                    $('.spinner_loading').removeClass('d-none');
                },
                success: function(data) {
                    if (data.status) {
                        $('#responsiveTable').load(location.href + ' #responsiveTable');
                        $('#updateCityModal').modal('hide');
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
