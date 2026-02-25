@push('css')
    <link rel="stylesheet" href="{!! asset('assets/dashboard/vendors/select2/select2.min.css') !!}">
@endpush
<div class="modal fade" id="createCityModal" tabindex="-1" role="dialog" aria-labelledby="createCityModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered custom-modal-md" role="document">
        <form class="forms-sample" action="{!! route('dashboard.addresses.cities.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_city_form'>
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCityModalLabel">
                        <i class="mdi mdi-plus-circle me-2"></i>{!! __('addresses.create_new_city') !!}
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
                                <label for="country_id">{!! __('addresses.country_id') !!}</label>
                                <select class="country_select2_create" id='country_id' name="country_id">
                                    <option value=""></option>
                                </select>
                                <strong id="country_id_error" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm text-white">
                        <i class="ti-save me-1" style="font-size: 0.85rem;"></i>{{ __('general.save') }}
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
        $(".country_select2_create").select2({
            dropdownParent: $('#createCityModal'),
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

        $('#createCityModal').on('hidden.bs.modal', function() {
            window.clearFormErrors('#create_city_form');
            $('#create_city_form')[0].reset();
        });

        window.handleFormSubmit('#create_city_form', {
            modalToHide: '#createCityModal',
            successMessage: "{!! __('general.add_success_message') !!}"
        });
    </script>
@endpush
