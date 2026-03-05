@forelse ($flights as $flight)
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card premium-flight-card h-100">
            <div class="card-img-wrapper position-relative">
                @php
                    $firstImage = $flight->images->first();
                    $imagePath = $firstImage
                        ? asset('uploads/flights/' . $firstImage->file_name)
                        : asset('assets/dashboard/images/ImageNotFound.jpg');
                @endphp

                <img src="{{ $imagePath }}" class="card-img-top flight-hero-img" alt="{{ $flight->name }}"
                    style="height: 200px; width: 100%; object-fit: cover;">

                <span class="status-badge {{ $flight->status == 1 ? 'status-active' : 'status-inactive' }}">
                    {{ $flight->status == 1 ? __('general.active') : __('general.disabled') }}
                </span>

                <div class="item-actions">
                    <a href="{{ route('dashboard.flights.edit', $flight->id) }}" class="action-btn"
                        title="{{ __('general.edit') }}">
                        <i class="mdi mdi-pencil-outline"></i>
                    </a>
                </div>

                @php $minPrice = optional($flight->prices)->min('price'); @endphp
                @if ($minPrice)
                    <div class="price-badge">
                        {{ number_format($minPrice, 0) }} {{ __('flights.usd') }}
                    </div>
                @endif
            </div>

            <div class="card-body p-4">
                <h5 class="flight-title" title="{{ $flight->name }}">{{ $flight->name }}</h5>

                <div class="location-info d-flex align-items-center">
                    <i class="mdi mdi-map-marker-outline me-1"></i>
                    <span>{{ $flight->country->name }} / {{ $flight->city->name }}</span>
                </div>

                <div class="meta-info">
                    <div class="days-count">
                        <i class="mdi mdi-calendar-clock me-1"></i>
                        {{ $flight->days_num }} {{ __('flights.days_num') }}
                    </div>

                    <a href="{{ route('dashboard.flights.show', $flight->id) }}" class="btn-view">
                        {{ __('general.show') }}
                        <i class="mdi mdi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-12 py-5 text-center">
        <div class="bg-white rounded-4 p-5 shadow-sm border">
            <i class="mdi mdi-airplane-off fs-1 text-muted opacity-25 mb-3 d-block"></i>
            <h4 class="fw-bold text-dark">{{ __('flights.no_flights_found') }}</h4>
            <p class="text-muted mb-0">
                {{ __('categories.no_flights_msg') ?? 'We couldn\'t find any flights for this category yet.' }}
            </p>
        </div>
    </div>
@endforelse
