<div class="modal fade" id="flagsReferenceModal" tabindex="-1" role="dialog" aria-labelledby="flagsReferenceModalLabel"
    aria-hidden="true" style="z-index: 1600;">
    <div class="modal-dialog modal-dialog-centered custom-modal-md" role="document" style="z-index: 1601;">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header text-dark py-2 px-3 border-bottom-0">
                <h6 class="modal-title d-flex align-items-center" id="flagsReferenceModalLabel">
                    <i class="ti-flag-alt me-2 text-primary"></i>
                    <span class="fw-bold">{!! __('addresses.flag_codes_reference') !!}</span>
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="font-size: 0.7rem;"></button>
            </div>
            <div class="modal-body">
                <div class="px-3 py-2 bg-light bg-opacity-10 border-bottom">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="ti-search text-muted"></i>
                        </span>
                        <input type="text" id="flagSearchInput"
                            class="form-control ps-1 form-control-sm border-start-0 shadow-none"
                            placeholder="{!! __('addresses.search_for_country') !!}">
                    </div>
                </div>
                <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                    <table class="table table-hover align-middle mb-0" id="flagsRefTable">
                        <thead class="bg-light sticky-top" style="top: 0; z-index: 1;">
                            <tr>
                                <th class="border-top-0 ps-3 text-muted xsmall fw-bold text-uppercase"
                                    style="width: 50px;">
                                    {!! __('general.flag') !!}</th>
                                <th class="border-top-0 text-muted xsmall fw-bold text-uppercase">
                                    {!! __('addresses.country_name') !!}
                                </th>
                                <th class="border-top-0 text-muted xsmall fw-bold text-uppercase" style="width: 80px;">
                                    {!! __('addresses.flag_code') !!}
                                </th>
                                <th class="border-top-0 text-center text-muted xsmall fw-bold text-uppercase"
                                    style="width: 60px;">
                                    {!! __('general.actions') !!}</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            <!-- Table rows will be populated by JS -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">
                    <i class="ti-close me-1" style="font-size: 0.85rem;"></i> {!! __('general.close') !!}
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            const tbody = $('#flagsRefTable tbody');
            const searchInput = $('#flagSearchInput');
            let targetInputId = '';
            const currentLocale = "{!! app()->getLocale() !!}";

            // Function to render table
            function renderFlagsTable(filter = '') {
                tbody.empty();
                const filtered = window.CountriesISOData.filter(item => {
                    const searchStr = (item.name_en + item.name_ar + item.code).toLowerCase();
                    return searchStr.includes(filter.toLowerCase());
                });

                if (filtered.length === 0) {
                    tbody.append(
                        `<tr><td colspan="4" class="text-center py-4 text-muted small">{!! __('general.no_record_found') !!}</td></tr>`
                    );
                    return;
                }

                filtered.forEach(item => {
                    const countryName = currentLocale === 'ar' ? item.name_ar : item.name_en;
                    const row = `
                <tr>
                    <td class="ps-3 py-2">
                        <span class="flag-icon flag-icon-${item.code.toLowerCase()} shadow-sm rounded-1" style="width: 22px; height: 16px;"></span>
                    </td>
                    <td class="py-2">
                        <div class="d-flex flex-column">
                            <span class="text-dark fw-bold small" style="font-size: 0.8rem;">${countryName}</span>
                            <span class="text-muted" style="font-size: 0.7rem;">${currentLocale === 'ar' ? item.name_en : item.name_ar}</span>
                        </div>
                    </td>
                    <td class="py-2"><code class="bg-light px-1 py-0 rounded text-primary border" style="font-size: 0.75rem;">${item.code}</code></td>
                    <td class="text-center py-2">
                        <button type="button" class="btn btn-sm btn-inverse-primary p-1 select-flag-code"
                                data-code="${item.code}" title="{!! __('general.select') !!}">
                            <i class="ti-check" style="font-size: 0.8rem;"></i>
                        </button>
                    </td>
                </tr>
            `;
                    tbody.append(row);
                });
            }

            // Initial render
            renderFlagsTable();

            // Search event
            searchInput.on('keyup', function() {
                renderFlagsTable($(this).val());
            });

            // Handle Open Modal from button
            $(document).on('click', '.open-flags-reference', function() {
                targetInputId = $(this).data('target-input');
                $('#flagsReferenceModal').modal('show');
            });

            // Z-index fix for stacked modals backdrop
            $('#flagsReferenceModal').on('show.bs.modal', function() {
                setTimeout(function() {
                    $('.modal-backdrop').last().css('z-index', 1590);
                }, 0);
            });

            // Handle Selection
            $(document).on('click', '.select-flag-code', function() {
                const code = $(this).data('code');
                $(`#${targetInputId}`).val(code.toLowerCase()).trigger('change');
                $('#flagsReferenceModal').modal('hide');
            });
        });
    </script>
@endpush
