<div class="modal fade" id="flagsReferenceModal" tabindex="-1" role="dialog" aria-labelledby="flagsReferenceModalLabel"
    aria-hidden="true" style="z-index: 1600;">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="z-index: 1601;">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header  text-dark py-3">
                <h5 class="modal-title d-flex align-items-center" id="flagsReferenceModalLabel">
                    <i class="ti-flag-alt me-2"></i>
                    <span class="fw-bold">{!! __('addresses.flag_codes_reference') !!}</span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="px-4 py-3 border-bottom">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="ti-search text-primary"></i>
                        </span>
                        <input type="text" id="flagSearchInput" class="form-control ps-0 form-control-sm"
                            placeholder="{!! __('addresses.search_for_country') !!}">
                    </div>
                </div>
                <div class="table-responsive" style="max-height: 450px; overflow-y: auto;">
                    <table class="table table-hover align-middle mb-0" id="flagsRefTable">
                        <thead class="bg-light sticky-top" style="top: 0; z-index: 1;">
                            <tr>
                                <th class="border-top-0 ps-4 text-muted small fw-bold text-uppercase">
                                    {!! __('general.flag') !!}</th>
                                <th class="border-top-0 text-muted small fw-bold text-uppercase">{!! __('addresses.country_name_en') !!}
                                </th>
                                <th class="border-top-0 text-muted small fw-bold text-uppercase">{!! __('addresses.country_name_ar') !!}
                                </th>
                                <th class="border-top-0 text-muted small fw-bold text-uppercase">{!! __('addresses.flag_code') !!}
                                </th>
                                <th class="border-top-0 text-center text-muted small fw-bold text-uppercase">
                                    {!! __('general.actions') !!}</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            <!-- Table rows will be populated by JS -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer py-2">
                <button type="button" class="btn btn-sm btn-light d-flex align-items-center" data-bs-dismiss="modal">
                    <i class="ti-close me-1"></i> {!! __('general.close') !!}
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

            // Function to render table
            function renderFlagsTable(filter = '') {
                tbody.empty();
                const filtered = window.CountriesISOData.filter(item => {
                    const searchStr = (item.name_en + item.name_ar + item.code).toLowerCase();
                    return searchStr.includes(filter.toLowerCase());
                });

                if (filtered.length === 0) {
                    tbody.append(
                        `<tr><td colspan="5" class="text-center py-4 text-muted">{!! __('general.no_record_found') !!}</td></tr>`
                    );
                    return;
                }

                filtered.forEach(item => {
                    const row = `
                <tr>
                    <td class="ps-4">
                        <div class="d-flex align-items-center">
                            <span class="flag-icon flag-icon-${item.code.toLowerCase()} shadow-sm rounded-1" style="width: 24px; height: 18px;"></span>
                        </div>
                    </td>
                    <td><span class="text-dark fw-medium">${item.name_en}</span></td>
                    <td><span class="text-dark fw-medium">${item.name_ar}</span></td>
                    <td><code class="bg-light px-2 py-1 rounded text-primary small fw-bold">${item.code}</code></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-primary py-1 px-1   select-flag-code" 
                                data-code="${item.code}">
                            <i class="ti-check me-1"></i>  
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
