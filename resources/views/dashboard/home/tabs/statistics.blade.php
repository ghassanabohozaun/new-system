<div class="row">
    {{-- Recent Reservations (Promoted to top) --}}
    <div class="col-md-7 grid-margin stretch-card">
        <div class="card card-rounded">
            <div class="card-body">
                <h4 class="card-title card-title-dash">
                    {{ __('dashboard.recent_reservations') }}</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="ps-0">{{ __('dashboard.client') }}</th>
                                <th>{{ __('dashboard.service') }}</th>
                                <th>{{ __('dashboard.date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentReservations as $res)
                                <tr>
                                    <td class="ps-0">
                                        <p class="mb-0 fw-bold">{{ $res->client_name }}</p>
                                        <small class="text-muted">{{ $res->client_mobile }}</small>
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $res->service == 'flight' ? 'badge-opacity-primary' : ($res->service == 'ticket' ? 'badge-opacity-warning' : 'badge-opacity-success') }}">
                                            {{ __('dashboard.' . $res->service) }}
                                        </span>
                                    </td>
                                    <td>
                                        <p class="mb-0 small">
                                            @php
                                                try {
                                                    $date = \Carbon\Carbon::parse(
                                                        str_replace('/', '-', $res->created_at),
                                                    )->format('Y-m-d');
                                                } catch (\Exception $e) {
                                                    $date = $res->created_at;
                                                }
                                            @endphp
                                            {{ $date }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Yearly Statistics --}}
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card card-rounded">
            <div class="card-body">
                <h4 class="card-title card-title-dash">{{ __('dashboard.statistics') }}
                    ({{ now()->year }})</h4>
                <div class="row mt-3">
                    <div class="col-4">
                        <div class="wrapper text-center">
                            <p class="mb-2 text-muted">{{ __('dashboard.adults') }}</p>
                            <h3 class="fw-bold mb-0 text-primary">
                                {{ $demographics['adults'] ?? 0 }}</h3>
                        </div>
                    </div>
                    <div class="col-4 border-start border-end">
                        <div class="wrapper text-center">
                            <p class="mb-2 text-muted">{{ __('dashboard.children') }}</p>
                            <h3 class="fw-bold mb-0 text-warning">
                                {{ $demographics['children'] ?? 0 }}</h3>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="wrapper text-center">
                            <p class="mb-2 text-muted">{{ __('dashboard.babies') }}</p>
                            <h3 class="fw-bold mb-0 text-danger">
                                {{ $demographics['babies'] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <p class="mb-0">{{ __('dashboard.service_distribution') }}</p>
                    </div>
                    @php
                        $totalReservations = array_sum($serviceDistribution);
                        $flightP =
                            $totalReservations > 0
                                ? round((($serviceDistribution['flight'] ?? 0) / $totalReservations) * 100)
                                : 0;
                        $ticketP =
                            $totalReservations > 0
                                ? round((($serviceDistribution['ticket'] ?? 0) / $totalReservations) * 100)
                                : 0;
                        $tourP =
                            $totalReservations > 0
                                ? round((($serviceDistribution['tour'] ?? 0) / $totalReservations) * 100)
                                : 0;
                    @endphp
                    <div class="progress progress-md">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $flightP }}%"
                            aria-valuenow="{{ $flightP }}" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ $ticketP }}%"
                            aria-valuenow="{{ $ticketP }}" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $tourP }}%"
                            aria-valuenow="{{ $tourP }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-2 small text-muted">
                        <span>{{ __('dashboard.flight') }}: {{ $flightP }}%</span>
                        <span>{{ __('dashboard.ticket') }}: {{ $ticketP }}%</span>
                        <span>{{ __('dashboard.tour') }}: {{ $tourP }}%</span>
                    </div>
                </div>

                <div class="mt-4 pt-2">
                    <p class="card-subtitle card-subtitle-dash mb-2">
                        {{ __('dashboard.trip_types') }}</p>
                    @foreach ($tripTypes as $type => $count)
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="small">{{ __('dashboard.' . $type) }}</span>
                            <span class="badge badge-opacity-success small">{{ $count }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    {{-- Top Destinations --}}
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card card-rounded">
            <div class="card-body">
                <h4 class="card-title card-title-dash">{{ __('dashboard.top_destinations') }}
                    ({{ now()->year }})</h4>
                <div class="row mt-3">
                    @foreach ($topDestinations as $name => $count)
                        <div class="col-md-4 col-lg-2">
                            <div class="d-flex justify-content-between align-items-center border-bottom py-2 me-3">
                                <div class="d-flex align-items-center">
                                    <i class="icon-location text-primary me-2"></i>
                                    <p class="mb-0 small">{{ $name }}</p>
                                </div>
                                <b class="text-dark">{{ $count }}</b>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
