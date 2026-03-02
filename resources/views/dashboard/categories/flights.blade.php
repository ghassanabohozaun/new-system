@extends('layouts.dashboard.app')

@section('title')
    {{ $title }}
@endsection

@push('css')
    <style>
        .category-flights-header {
            background: linear-gradient(135deg, #1F3BB3 0%, #3d5afe 100%);
            color: white;
            padding: 2.5rem 2rem;
            border-radius: 24px;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(31, 59, 179, 0.25);
        }

        .category-flights-header::before {
            content: '';
            position: absolute;
            top: -20%;
            right: -10%;
            width: 350px;
            height: 350px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            z-index: 0;
        }

        .category-flights-header::after {
            content: '';
            position: absolute;
            bottom: -15%;
            left: 5%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            z-index: 0;
        }

        .cat-icon-box {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin-bottom: 1.25rem;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .breadcrumb-premium {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            padding: 8px 20px;
            border-radius: 50px;
            display: inline-flex;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .breadcrumb-premium .breadcrumb-item,
        .breadcrumb-premium .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
            font-size: 0.85rem;
        }

        .breadcrumb-premium .breadcrumb-item.active {
            color: #fff !important;
        }

        .btn-premium-back {
            background: white;
            color: #1F3BB3;
            border: none;
            padding: 10px 25px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-premium-back:hover {
            background: #f8f9fa;
            transform: translateX(-5px);
            color: #1F3BB3;
        }

        [dir="rtl"] .btn-premium-back:hover {
            transform: translateX(5px);
        }

        .content-container {
            animation: fadeInUp 0.6s ease-out;
        }

        .btn-load-more {
            padding: 1rem 3rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(31, 59, 179, 0.15);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 200px;
        }

        .btn-load-more:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(31, 59, 179, 0.25);
        }

        .loader-dots {
            display: none;
            margin-left: 10px;
        }

        .loading .loader-dots {
            display: inline-block;
        }

        /* --- LUXURIOUS PREMIUM FLIGHT CARDS --- */
        .premium-flight-card {
            background: #ffffff;
            border-radius: 28px !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            z-index: 1;
            overflow: visible;
            /* To allow shadow-glow to spread */
        }

        .premium-flight-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 60px rgba(31, 59, 179, 0.12);
        }

        .card-img-wrapper {
            height: 240px;
            border-radius: 24px;
            margin: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .flight-hero-img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            transition: transform 1.2s ease;
        }

        .premium-flight-card:hover .flight-hero-img {
            transform: scale(1.15);
        }

        /* Glassmorphism Overlays */
        .glass-badge {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px) saturate(180%);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 8px 16px;
            border-radius: 50px;
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .status-badge.status-active .status-dot {
            background: #2ecc71;
            box-shadow: 0 0 10px #2ecc71;
        }

        .status-badge.status-inactive .status-dot {
            background: #e74c3c;
            box-shadow: 0 0 10px #e74c3c;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 8px;
            display: inline-block;
        }

        .glass-price-tag {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            border-radius: 18px;
            color: white;
            z-index: 2;
        }

        .price-label {
            font-size: 0.7rem;
            opacity: 0.8;
            display: block;
            line-height: 1;
            margin-bottom: 2px;
        }

        .price-value {
            font-size: 1.25rem;
            font-weight: 800;
            display: block;
        }

        .currency {
            font-size: 0.75rem;
            margin-top: -5px;
            margin-left: 2px;
        }

        .glass-mini-btn {
            width: 38px;
            height: 38px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
            position: relative;
            z-index: 5;
        }

        .glass-mini-btn:hover {
            background: white;
            color: #1F3BB3;
            transform: scale(1.1);
        }

        /* Content Styling */
        .category-pill {
            font-size: 0.7rem;
            font-weight: 600;
            color: #1F3BB3;
            background: rgba(31, 59, 179, 0.08);
            padding: 4px 12px;
            border-radius: 8px;
            letter-spacing: 0.5px;
        }

        .flight-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: #1e293b;
            line-height: 1.4;
            min-height: 2.8em;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .location-group {
            color: #64748b;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .location-icon-wrapper {
            color: #3d5afe;
            font-size: 1.1rem;
        }

        .flight-excerpt {
            color: #64748b;
            font-size: 0.85rem;
            line-height: 1.6;
        }

        .meta-value {
            font-size: 1.1rem;
            color: #1e293b;
        }

        .meta-label {
            font-size: 0.75rem;
            color: #94a3b8;
            font-weight: 600;
        }

        .btn-premium-cta {
            background: #1F3BB3;
            color: white;
            padding: 10px 22px;
            border-radius: 15px;
            font-weight: 700;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            position: relative;
            z-index: 5;
            box-shadow: 0 5px 15px rgba(31, 59, 179, 0.25);
        }

        .btn-premium-cta:hover {
            background: #152c8b;
            color: white;
            padding-right: 28px;
            box-shadow: 0 8px 25px rgba(31, 59, 179, 0.4);
        }

        .btn-premium-cta i {
            transition: transform 0.3s ease;
        }

        .btn-premium-cta:hover i {
            transform: translateX(5px);
        }

        /* Empty State */
        .empty-state-luxury {
            background: white;
            border-radius: 40px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.02);
        }

        .empty-icon-box {
            width: 100px;
            height: 100px;
            background: #f8fafc;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #cbd5e1;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-container">
            <!-- Premium Category Header with Integrated Breadcrumbs -->
            <div class="category-flights-header">
                <div class="position-relative" style="z-index: 1;">
                    <div class="d-flex justify-content-between align-items-start flex-wrap">
                        <div>
                            <nav aria-label="breadcrumb" class="breadcrumb-premium">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.index') }}">{{ __('dashboard.dashboard') }}</a></li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.categories.index') }}">{{ __('categories.categories') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                                </ol>
                            </nav>

                            <div class="cat-icon-box">
                                <i class="mdi mdi-airplane"></i>
                            </div>

                            <h1 class="fw-bold mb-1 text-white">{{ __('categories.flights') }}</h1>
                            <p class="text-white opacity-75 mb-0 fs-5 fw-light">
                                <i class="mdi mdi-folder-outline me-1"></i> {{ $category->name }}
                            </p>
                        </div>

                        <div class="mt-4 mt-md-0 d-flex flex-column gap-3">
                            <a href="{{ route('dashboard.categories.index') }}"
                                class="btn btn-premium-back d-flex align-items-center justify-content-center">
                                <i class="mdi mdi-arrow-left me-2"></i> {{ __('general.back') }}
                            </a>
                            <a href="{!! route('dashboard.flights.create', ['category_id' => $category->id]) !!}"
                                class="btn btn-light d-flex align-items-center border-0 shadow-sm px-4 py-2 fw-bold"
                                style="border-radius: 12px; color: #1F3BB3;">
                                <i class="mdi mdi-plus-circle-outline me-2 fs-5"></i> {!! __('flights.create_new_flight') !!}
                            </a>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top border-white border-opacity-10 d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-layers-triple text-white opacity-50 fs-4 me-2"></i>
                            <div>
                                <div class="text-white opacity-50 small" style="line-height: 1;">
                                    {{ __('flights.total_flights') }}</div>
                                <div class="text-white fw-bold fs-5">{{ $flights->count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Flights Grid Container -->
            <div class="row" id="flights-container">
                @include('dashboard.categories.partials.flight-items', ['flights' => $flights])
            </div>

            <!-- Load More Button -->
            @if ($flights->hasMorePages())
                <div class="load-more-container text-center mt-5 mb-5">
                    <button id="load-more-btn" class="btn btn-primary btn-load-more btn-lg"
                        data-next-page="{{ $flights->currentPage() + 1 }}" data-category-id="{{ $category_id }}">
                        <span class="btn-text">{{ __('general.loading_more') }}</span>
                        <span class="loader-dots">
                            <i class="mdi mdi-loading mdi-spin"></i>
                        </span>
                    </button>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Fix Sidebar: template.js incorrectly marks items active if URL ends in a small ID (e.g. /1)
            function sanitizeSidebar() {
                $('.sidebar .nav-item.active').each(function() {
                    const $item = $(this);
                    const $link = $item.find('> .nav-link');
                    const href = $link.attr('href');

                    // If the active item isn't related to categories, it's likely a false positive from template.js
                    if (href && !href.includes('categories')) {
                        $item.removeClass('active');
                        $link.removeClass('active');
                        $item.find('.collapse').removeClass('show');
                    }
                });

                // Ensure Categories is active
                const $catLink = $('.sidebar a[href*="/categories"]');
                $catLink.closest('.nav-item').addClass('active');
            }

            sanitizeSidebar();
            setTimeout(sanitizeSidebar, 100);

            // Load More Ajax
            $('#load-more-btn').on('click', function() {
                const $btn = $(this);
                const nextPage = $btn.data('next-page');
                const categoryId = $btn.data('category-id');
                const url =
                    `{{ route('dashboard.categories.flights.paging') }}?page=${nextPage}&category_id=${categoryId}`;

                if ($btn.hasClass('loading')) return;

                $btn.addClass('loading').prop('disabled', true);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        if (response.status && response.html) {
                            const $newItems = $(response.html).hide();
                            $('#flights-container').append($newItems);
                            $newItems.fadeIn(600);

                            $btn.data('next-page', nextPage + 1);
                            $btn.removeClass('loading').prop('disabled', false);

                            if (response.html === '' || response.is_last_page || !response
                                .has_more) {
                                $btn.parent().fadeOut();
                            }
                        } else {
                            $btn.parent().fadeOut();
                        }
                    },
                    error: function() {
                        if (typeof flasher !== 'undefined') {
                            flasher.error("{{ __('messages.error') }}");
                        }
                        $btn.removeClass('loading').prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endpush
