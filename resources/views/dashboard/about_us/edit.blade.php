@extends('layouts.dashboard.app')
@section('title', $title)

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-md-flex align-items-center justify-content-between border-bottom mb-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.index') }}">{!! __('dashboard.dashboard') !!}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                            </ol>
                        </nav>
                        <div class="btn-wrapper mt-3 mt-sm-0">
                            {{-- Optional buttons here if needed, matching home page --}}
                        </div>
                    </div>

                    <div class="d-sm-flex align-items-center justify-content-between border-bottom mb-3">
                        <ul class="nav nav-tabs border-0 custom-home-tabs" id="aboutUsTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active ps-0" id="timeline-tab" data-bs-toggle="tab" href="#timeline"
                                    role="tab" aria-controls="timeline" aria-selected="true">
                                    <i class="icon-clock me-2"></i> {{ __('about.timeline') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="general-tab" data-bs-toggle="tab" href="#general"
                                    role="tab" aria-controls="general" aria-selected="false">
                                    <i class="icon-grid me-2"></i> {{ __('about.general_info') }}
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content tab-content-basic" id="aboutUsTabsContent">
                        {{-- Timeline Tab --}}
                        @include('dashboard.about_us.tabs.timeline')

                        {{-- General Info Tab --}}
                        @include('dashboard.about_us.tabs.info')
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('modals')
        @include('dashboard.about_us.timeline.modals.create')
        @include('dashboard.about_us.timeline.modals.edit')
    @endpush

    @push('scripts')
        <script>
            $(document).ready(function() {
                // HUD Initialization for Main Form
                initHud('about_us_form');

                // Main Form Submit
                window.handleFormSubmit('#about_us_form', {
                    url: "{{ route('dashboard.about_us.update') }}",
                    successMessage: "{{ __('general.update_success_message') }}",
                });

                // Initialize Generic Index Table Handler
                window.initIndexTable({
                    container: '#timeline',
                    loader: '.premium-loader'
                });
            });
        </script>
    @endpush
