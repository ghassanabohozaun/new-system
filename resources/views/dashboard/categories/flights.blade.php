@extends('layouts.dashboard.app')

@section('title')
    {{ $title }}
@endsection


@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-md-flex align-items-center justify-content-between border-bottom mb-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.index') }}">{!! __('dashboard.dashboard') !!}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.categories.index') }}">{!! __('categories.categories') !!}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                            </ol>
                        </nav>
                        <div class="btn-wrapper mt-3 mt-sm-0 d-flex gap-2">
                            <a href="{{ route('dashboard.categories.index') }}" class="btn btn-outline-secondary">
                                <i class="mdi mdi-arrow-left"></i> {{ __('general.back') }}
                            </a>
                            <a href="{!! route('dashboard.flights.create', ['category_id' => $category->id]) !!}" class="btn btn-primary text-white me-0">
                                <i class="mdi mdi-plus"></i> {!! __('flights.create_new_flight') !!}
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-rounded mt-1">
                                <div class="card-body">
                                    <h4 class="card-title mb-4 d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <span class="card-icon-premium me-3">
                                                <i class="mdi mdi-airplane"></i>
                                            </span>
                                            {!! __('categories.flights') !!} - {{ $category->name }}
                                        </div>
                                        <span class="badge badge-opacity-info">
                                            {{ $flights->total() }} {{ __('flights.total_flights') }}
                                        </span>
                                    </h4>

                                    <div class="row" id="flights-container">
                                        @include('dashboard.categories.partials.flight-items', [
                                            'flights' => $flights,
                                        ])
                                    </div>

                                    <!-- Load More Button -->
                                    @if ($flights->hasMorePages())
                                        <div class="load-more-container text-center mt-5 mb-5">
                                            <button id="load-more-btn" class="btn btn-primary btn-load-more btn-lg"
                                                data-next-page="{{ $flights->currentPage() + 1 }}"
                                                data-category-id="{{ $category->id }}">
                                                <span class="btn-text">{{ __('categories.more_flights') }}</span>
                                                <span class="loader-dots">
                                                    <i class="mdi mdi-loading mdi-spin"></i>
                                                </span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

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
