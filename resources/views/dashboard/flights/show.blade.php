@extends('layouts.dashboard.app')

@section('title', $title)

@section('content')
    <div class="content-wrapper deluxe-show-wrapper">
        <!-- Floating Luxury Header -->
        <div class="hero-header-glass mb-4 p-4 rounded-4 shadow-sm">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb deluxe-breadcrumb mb-3">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.index') }}">{{ __('dashboard.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.flights.index') }}">{{ __('flights.flights') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $flight->name }}
                            </li>
                        </ol>
                    </nav>
                    <div class="d-flex align-items-center gap-4">
                        <div class="header-orb bg-primary-gradient">
                            <i class="mdi mdi-airplane-takeoff text-white fs-2"></i>
                        </div>
                        <div class="header-title-container">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <h1 class="ar-title">{{ $flight->getTranslation('name', 'ar') }}</h1>
                                <span class="badge-status-header {{ $flight->status == 1 ? 'active' : 'disabled' }}">
                                    <i class="mdi {{ $flight->status == 1 ? 'mdi-check-circle' : 'mdi-border-color' }}"></i>
                                    {{ $flight->status == 1 ? __('general.enable') : __('general.disabled') }}
                                </span>
                            </div>
                            <h2 class="en-subtitle">{{ $flight->getTranslation('name', 'en') }}</h2>

                            <div class="d-flex flex-wrap align-items-center gap-3 mt-3">
                                <span class="text-muted fs-7 d-flex align-items-center gap-2">
                                    <i class="mdi mdi-tag-outline text-primary"></i>
                                    <span
                                        class="fw-bold ">{{ $flight->category?->getTranslation('name', app()->getLocale()) ?? __('flights.no_category') }}</span>
                                </span>
                                <span class="text-muted fs-7 d-flex align-items-center gap-2">
                                    <i class="mdi mdi-map-marker text-danger"></i>
                                    {{ $flight->country->name }} / {{ $flight->city->name }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">
                    <div class="action-group-glass d-inline-flex gap-2 p-3 rounded-4">
                        <a href="{{ route('dashboard.flights.edit', $flight->id) }}"
                            class="btn btn-premium-gradient px-4 py-2 fw-bold shadow-sm">
                            <i class="mdi mdi-pencil-outline me-2"></i> {{ __('flights.update_flight') }}
                        </a>
                        <a href="{{ route('dashboard.flights.index') }}"
                            class="btn btn-light px-4 py-2 fw-bold border shadow-sm">
                            <i class="mdi mdi-arrow-left me-2"></i> {{ __('general.back') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Main Panel -->
            <div class="col-xl-8">
                <!-- Bilingual Description Card -->
                <div class="card deluxe-card-glass border-0 mb-4 overflow-hidden">
                    <div class="card-header border-0 bg-transparent pt-4 px-4">
                        <h5 class="fw-bold mb-0 d-flex align-items-center gap-2">
                            <i class="mdi mdi-text-subject text-primary"></i> {{ __('flights.basic_info') }}
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <div class="col-md-6 border-end-md">
                                <label class="text-muted small mb-2 d-block">العربية</label>
                                <div class="lux-details-box ar-font">
                                    {{ $flight->getTranslation('details', 'ar') }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="text-muted small mb-2 d-block">English</label>
                                <div class="lux-details-box en-font">
                                    {{ $flight->getTranslation('details', 'en') }}
                                </div>
                            </div>
                        </div>

                        <div class="lux-hr my-4"></div>

                        <div class="row g-3">
                            <div class="col-6 col-md-3">
                                <div class="stat-glass-card p-3 rounded-4 text-center">
                                    <i class="mdi mdi-calendar-import text-success mb-2 fs-4"></i>
                                    <small class="text-muted d-block">{{ __('flights.offer_duration_from') }}</small>
                                    <span class="fw-bold text-dark">{{ $flight->offer_duration_from }}</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="stat-glass-card p-3 rounded-4 text-center">
                                    <i class="mdi mdi-calendar-export text-danger mb-2 fs-4"></i>
                                    <small class="text-muted d-block">{{ __('flights.offer_duration_to') }}</small>
                                    <span class="fw-bold text-dark">{{ $flight->offer_duration_to }}</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="stat-glass-card p-3 rounded-4 text-center">
                                    <i class="mdi mdi-weather-night text-warning mb-2 fs-4"></i>
                                    <small class="text-muted d-block">{{ __('flights.nights_num') }}</small>
                                    <span class="fw-bold text-dark">{{ $flight->nights_num }}</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="stat-glass-card p-3 rounded-4 text-center">
                                    <i class="mdi mdi-white-balance-sunny text-primary mb-2 fs-4"></i>
                                    <small class="text-muted d-block">{{ __('flights.days_num') }}</small>
                                    <span class="fw-bold text-dark">{{ $flight->days_num }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ultimate Tabbed Card -->
                <div class="card deluxe-card-glass border-0 mb-4 overflow-hidden">
                    <div class="card-header border-0 bg-transparent p-0">
                        <ul class="nav nav-tabs custom-view-tabs-soft mb-0 border-0" id="flightTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active font-cairo" id="pricing-tab" data-bs-toggle="tab"
                                    data-bs-target="#pricing-pane" type="button" role="tab"
                                    aria-controls="pricing-pane" aria-selected="true">
                                    <i class="mdi mdi-cash-multiple"></i> {{ __('flights.pricing') }}
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link font-cairo" id="services-tab" data-bs-toggle="tab"
                                    data-bs-target="#services-pane" type="button" role="tab"
                                    aria-controls="services-pane" aria-selected="false">
                                    <i class="mdi mdi-room-service-outline"></i> {{ __('flights.services') }}
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link font-cairo" id="including-tab" data-bs-toggle="tab"
                                    data-bs-target="#including-pane" type="button" role="tab"
                                    aria-controls="including-pane" aria-selected="false">
                                    <i class="mdi mdi-check-circle"></i>
                                    {{ __('flights.tab_including') }}
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link font-cairo" id="not-including-tab" data-bs-toggle="tab"
                                    data-bs-target="#not-including-pane" type="button" role="tab"
                                    aria-controls="not-including-pane" aria-selected="false">
                                    <i class="mdi mdi-close-circle"></i>
                                    {{ __('flights.tab_not_including') }}
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link font-cairo" id="notes-tab" data-bs-toggle="tab"
                                    data-bs-target="#notes-pane" type="button" role="tab"
                                    aria-controls="notes-pane" aria-selected="false">
                                    <i class="mdi mdi-note-edit-outline"></i>
                                    {{ __('flights.tab_notes') }}
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4 deluxe-tab-body">
                        <div class="tab-content" id="flightTabsContent">
                            <!-- Pricing Pane -->
                            <div class="tab-pane fade show active" id="pricing-pane" role="tabpanel"
                                aria-labelledby="pricing-tab">
                                <div class="price-scroll-container">
                                    <div class="row g-3">
                                        @forelse ($flight->flightPrices as $price)
                                            <div class="col-md-6">
                                                <div
                                                    class="price-card-glass p-3 rounded-4 h-100 {{ $price->main_option ? 'featured-price shadow-sm' : '' }}">
                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                        <div class="price-header d-flex align-items-center gap-2">
                                                            <div
                                                                class="price-badge-small {{ $price->main_option ? 'bg-success' : 'bg-soft-success text-success' }}">
                                                                <i
                                                                    class="mdi mdi-currency-usd {{ $price->main_option ? 'text-white' : '' }}"></i>
                                                            </div>
                                                            <h4 class="mb-0 fw-bold">{{ number_format($price->price, 2) }}
                                                                <small class="fs-6 opacity-50">USD</small>
                                                            </h4>
                                                        </div>
                                                        @if ($price->main_option)
                                                            <span
                                                                class="badge bg-success rounded-pill px-2 py-1 fs-xs">{{ __('flights.main_option') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="bilingual-text-box">
                                                        <div class="ar-text mb-1 text-dark fw-bold font-cairo">
                                                            {{ $price->getTranslation('text', 'ar') }}</div>
                                                        <div class="en-text text-muted fs-xs border-top pt-1 mt-1 en-font">
                                                            {{ $price->getTranslation('text', 'en') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <p class="text-muted small w-100 text-center py-4">
                                                    {{ __('flights.no_prices_found') }}</p>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                            <!-- Services Pane -->
                            <div class="tab-pane fade" id="services-pane" role="tabpanel"
                                aria-labelledby="services-tab">
                                <div class="d-flex flex-wrap gap-2">
                                    @forelse ($flight->flightServices as $srv)
                                        <div class="badge-deluxe-tag px-3 py-2 d-flex flex-column align-items-start gap-1">
                                            <div class="fw-bold text-dark ar-font">
                                                {{ $srv->getTranslation('name', 'ar') }}</div>
                                            <div class="text-muted fs-xs border-top w-100 pt-1 en-font">
                                                {{ $srv->getTranslation('name', 'en') }}</div>
                                        </div>
                                    @empty
                                        <p class="text-muted small w-100 text-center py-4">
                                            {{ __('flights.no_services_found') }}</p>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Including Pane -->
                            <div class="tab-pane fade" id="including-pane" role="tabpanel"
                                aria-labelledby="including-tab">
                                <div class="scroll-area-deluxe">
                                    @forelse ($flight->flightIncludings as $inc)
                                        <div
                                            class="policy-item-bilingual lux-item-animated p-3 rounded-4 bg-success-light mb-3 border border-success-subtle">
                                            <div class="d-flex flex-column gap-3 text-end">
                                                <div class="d-flex align-items-center justify-content-between gap-3">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <span
                                                            class="badge bg-success-soft text-success border border-success-subtle px-2 py-1 fs-xs font-cairo">العربية</span>
                                                        <div class="ar-text text-dark fw-bold ar-font">
                                                            {{ $inc->getTranslation('text', 'ar') }}</div>
                                                    </div>
                                                    <i
                                                        class="mdi mdi-check-decagram text-success fs-4 animate-pulse-soft"></i>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center justify-content-between gap-3 border-top border-success-subtle pt-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <span
                                                            class="badge bg-light text-muted border px-2 py-1 fs-xs en-font">English</span>
                                                        <div class="en-text text-muted fw-medium en-font text-start">
                                                            {{ $inc->getTranslation('text', 'en') }}</div>
                                                    </div>
                                                    <i class="mdi mdi-translate text-success-light opacity-50 fs-5"></i>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-muted small w-100 text-center py-4">
                                            {{ __('flights.no_offer_including_found') }}</p>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Not Including Pane -->
                            <div class="tab-pane fade" id="not-including-pane" role="tabpanel"
                                aria-labelledby="not-including-tab">
                                <div class="scroll-area-deluxe">
                                    @forelse ($flight->flightNotIncludings as $notInc)
                                        <div
                                            class="policy-item-bilingual lux-item-animated p-3 rounded-4 bg-danger-light mb-3 border border-danger-subtle">
                                            <div class="d-flex flex-column gap-3 text-end">
                                                <div class="d-flex align-items-center justify-content-between gap-3">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <span
                                                            class="badge bg-danger-soft text-danger border border-danger-subtle px-2 py-1 fs-xs font-cairo">العربية</span>
                                                        <div class="ar-text text-dark fw-bold ar-font">
                                                            {{ $notInc->getTranslation('text', 'ar') }}</div>
                                                    </div>
                                                    <i
                                                        class="mdi mdi-close-octagon text-danger fs-4 animate-shake-soft"></i>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center justify-content-between gap-3 border-top border-danger-subtle pt-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <span
                                                            class="badge bg-light text-muted border px-2 py-1 fs-xs en-font">English</span>
                                                        <div class="en-text text-muted fw-medium en-font text-start">
                                                            {{ $notInc->getTranslation('text', 'en') }}</div>
                                                    </div>
                                                    <i class="mdi mdi-translate text-danger-light opacity-50 fs-5"></i>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-muted small w-100 text-center py-4">
                                            {{ __('flights.no_offer_not_including_found') }}</p>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Notes Pane -->
                            <div class="tab-pane fade" id="notes-pane" role="tabpanel" aria-labelledby="notes-tab">
                                <div class="scroll-area-notes">
                                    @forelse ($flight->flightNotes as $note)
                                        <div
                                            class="lux-note-item-bilingual lux-item-animated p-3 rounded-4 bg-white-50 mb-3 border border-warning-subtle">
                                            <div class="d-flex flex-column gap-3">
                                                <div
                                                    class="d-flex align-items-center justify-content-between gap-3 text-end">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <span
                                                            class="badge bg-warning-soft text-warning border border-warning-subtle px-2 py-1 fs-xs font-cairo">العربية</span>
                                                        <div class="ar-text text-dark fw-bold ar-font">
                                                            {{ $note->getTranslation('text', 'ar') }}</div>
                                                    </div>
                                                    <i class="mdi mdi-information-variant text-warning fs-4"></i>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center justify-content-between gap-3 border-top pt-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <span
                                                            class="badge bg-light text-muted border px-2 py-1 fs-xs en-font">English</span>
                                                        <div class="en-text text-muted fw-medium en-font">
                                                            {{ $note->getTranslation('text', 'en') }}</div>
                                                    </div>
                                                    <i class="mdi mdi-translate text-warning opacity-30 fs-5"></i>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-muted small w-100 text-center py-4">
                                            {{ __('flights.no_notes_found') }}</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-xl-4">
                <div class="card deluxe-card-glass border-0 mb-4 position-sticky" style="top: 2rem;">
                    <div class="card-header bg-transparent border-0 pt-4 px-4">
                        <h5 class="fw-bold mb-0 d-flex align-items-center gap-2"><i
                                class="mdi mdi-camera-burst text-secondary"></i> {{ __('flights.media_gallery') }}</h5>
                    </div>
                    <div class="card-body p-4">
                        @if ($flight->images->isNotEmpty())
                            <div id="deluxeCarousel" class="carousel slide carousel-fade mb-4" data-bs-ride="carousel">
                                <div class="carousel-inner rounded-5 shadow-deluxe overflow-hidden">
                                    @foreach ($flight->images as $index => $img)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('uploads/flights/' . $img->file_name) }}"
                                                class="d-block w-100 showcase-img" alt="Flight Image" loading="lazy">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#deluxeCarousel"
                                    data-bs-slide="prev"><span class="carousel-icon-box"><i
                                            class="mdi mdi-chevron-left"></i></span></button>
                                <button class="carousel-control-next" type="button" data-bs-target="#deluxeCarousel"
                                    data-bs-slide="next"><span class="carousel-icon-box"><i
                                            class="mdi mdi-chevron-right"></i></span></button>
                            </div>
                            <div class="mini-grid-scroll">
                                <div class="row g-2">
                                    @foreach ($flight->images as $img)
                                        <div class="col-4">
                                            <div class="mini-thumb-glass overflow-hidden rounded-4">
                                                <img src="{{ asset('uploads/flights/' . $img->file_name) }}"
                                                    class="w-100 mini-thumb-img" alt="Thumbnail">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="empty-media-box text-center p-5 rounded-5 border-dashed">
                                <i class="mdi mdi-image-off-outline fs-1 text-silver mb-2"></i>
                                <p class="text-muted small mb-0">{{ __('flights.no_images_available') }}</p>
                            </div>
                        @endif

                        <div class="lux-hr my-4"></div>

                        <div class="p-3 bg-primary-gradient rounded-4 text-center text-white mb-3 shadow-premium">
                            <div class="status-orb-small mx-auto mb-2"><i
                                    class="mdi {{ $flight->status == 1 ? 'mdi-check-decagram' : 'mdi-alert-octagon' }} fs-3"></i>
                            </div>
                            <h5 class="fw-bold mb-0">
                                {{ $flight->status == 1 ? __('general.enable') : __('general.disabled') }}</h5>
                            <small class="opacity-75">{{ __('flights.current_status') }}</small>
                        </div>

                        <button class="btn btn-outline-primary w-100 py-3 rounded-4 fw-bold" onclick="window.print()">
                            <i class="mdi mdi-printer-outline me-2"></i> {{ __('general.print') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
