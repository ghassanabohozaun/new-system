@push('css')
    <link rel="stylesheet" href="{!! asset('assets/dashboard/vendors/select2/select2.min.css') !!}">
@endpush
<div class="modal fade" id="updateCityModal" tabindex="-1" role="dialog" aria-labelledby="updateCityModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered custom-modal-md" role="document">
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
                                <label for="country_id_edit">{!! __('addresses.country_id') !!}</label>
                                <select class="country_select2_edit" id='country_id_edit' name="country_id">
                                    <option value=""></option>
                                </select>
                                <strong id="country_id_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary text-white btn-sm">
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
    <script src="{!! asset('assets/dashboard/vendors/select2/select2.min.js') !!}"></script>

    <script type="text/javascript">
        $(".country_select2_edit").select2({
            dropdownParent: $('#updateCityModal'),
            width: '100%',
            minimumInputLength: 1,
            maximumInputLength: 20,
            placeholder: '{!! __('general.select_from_list') !!}',
            allowClear: true,
            templateResult: formatSelect2Country,
            templateSelection: formatSelect2Country,
            escapeMarkup: function(markup) {
                return markup;
            },
            language: {
                inputTooShort: function() {
                    return "{!! __('general.inputTooShort') !!}";
                },
                inputTooLong: function() {
                    return "{!! __('general.inputTooLong') !!}";
                },
                errorLoading: function() {
                    return "{!! __('general.errorLoading') !!}";
                },
                noResults: function() {
                    return "<span>{!! __('general.noResults2') !!}";
                },
                searching: function() {
                    return " {!! __('general.searching') !!}";
                }
            },
            ajax: {
                url: "{{ route('dashboard.addresses.countries.autocomplete.country') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: ('{!! Lang() !!}' === 'en') ? item.country_en : item
                                    .country_ar,
                                id: item.id,
                                flag_code: item.flag_code
                            }
                        })
                    };
                },
                cache: true
            }
        });

        // show edit modal
        $('body').on('click', '.edit_city_button', function(e) {
            e.preventDefault();
            var city_id = $(this).attr('city-id');
            var city_name_ar = $(this).attr('city-name-ar');
            var city_name_en = $(this).attr('city-name-en');
            var country_id = $(this).attr('country-id');

            // Set dynamic action URL
            const url = "{!! route('dashboard.addresses.cities.update', 'id') !!}".replace('id', city_id);
            $('#update_city_form').attr('action', url);

            $('#id_edit_city').val(city_id);
            $('#name_ar_edit').val(city_name_ar);
            $('#name_en_edit').val(city_name_en);

            if (country_id) {
                var countryName = $(this).closest('tr').find('td').eq(3).text().trim();
                var countryFlag = $(this).attr('country-flag');
                var option = new Option(countryName, country_id, true, true);
                $(option).data('data', {
                    id: country_id,
                    text: countryName,
                    flag_code: countryFlag
                });
                $(".country_select2_edit").empty().append(option).trigger('change');
            } else {
                $(".country_select2_edit").empty().trigger('change');
            }

            $('#updateCityModal').modal('show');
        });

        $('#updateCityModal').on('hidden.bs.modal', function() {
            window.clearFormErrors('#update_city_form');
        });

        window.handleFormSubmit('#update_city_form', {
            modalToHide: '#updateCityModal',
            successMessage: "{!! __('general.update_success_message') !!}",
            suffix: '_edit',
            resetForm: false
        });
    </script>
@endpush
