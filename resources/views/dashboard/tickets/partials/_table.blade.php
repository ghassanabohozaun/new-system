<div class="table-responsive table-responsive-custom">
    <table class="table table-hover" id="responsiveTable">
        <thead>
            <tr>
                <th class="details-col"></th>
                <th class="text-start">#</th>
                <th class="text-start d-none d-lg-table-cell">{!! __('tickets.photo') !!}</th>
                <th class="text-start">{!! __('tickets.title') !!}</th>
                <th class="text-start d-none d-lg-table-cell">{!! __('tickets.price') !!}</th>
                <th class="text-start d-none d-xl-table-cell">{!! __('tickets.from_country_id') !!}</th>
                <th class="text-start d-none d-xl-table-cell">{!! __('tickets.to_country_id') !!}</th>
                <th class="text-center d-none d-md-table-cell">{!! __('tickets.status') !!}</th>
                <th class="text-center d-none d-xl-table-cell">{!! __('tickets.manage_status') !!}</th>
                <th class="text-center">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tickets as $ticket)
                <tr id="ticket-row-{{ $ticket->id }}">
                    <td class="details-col">
                        <i class="mdi mdi-plus-circle details-control" data-title="{!! $ticket->getTranslation('title', Lang()) !!}"></i>
                    </td>
                    <td class="text-start">{!! $loop->iteration !!}</td>
                    <td class="text-start d-none d-lg-table-cell">
                        @include('dashboard.tickets.parts.photo', ['ticket' => $ticket])
                    </td>
                    <td class="text-start">{!! $ticket->getTranslation('title', Lang()) !!}</td>
                    <td class="text-start d-none d-lg-table-cell">{!! $ticket->price !!}</td>
                    <td class="text-start d-none d-xl-table-cell">{!! $ticket->fromCountry->name ?? '-' !!}</td>
                    <td class="text-start d-none d-xl-table-cell">{!! $ticket->toCountry->name ?? '-' !!}</td>
                    <td class="text-center d-none d-md-table-cell td-fit td-center-content">
                        @include('dashboard.tickets.parts.status', ['ticket' => $ticket])
                    </td>
                    <td class="text-center d-none d-xl-table-cell td-fit td-center-content">
                        @include('dashboard.tickets.parts.manage-status', ['ticket' => $ticket])
                    </td>
                    <td class="text-end td-fit">
                        @include('dashboard.tickets.parts.actions', ['ticket' => $ticket])
                    </td>

                    {{-- Hidden content for Details Modal --}}
                    <td class="d-none row-details">
                        <div class="px-2 py-3">
                            <div class="d-flex align-items-center mb-4 p-3 bg-light rounded-3 border">
                                <div class="me-3 flex-shrink-0">
                                    @include('dashboard.tickets.parts.photo', ['ticket' => $ticket])
                                </div>
                                <div>
                                    <h5 class="mb-1 text-dark fw-bold" style="font-size: 1.1rem;">
                                        {!! $ticket->getTranslation('title', Lang()) !!}
                                    </h5>
                                    <div class="d-flex align-items-center text-muted small">
                                        <i class="mdi mdi-cash-multiple me-1"></i>
                                        <span>{!! $ticket->price !!}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="p-3 border rounded-3 bg-white h-100 shadow-sm">
                                        <label class="small text-muted d-block text-uppercase fw-bold mb-2"
                                            style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                            <i class="mdi mdi-airplane-takeoff me-1"></i>{!! __('tickets.from_country_id') !!}
                                        </label>
                                        <span
                                            class="badge badge-opacity-primary rounded-pill px-3 py-2 fw-bold d-inline-flex align-items-center"
                                            style="font-size: 0.85rem;">
                                            {!! $ticket->fromCountry->name ?? '-' !!}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="p-3 border rounded-3 bg-white h-100 shadow-sm">
                                        <label class="small text-muted d-block text-uppercase fw-bold mb-2"
                                            style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                            <i class="mdi mdi-airplane-landing me-1"></i>{!! __('tickets.to_country_id') !!}
                                        </label>
                                        <span
                                            class="badge badge-opacity-primary rounded-pill px-3 py-2 fw-bold d-inline-flex align-items-center"
                                            style="font-size: 0.85rem;">
                                            {!! $ticket->toCountry->name ?? '-' !!}
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
                                                    style="font-size: 0.7rem;">{!! __('tickets.status') !!}</label>
                                                <div class="mt-1">
                                                    @include('dashboard.tickets.parts.status', [
                                                        'ticket' => $ticket,
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
                    <td colspan="10" class="text-center text-muted py-4">
                        {!! __('tickets.no_tickets_found') !!}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4 pagination-wrapper d-flex justify-content-end">
        {!! $tickets->links() !!}
    </div>
</div>
