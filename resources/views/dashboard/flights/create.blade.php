@extends('layouts.dashboard.app')

@section('title')
    {!! $title !!}
@endsection

@push('css')
    <link rel="stylesheet" href="{!! asset('assets/dashboard/vendors/select2/select2.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/dashboard/vendors/summernote/summernote-lite.min.css') !!}">
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <!--------------------  Start Breadcrumb  ---------------------------->
                    <div class="d-md-flex align-items-center justify-content-between border-bottom mb-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.index') }}">{!! __('dashboard.dashboard') !!}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.flights.index') }}">{!! __('flights.flights') !!}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{!! __('flights.create_new_flight') !!}</li>
                            </ol>
                        </nav>
                    </div>
                    <!--------------------  End Breadcrumb  ---------------------------->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-rounded card-settings-premium" style="padding-bottom: 40px">
                                <div class="card-body">
                                    <h4 class="card-title card-title-dash mb-4">
                                        <i class="mdi mdi-plus-circle-outline text-primary me-2"></i>
                                        {!! __('flights.create_new_flight') !!}
                                    </h4>

                                    @livewire('dashboard.flight.create-flight', compact('countries', 'cities', 'categories'))

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
    <script src="{!! asset('assets/dashboard/vendors/select2/select2.min.js') !!}"></script>
    <script src="{!! asset('assets/dashboard/vendors/summernote/summernote-lite.min.js') !!}"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('showFullScreenModal', () => {
                $('#fullScreenModal').modal('show');
            });
        });
    </script>
@endpush
