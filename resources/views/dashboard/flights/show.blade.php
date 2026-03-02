@extends('layouts.dashboard.app')

@section('title', $title)

@section('content')
    <div class="content-wrapper deluxe-show-wrapper">
        <!-- Floating Luxury Header -->
        <div class="hero-header-glass mb-5 p-4 rounded-4 shadow-lg border-shimmer">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb deluxe-breadcrumb mb-2">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.flights.index') }}">{{ __('flights.flights') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $flight->getTranslation('name', 'ar') }} | {{ $flight->getTranslation('name', 'en') }}
                            </li>
                        </ol>
                    </nav>
                    <div class="d-flex align-items-center gap-3">
                        <div class="header-orb bg-primary-gradient">
                            <i class="mdi mdi-airplane-takeoff text-white fs-3"></i>
                        </div>
                        <div>
                            <h1 class="h2 fw-bold text-dark mb-0 tracking-tight d-flex flex-wrap align-items-center gap-2">
                                <span class="ar-font">{{ $flight->getTranslation('name', 'ar') }}</span>
                                <span class="text-muted fs-4">/</span>
                                <span class="en-font">{{ $flight->getTranslation('name', 'en') }}</span>
                            </h1>
                            <div class="d-flex align-items-center gap-2 mt-2">
                                <span
                                    class="badge badge-soft-primary px-3 py-2 rounded-pill d-flex align-items-center gap-1">
                                    <i class="mdi mdi-tag-outline"></i> {{ $flight->category->name }}
                                </span>
                                <span class="text-muted fs-7 d-flex align-items-center gap-2">
                                    <i class="mdi mdi-map-marker text-danger"></i>
                                    {{ $flight->country->name }} / {{ $flight->city->name }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                    <div class="action-group-glass d-inline-flex gap-2 p-2 rounded-4">
                        <a href="{{ route('dashboard.flights.edit', $flight->id) }}" class="btn btn-premium-gradient px-4">
                            <i class="mdi mdi-pencil-outline me-2"></i> {{ __('flights.update_flight') }}
                        </a>
                        <a href="{{ route('dashboard.flights.index') }}" class="btn btn-glass-secondary px-4">
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
                        <ul class="nav nav-tabs deluxe-tabs d-flex flex-wrap border-0" id="flightTabs" role="tablist">
                            <li class="nav-item flex-sm-fill text-center" role="presentation">
                                <button class="nav-link active font-cairo w-100" id="pricing-tab" data-bs-toggle="tab"
                                    data-bs-target="#pricing-pane" type="button" role="tab"
                                    aria-controls="pricing-pane" aria-selected="true">
                                    <i class="mdi mdi-cash-multiple me-2"></i> {{ __('flights.pricing') }}
                                </button>
                            </li>
                            <li class="nav-item flex-sm-fill text-center" role="presentation">
                                <button class="nav-link font-cairo w-100" id="services-tab" data-bs-toggle="tab"
                                    data-bs-target="#services-pane" type="button" role="tab"
                                    aria-controls="services-pane" aria-selected="false">
                                    <i class="mdi mdi-server me-2"></i> {{ __('flights.services') }}
                                </button>
                            </li>
                            <li class="nav-item flex-sm-fill text-center" role="presentation">
                                <button class="nav-link font-cairo w-100" id="including-tab" data-bs-toggle="tab"
                                    data-bs-target="#including-pane" type="button" role="tab"
                                    aria-controls="including-pane" aria-selected="false">
                                    <i class="mdi mdi-check-circle me-2 text-success"></i>
                                    {{ __('flights.tab_including') }}
                                </button>
                            </li>
                            <li class="nav-item flex-sm-fill text-center" role="presentation">
                                <button class="nav-link font-cairo w-100" id="not-including-tab" data-bs-toggle="tab"
                                    data-bs-target="#not-including-pane" type="button" role="tab"
                                    aria-controls="not-including-pane" aria-selected="false">
                                    <i class="mdi mdi-close-circle me-2 text-danger"></i>
                                    {{ __('flights.tab_not_including') }}
                                </button>
                            </li>
                            <li class="nav-item flex-sm-fill text-center" role="presentation">
                                <button class="nav-link font-cairo w-100" id="notes-tab" data-bs-toggle="tab"
                                    data-bs-target="#notes-pane" type="button" role="tab"
                                    aria-controls="notes-pane" aria-selected="false">
                                    <i class="mdi mdi-note-edit-outline me-2 text-warning"></i>
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
                                                <div class="alert alert-soft-secondary">
                                                    {{ __('flights.no_prices_found') }}</div>
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
                                                class="d-block w-100 showcase-img" alt="Flight Image">
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

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Inter:wght@400;600;700&display=swap');

        :root {
            --lux-primary: #436be6;
            --lux-glass: rgba(255, 255, 255, 0.85);
        }

        .deluxe-show-wrapper {
            font-family: 'Inter', sans-serif;
            color: #1a1e26;
            background: #f8faff;
            overflow-x: hidden !important;
        }

        .ar-font {
            font-family: 'Cairo', sans-serif;
        }

        .en-font {
            font-family: 'Inter', sans-serif;
        }

        /* Tabs Styling */
        .deluxe-tabs {
            border-bottom: 2px solid #f1f5f9 !important;
            background: #fafbfc;
            display: flex !important;
            flex-wrap: wrap !important;
            padding: 0;
            margin: 0;
            width: 100%;
        }

        .deluxe-tabs .nav-item {
            flex: 1 0 auto;
            min-width: 150px;
        }

        @media (max-width: 768px) {
            .deluxe-tabs .nav-item {
                min-width: 50%;
            }
        }

        @media (max-width: 480px) {
            .deluxe-tabs .nav-item {
                min-width: 100%;
            }
        }

        .deluxe-tabs .nav-link {
            border: none;
            color: #64748b;
            padding: 1.25rem 1rem;
            font-weight: 600;
            transition: 0.3s;
            position: relative;
            border-radius: 0;
            white-space: normal !important;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            width: 100%;
        }

        .deluxe-tab-body {
            min-height: 450px;
        }

        @media (max-width: 575px) {
            .deluxe-tabs .nav-link {
                padding: 0.75rem;
                font-size: 0.85rem;
            }

            .deluxe-tab-body {
                min-height: auto;
            }
        }

        .deluxe-tabs .nav-link:hover {
            color: var(--lux-primary);
            background: rgba(67, 107, 230, 0.05);
        }

        .deluxe-tabs .nav-link.active {
            color: var(--lux-primary);
            background: #fff;
        }

        .deluxe-tabs .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--lux-primary);
            border-radius: 3px 3px 0 0;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .tab-pane {
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Scrollbars */
        .price-scroll-container,
        .scroll-area-deluxe,
        .scroll-area-notes,
        .mini-grid-scroll {
            overflow-y: auto;
            overflow-x: hidden !important;
            scrollbar-width: thin;
            scrollbar-color: #ddd transparent;
        }

        .price-scroll-container,
        .scroll-area-deluxe,
        .scroll-area-notes {
            max-height: 400px;
        }

        .mini-grid-scroll {
            max-height: 200px;
        }

        /* Header & Glassmorphism */
        .hero-header-glass {
            background: var(--lux-glass);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .deluxe-card-glass {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03) !important;
            transition: 0.3s;
        }

        .deluxe-card-glass:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06) !important;
        }

        /* Stats box */
        .lux-details-box {
            background: #fcfdfe;
            padding: 1.25rem;
            border-radius: 12px;
            border: 1px solid #edf2f7;
            line-height: 1.8;
        }

        .stat-glass-card {
            background: #f8fafc;
            border: 1px solid #edf2f7;
            transition: 0.3s;
        }

        .stat-glass-card:hover {
            background: #fff;
            border-color: var(--lux-primary);
        }

        /* Pricing */
        .price-card-glass {
            background: #fff;
            border: 1px solid #edf2f7;
        }

        .featured-price {
            border: 2px solid var(--lux-primary);
        }

        .price-badge-small {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0f4ff;
            color: var(--lux-primary);
        }

        /* Bilingual Text Stylings */
        .fs-xs {
            font-size: 0.75rem;
        }

        .policy-item-bilingual,
        .lux-note-item-bilingual {
            transition: 0.3s;
            border: 1px solid transparent;
        }

        .policy-item-bilingual:hover,
        .lux-note-item-bilingual:hover {
            background: #f8fbff;
            border-color: #e0eaff;
        }

        /* Tags */
        .badge-deluxe-tag {
            background: #f1f5f9;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            width: fit-content;
            min-width: 120px;
        }

        .bg-success-light {
            background: #f0fff4;
        }

        .border-success-subtle {
            border-color: #c6f6d5 !important;
        }

        .bg-danger-light {
            background: #fff5f5;
        }

        .border-danger-subtle {
            border-color: #fed7d7 !important;
        }

        .bg-success-soft {
            background: rgba(40, 167, 69, 0.1);
        }

        .bg-danger-soft {
            background: rgba(220, 53, 69, 0.1);
        }

        .bg-warning-soft {
            background: rgba(255, 193, 7, 0.1);
        }

        .bg-info-soft {
            background: rgba(23, 162, 184, 0.1);
        }

        .border-warning-subtle {
            border-color: #ffeeba !important;
        }

        /* Animations & Hover Effects */
        .lux-item-animated {
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            cursor: default;
        }

        .lux-item-animated:hover {
            transform: scale(1.02) translateX(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            background: #fff !important;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-bounce-slow {
            animation: bounce 3s ease-in-out infinite;
        }

        .animate-pulse-soft {
            animation: pulse-soft 2s ease-in-out infinite;
        }

        .animate-shake-soft {
            animation: shake-soft 4s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-3px);
            }
        }

        @keyframes pulse-soft {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.7;
                transform: scale(1.1);
            }
        }

        @keyframes shake-soft {

            0%,
            100% {
                transform: rotate(0);
            }

            25% {
                transform: rotate(2deg);
            }

            75% {
                transform: rotate(-2deg);
            }
        }

        .text-success-light {
            color: #d1fae5;
        }

        .text-danger-light {
            color: #fee2e2;
        }

        .opacity-30 {
            opacity: 0.3;
        }

        /* Gallery */
        .showcase-img {
            height: 320px;
            object-fit: cover;
        }

        .carousel-icon-box {
            width: 40px;
            height: 40px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
        }

        .mini-thumb-glass {
            cursor: pointer;
            border: 2px solid transparent;
        }

        .mini-thumb-glass:hover {
            border-color: var(--lux-primary);
        }

        /* Status Summary */
        .shadow-premium {
            box-shadow: 0 8px 24px rgba(67, 107, 230, 0.25);
        }

        .status-orb-small {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-primary-gradient {
            background: linear-gradient(135deg, #436be6, #7c9bff);
        }

        .btn-premium-gradient {
            background: linear-gradient(135deg, #436be6, #6288ff);
            color: #fff;
            border: none;
            border-radius: 10px;
        }

        .btn-glass-secondary {
            background: #f1f5f9;
            color: #475569;
            border-radius: 10px;
        }

        .lux-hr {
            height: 1px;
            background: #edf2f7;
        }

        .border-end-md {
            border-right: 1px solid #edf2f7;
        }

        @media (max-width: 767px) {
            .border-end-md {
                border-right: none;
                border-bottom: 1px solid #edf2f7;
                padding-bottom: 1rem;
                margin-bottom: 1rem;
            }
        }
    </style>
@endsection
