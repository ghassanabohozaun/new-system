<div class="modal fade" id="createCityModal" tabindex="-1" role="dialog" aria-labelledby="createCityModalLabel"
    aria-hidden="true">

    <div class="modal-dialog" role="document">
        <form class="forms-sample" action="{!! route('dashboard.addresses.cities.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_city_form'>
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCityModalLabel">
                        <i class="icon-plus me-2"></i>{!! __('addresses.create_new_city') !!}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_ar">{!! __('addresses.city_name_ar') !!}</label>
                                <input type="text" id="name_ar" name="name[ar]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('addresses.enter_city_name_ar') !!}">
                                <strong id="name_ar_error" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_en">{!! __('addresses.city_name_en') !!}</label>
                                <input type="text" id="name_en" name="name[en]"
                                    class="form-control form-control-sm" autocomplete="off"
                                    placeholder="{!! __('addresses.enter_city_name_en') !!}">
                                <strong id="name_en_error" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="governorate_id">{!! __('addresses.governorate_id') !!}</label>
                                <select class="form-select form-select-sm" id='governorate_id' name="governorate_id">
                                    <option value="" selected="">{!! __('general.select_from_list') !!}</option>
                                    @foreach ($governorates as $governorate)
                                        <option value="{!! $governorate->id !!}" {!! old('governorate_id') == $governorate->id ? 'selected' : '' !!}>
                                            {!! $governorate->name !!}
                                        </option>
                                    @endforeach
                                </select>
                                <strong id="governorate_id_error" class="text-danger small"></strong>
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
        function resetCityCreateForm() {
            $('#create_city_form')[0].reset();
            clearErrors();
        }

        function clearErrors() {
            $('#create_city_form input, #create_city_form select').removeClass('is-invalid');
            $('#create_city_form strong.text-danger').text('');
        }

        $('#createCityModal').on('hidden.bs.modal', function() {
            resetCityCreateForm();
        });

        $('#create_city_form').on('submit', function(e) {
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
                        $('#createCityModal').modal('hide');
                        resetCityCreateForm();
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
