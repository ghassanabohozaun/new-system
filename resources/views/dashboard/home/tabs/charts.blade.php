<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card card-rounded">
            <div class="card-body">
                <h4 class="card-title card-title-dash">{{ __('dashboard.most_viewed_flights') }}
                </h4>
                <div class="chart-container"
                    style="position: relative; height:400px; display: flex; justify-content: center;">
                    <canvas id="viewsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card card-rounded">
            <div class="card-body">
                <h4 class="card-title card-title-dash">
                    {{ __('dashboard.service_distribution') }}</h4>
                <div class="chart-container"
                    style="position: relative; height:320px; display: flex; justify-content: center;">
                    <canvas id="serviceDistributionChart"></canvas>
                </div>
                <div id="service-distribution-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card card-rounded">
            <div class="card-body">
                <h4 class="card-title card-title-dash">{{ __('dashboard.top_nationalities') }}
                </h4>
                <div class="chart-container"
                    style="position: relative; height:320px; display: flex; justify-content: center;">
                    <canvas id="nationalitiesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
