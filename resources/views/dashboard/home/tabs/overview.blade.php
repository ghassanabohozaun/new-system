<!-- begin: staticstics -->
<div class="row g-4 mb-5">

    {{-- Tickets --}}
    <div class="col-xl-3 col-lg-6">
        <div class="card stat-card">
            <div class="card-body">
                <div class="icon-box icon-soft-1">
                    <i class="icon-tag"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{!! ticketsCount() !!}</div>
                    <div class="stat-label">{!! __('dashboard.tickets_count') !!}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tours --}}
    <div class="col-xl-3 col-lg-6">
        <div class="card stat-card">
            <div class="card-body">
                <div class="icon-box icon-soft-2">
                    <i class="icon-compass"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{!! toursCount() !!}</div>
                    <div class="stat-label">{!! __('dashboard.tours_count') !!}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Reservations --}}
    <div class="col-xl-3 col-lg-6">
        <div class="card stat-card">
            <div class="card-body">
                <div class="icon-box icon-soft-3">
                    <i class="icon-calendar"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{!! reservationsCount() !!}</div>
                    <div class="stat-label">{!! __('dashboard.reservations_count') !!}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Flights --}}
    <div class="col-xl-3 col-lg-6">
        <div class="card stat-card">
            <div class="card-body">
                <div class="icon-box icon-soft-4">
                    <i class="icon-plane"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{!! flightsCount() !!}</div>
                    <div class="stat-label">{!! __('dashboard.flights_count') !!}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Payments --}}
    <div class="col-xl-3 col-lg-6">
        <div class="card stat-card">
            <div class="card-body">
                <div class="icon-box icon-soft-5">
                    <i class="icon-wallet"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">0</div>
                    <div class="stat-label">{!! __('dashboard.payments_total') !!}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Categories --}}
    <div class="col-xl-3 col-lg-6">
        <div class="card stat-card">
            <div class="card-body">
                <div class="icon-box icon-soft-info">
                    <i class="icon-list"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{!! categoriesCount() !!}</div>
                    <div class="stat-label">{!! __('dashboard.categories_count') !!}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Admins --}}
    <div class="col-xl-3 col-lg-6">
        <div class="card stat-card">
            <div class="card-body">
                <div class="icon-box icon-soft-danger">
                    <i class="icon-user-following"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{!! adminsCount() !!}</div>
                    <div class="stat-label">{!! __('dashboard.admins_count') !!}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Countries --}}
    <div class="col-xl-3 col-lg-6">
        <div class="card stat-card">
            <div class="card-body">
                <div class="icon-box icon-soft-primary">
                    <i class="icon-pointer"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{!! countriesCount() !!}</div>
                    <div class="stat-label">{!! __('dashboard.countries_count') !!}</div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end: staticstics -->


<div class="row">
    <div class="col-lg-12 d-flex flex-column">
        <div class="row flex-grow">
            <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="card-title card-title-dash">
                                    {{ __('dashboard.reservations_overview') }}</h4>
                                <p class="card-subtitle card-subtitle-dash">
                                    {{ __('dashboard.monthly_reservations_statistics') }}</p>
                            </div>
                            <div id="performance-line-legend"></div>
                        </div>
                        <div class="chartjs-wrapper mt-4">
                            <canvas id="reservationsChart" style="height: 350px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
