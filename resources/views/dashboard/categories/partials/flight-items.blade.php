@forelse ($flights as $flight)
    <div class="col-xl-4 col-md-6 mb-5">
        <div class="card premium-flight-card border-0 h-100">
            <!-- Image & Glass Overlays -->
            <div class="card-img-wrapper position-relative overflow-hidden">
                @if ($flight->images->isNotEmpty())
                    <img src="{!! asset('uploads/flights/' . $flight->images->first()->file_name) !!}" class="card-img-top flight-hero-img" alt="{{ $flight->name }}">
                @else
                    <div class="no-img-placeholder d-flex align-items-center justify-content-center bg-light">
                        <i class="mdi mdi-image-off fs-1 text-muted opacity-25"></i>
                    </div>
                @endif

                <!-- Glass Badge: Status -->
                <div class="glass-overlay-top p-3 d-flex justify-content-between align-items-start w-100">
                    <span
                        class="glass-badge status-badge {{ $flight->status == 1 ? 'status-active' : 'status-inactive' }}">
                        <span class="status-dot"></span>
                        {{ $flight->status == 1 ? __('general.enable') : __('general.disabled') }}
                    </span>

                    <div class="action-float-group">
                        <a href="{{ route('dashboard.flights.edit', $flight->id) }}" class="glass-mini-btn me-2"
                            title="{{ __('general.edit') }}">
                            <i class="mdi mdi-pencil-outline"></i>
                        </a>
                    </div>
                </div>

                <!-- Glass Badge: Price (Bottom) -->
                @php $minPrice = optional($flight->prices)->min('price'); @endphp
                @if ($minPrice)
                    <div class="glass-price-tag">
                        <span class="price-label">{{ __('flights.starting_from') }}</span>
                        <span class="price-value">{{ number_format($minPrice, 0) }}<small
                                class="currency">{{ __('flights.usd') }}</small></span>
                    </div>
                @endif
            </div>

            <!-- Content Body -->
            <div class="card-body px-4 pt-4 pb-3">
                <div class="d-flex align-items-center mb-2">
                    <span class="category-pill mb-0">
                        <i class="mdi mdi-tag-outline me-1"></i> {{ $category->name }}
                    </span>
                </div>

                <h5 class="flight-title mb-2 text-truncate-2" title="{{ $flight->name }}">{{ $flight->name }}</h5>

                <div class="location-group d-flex align-items-center mb-3">
                    <div class="location-icon-wrapper me-2">
                        <i class="mdi mdi-map-marker-radius"></i>
                    </div>
                    <span class="location-text">{{ $flight->country->name }} / {{ $flight->city->name }}</span>
                </div>

                <p class="flight-excerpt mb-4 line-clamp-2">
                    {!! strip_tags($flight->details) !!}
                </p>

                <!-- Footer Stats & Main CTA -->
                <div class="card-footer-luxury d-flex align-items-center justify-content-between pt-3 border-top">
                    <div class="meta-item d-flex align-items-center">
                        <i class="mdi mdi-clock-check-outline me-2 text-primary"></i>
                        <span class="meta-value fw-bold">{{ $flight->days_num }}</span>
                        <span class="meta-label ms-1">{{ __('flights.days_num') }}</span>
                    </div>

                    <a href="{{ route('dashboard.flights.show', $flight->id) }}" class="btn-premium-cta">
                        <span>{{ __('general.show') }}</span>
                        <i class="mdi mdi-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Seamless Stretched Link (excluding actions) -->
            <a href="{{ route('dashboard.flights.show', $flight->id) }}" class="stretched-link"></a>
        </div>
    </div>
@empty
    <div class="col-12 py-5 text-center">
        <div class="empty-state-luxury p-5 animate__animated animate__fadeIn">
            <div class="empty-icon-box mx-auto mb-4">
                <i class="mdi mdi-airplane-off"></i>
            </div>
            <h3 class="fw-bold text-dark">{{ __('flights.no_flights_found') }}</h3>
            <p class="text-muted fs-5 mb-0">
                {{ __('categories.no_flights_msg') ?? 'We couldn\'t find any flights for this category yet.' }}</p>
        </div>
    </div>
@endforelse
