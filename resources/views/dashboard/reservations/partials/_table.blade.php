@if ($reservations->count() > 0)
    <div class="table-responsive table-responsive-custom">
        <table class="table table-hover" id="responsiveTable">
            <thead>
                <tr>
                    <th class="details-col"></th>
                    <th class="text-start">#</th>
                    <th class="text-start">{!! __('reservations.client_name') !!} / {!! __('reservations.client_mobile') !!}</th>
                    <th class="text-start d-none d-md-table-cell">{!! __('reservations.service') !!}</th>
                    <th class="text-start d-none d-lg-table-cell">{!! __('reservations.flight') !!} & {!! __('reservations.ticket') !!}</th>
                    <th class="text-center">{!! __('general.actions') !!}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $index => $reservation)
                    <tr id="row-{{ $reservation->id }}">
                        <!-- Details Control (+) -->
                        <td class="details-col">
                            <i class="mdi mdi-plus-circle details-control"
                                data-title="{{ $reservation->client_name }}"></i>
                        </td>

                        <!-- Iteration (#) -->
                        <td class="text-start">
                            {{-- {{ $reservations->firstItem() + $index }} --}}
                            {!! $loop->iteration !!}
                        </td>

                        <!-- Client Info -->
                        <td class="text-start">
                            <div class="fw-bold mb-1">{{ $reservation->client_name }}</div>
                            <small class="text-muted d-flex align-items-center">
                                <i class="mdi mdi-phone me-1"></i> {{ $reservation->client_mobile }}
                            </small>
                        </td>

                        <!-- Service Type -->
                        <td class="text-start d-none d-md-table-cell">
                            <span class="badge badge-opacity-primary rounded-pill px-3 py-2 fw-bold">
                                {{ $reservation->reservationService() }}
                            </span>
                        </td>

                        <!-- Flight & Ticket -->
                        <td class="text-start d-none d-lg-table-cell">
                            @if ($reservation->flight)
                                <div class="mb-1"><i class="mdi mdi-airplane me-1 text-info"></i>
                                    {{ $reservation->flight->name }}</div>
                            @endif
                            @if ($reservation->ticket)
                                <small class="text-muted"><i class="mdi mdi-ticket me-1"></i>
                                    {{ $reservation->ticket->title }}</small>
                            @endif
                            @if (!$reservation->flight && !$reservation->ticket)
                                <span class="text-muted">-</span>
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="text-end td-fit">
                            @include('dashboard.reservations.parts.actions', [
                                'reservation' => $reservation,
                            ])
                        </td>
                    </tr>

                    <!-- HIDDEN ROW FOR DETAILS MODAL -->
                    <tr class="d-none row-details" id="details-{{ $reservation->id }}">
                        <td colspan="8">
                            <div class="px-2 py-3">
                                <div class="d-flex align-items-center mb-4 p-3 bg-light rounded-3 border">
                                    <div class="rounded-circle bg-white d-flex align-items-center justify-content-center me-3 border shadow-sm"
                                        style="width: 48px; height: 48px;">
                                        <i class="mdi mdi-account-circle text-primary fs-3"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1 text-dark fw-bold" style="font-size: 1.1rem;">
                                            {{ $reservation->client_name }}
                                        </h5>
                                        <div class="d-flex align-items-center text-muted small">
                                            <i class="mdi mdi-phone me-1"></i>
                                            <span>{{ $reservation->client_mobile }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <!-- Service -->
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded-3 bg-white h-100 shadow-sm">
                                            <label class="small text-muted d-block text-uppercase fw-bold mb-2"
                                                style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                                <i class="mdi mdi-shape-outline me-1"></i>{!! __('reservations.service') !!}
                                            </label>
                                            <span
                                                class="badge badge-opacity-primary rounded-pill px-3 py-2 fw-bold d-inline-flex align-items-center"
                                                style="font-size: 0.85rem;">
                                                {{ $reservation->reservationService() }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Flight & Ticket -->
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded-3 bg-white h-100 shadow-sm">
                                            <label class="small text-muted d-block text-uppercase fw-bold mb-2"
                                                style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                                <i class="mdi mdi-airplane me-1"></i>{!! __('reservations.flight') !!} &
                                                {!! __('reservations.ticket') !!}
                                            </label>
                                            <div class="fw-medium text-dark d-flex flex-column gap-1">
                                                @if ($reservation->flight)
                                                    <span class="fw-bold">{{ $reservation->flight->name }}</span>
                                                @endif
                                                @if ($reservation->ticket)
                                                    <small class="text-muted">{{ $reservation->ticket->title }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Created At -->
                                    <div class="col-md-6 mt-3">
                                        <div class="p-3 border rounded-3 bg-white h-100 shadow-sm">
                                            <label class="small text-muted d-block text-uppercase fw-bold mb-2"
                                                style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                                <i class="mdi mdi-calendar-clock me-1"></i>{!! __('categories.created_at') !!}
                                            </label>
                                            <span class="fw-bold text-dark">{{ $reservation->created_at }}</span>
                                        </div>
                                    </div>

                                    <!-- Passport/Email -->
                                    <div class="col-md-6 mt-3">
                                        <div class="p-3 border rounded-3 bg-white h-100 shadow-sm">
                                            <label class="small text-muted d-block text-uppercase fw-bold mb-2"
                                                style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                                <i class="mdi mdi-information-outline me-1"></i>{!! __('reservations.additional_info') !!}
                                            </label>
                                            <div class="small text-muted">
                                                <div><strong>Email:</strong> {{ $reservation->client_email ?? '-' }}
                                                </div>
                                                <div><strong>Passport:</strong>
                                                    {{ $reservation->client_passport_number ?? '-' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Pagination Wrapper -->
    <div class="d-flex justify-content-between align-items-center mt-3 pagination-wrapper">
        <div class="text-muted small">
            {!! __('general.showing') !!} <span class="fw-bold">{{ $reservations->firstItem() }}</span>
            {!! __('general.to') !!} <span class="fw-bold">{{ $reservations->lastItem() }}</span>
            {!! __('general.of') !!} <span class="fw-bold">{{ $reservations->total() }}</span> {!! __('general.entries') !!}
        </div>
        <div>
            {{ $reservations->withQueryString()->links() }}
        </div>
    </div>
@else
    <x-dashboard.empty-state icon="mdi-airplane-off" :message="__('reservations.no_reservations_found')" />
@endif
