@extends('layouts.dashboard.app')

@section('title')
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" href="{!! asset('assets/dashboard/vendors/select2/select2.min.css') !!}">
@endpush

@section('content')
    <div class="content-wrapper">
        <form class="form" id="reportForm" action="{!! route('dashboard.reservations.export.excel') !!}" method="post">
            @csrf

            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">
                        <div class="d-md-flex align-items-center justify-content-between border-bottom mb-4 pb-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard.index') }}">{!! __('dashboard.dashboard') !!}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard.reservations.index') }}">{!! __('reservations.reservations') !!}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{!! __('reservations.reports') !!}</li>
                                </ol>
                            </nav>
                            <div class="btn-wrapper mt-3 mt-sm-0">
                                <button type="submit"
                                    class="btn btn-success text-white d-flex align-items-center gap-2 px-4 shadow-sm h-100">
                                    <i class="mdi mdi-file-excel fs-5"></i>
                                    <span class="fw-bold">{!! __('general.excel') !!}</span>
                                    <div class="spinner-border spinner-border-sm d-none ms-2" role="status"></div>
                                </button>
                            </div>
                        </div>

                        <div class="content-body">
                            <section id="report-layouts">
                                <div class="row">
                                    <div class="col-12">
                                        @include('dashboard.reservations.partials._search-report')

                                        @include('dashboard.reservations.partials._columns')
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{!! asset('assets/dashboard/vendors/select2/select2.min.js') !!}"></script>
    <script>
        $(document).ready(function() {
            $('#reportForm').on('submit', function() {
                const btn = $(this).find('button[type="submit"]');
                const spinner = btn.find('.spinner-border');
                const icon = btn.find('i');

                // Visual feedback
                btn.prop('disabled', true);
                spinner.removeClass('d-none');
                icon.addClass('d-none');

                // We don't prevent default as it's a standard form submit for file download
                // But we reset after a few seconds since we won't get a page reload
                setTimeout(function() {
                    btn.prop('disabled', false);
                    spinner.addClass('d-none');
                    icon.removeClass('d-none');
                }, 3000);
            });
        });
    </script>
@endpush
