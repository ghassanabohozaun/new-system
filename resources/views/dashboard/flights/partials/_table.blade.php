<div class="table-responsive table-responsive-custom">
    <table class="table table-hover" id="responsiveTable">
        <thead>
            <tr>
                <th class="details-col"></th>
                <th class="text-start">#</th>
                <th class="text-start d-none">{!! __('flights.images') !!}</th>
                <th class="text-start" style="min-width: 200px;">{!! __('flights.flight_name') !!}</th>
                <th class="text-start d-none d-xl-table-cell">{!! __('flights.country_id') !!}</th>
                <th class="text-start d-none d-xl-table-cell">{!! __('flights.city_id') !!}</th>
                <th class="text-start d-none d-xl-table-cell">{!! __('flights.category_id') !!}</th>
                <th class="text-start d-none d-xl-table-cell">{!! __('flights.reservations_count_total') !!}</th>
                <th class="text-center d-none d-md-table-cell">{!! __('flights.status') !!}</th>
                <th class="text-center d-none d-xl-table-cell">{!! __('flights.manage_status') !!}</th>
                <th class="text-center">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($flights as $flight)
                <tr id="flight-row-{{ $flight->id }}">
                    <td class="details-col">
                        <i class="mdi mdi-plus-circle details-control" data-title="{!! $flight->getTranslation('name', Lang()) !!}"></i>
                    </td>
                    <td class="text-start">{!! $loop->iteration !!}</td>
                    <td class="text-start d-none">
                        @include('dashboard.flights.parts.photo', ['flight' => $flight])
                    </td>
                    <td class="text-start"
                        style="min-width: 200px; max-width: 350px; white-space: normal; word-break: break-word;">
                        {!! $flight->getTranslation('name', Lang()) !!}</td>
                    <td class="text-start d-none d-xl-table-cell">{!! $flight->country->getTranslation('name', Lang()) ?? '-' !!}</td>
                    <td class="text-start d-none d-xl-table-cell">{!! $flight->city->getTranslation('name', Lang()) ?? '-' !!}</td>
                    <td class="text-start d-none d-xl-table-cell">{!! $flight->category->getTranslation('name', Lang()) ?? '-' !!}</td>
                    <td class="text-start d-none d-xl-table-cell">
                        <span class="badge badge-opacity-info">
                            {!! $flight->reservations_count ?? 0 !!}
                        </span>
                    </td>
                    <td class="text-center d-none d-md-table-cell td-fit td-center-content">
                        @include('dashboard.flights.parts.status', ['flight' => $flight])
                    </td>
                    <td class="text-center d-none d-xl-table-cell td-fit td-center-content">
                        @include('dashboard.flights.parts.manage-status', ['flight' => $flight])
                    </td>
                    <td class="text-end td-fit">
                        @include('dashboard.flights.parts.actions', ['flight' => $flight])
                    </td>

                    {{-- Hidden content for Details Modal --}}
                    <td class="d-none row-details">
                        <div class="px-2 py-3">
                            <div class="d-flex align-items-center mb-4 p-3 bg-light rounded-3 border">
                                <div class="me-3 flex-shrink-0">
                                    @include('dashboard.flights.parts.photo', ['flight' => $flight])
                                </div>
                                <div>
                                    <h5 class="mb-1 text-dark fw-bold" style="font-size: 1.1rem;">
                                        {!! $flight->getTranslation('name', Lang()) !!}
                                    </h5>
                                    <div class="d-flex align-items-center text-muted small">
                                        <i class="mdi mdi-calendar-blank me-1"></i>
                                        <span>{!! $flight->days_num !!} {!! __('flights.days_num') !!} /
                                            {!! $flight->nights_num !!} {!! __('flights.nights_num') !!}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="p-3 border rounded-3 bg-white h-100 shadow-sm">
                                        <label class="small text-muted d-block text-uppercase fw-bold mb-2"
                                            style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                            <i class="mdi mdi-earth me-1"></i>{!! __('flights.country_id') !!}
                                        </label>
                                        <span
                                            class="badge badge-opacity-primary rounded-pill px-3 py-2 fw-bold d-inline-flex align-items-center"
                                            style="font-size: 0.85rem;">
                                            {!! $flight->country->getTranslation('name', Lang()) ?? '-' !!}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="p-3 border rounded-3 bg-white h-100 shadow-sm">
                                        <label class="small text-muted d-block text-uppercase fw-bold mb-2"
                                            style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                            <i class="mdi mdi-city me-1"></i>{!! __('flights.city_id') !!}
                                        </label>
                                        <span
                                            class="badge badge-opacity-primary rounded-pill px-3 py-2 fw-bold d-inline-flex align-items-center"
                                            style="font-size: 0.85rem;">
                                            {!! $flight->city->getTranslation('name', Lang()) ?? '-' !!}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="p-3 border rounded-3 bg-white h-100 shadow-sm">
                                        <label class="small text-muted d-block text-uppercase fw-bold mb-2"
                                            style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                            <i class="mdi mdi-shape-outline me-1"></i>{!! __('flights.category_id') !!}
                                        </label>
                                        <span
                                            class="badge badge-opacity-primary rounded-pill px-3 py-2 fw-bold d-inline-flex align-items-center"
                                            style="font-size: 0.85rem;">
                                            {!! $flight->category->getTranslation('name', Lang()) ?? '-' !!}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <div
                                        class="p-3 border rounded-3 bg-white h-100 shadow-sm d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3 border shadow-sm"
                                                style="width: 36px; height: 36px;">
                                                <i class="mdi mdi-toggle-switch-outline text-primary fs-5"></i>
                                            </div>
                                            <div>
                                                <label class="small text-muted d-block text-uppercase fw-bold mb-0"
                                                    style="font-size: 0.7rem;">{!! __('flights.status') !!}</label>
                                                <div class="mt-1">
                                                    @include('dashboard.flights.parts.status', [
                                                        'flight' => $flight,
                                                    ])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="text-center text-muted py-4">
                        <x-dashboard.empty-state icon="mdi-airplane-off" :message="__('flights.no_flights_found')" />
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4 pagination-wrapper d-flex justify-content-end">
        {!! $flights->withQueryString()->links() !!}
    </div>
</div>
