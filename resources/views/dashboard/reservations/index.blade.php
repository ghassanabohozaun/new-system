@extends('layouts.dashboard.app')

@section('title')
    {{ __('reservations.reservations') }}
@endsection

@push('css')
    <style>
        .table-responsive-custom td:first-child,
        .table-responsive-custom th:first-child {
            width: 40px;
            text-align: center;
        }

        .details-control {
            cursor: pointer;
            color: #1F3BB3;
            font-size: 20px;
        }

        @media (min-width: 1200px) {
            .details-col {
                display: none;
            }
        }
    </style>
@endpush

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
                                <li class="breadcrumb-item active" aria-current="page">{!! __('reservations.reservations') !!}</li>
                            </ol>
                        </nav>
                        <div class="btn-wrapper mt-3 mt-sm-0">
                            <a href="{{ route('dashboard.reservations.create') }}" class="btn btn-primary text-white me-0">
                                <i class="icon-plus"></i> {!! __('reservations.create_new_reservation') !!}
                            </a>
                        </div>
                    </div>

                    @include('dashboard.reservations.partials._search')

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 d-flex align-items-center">
                                <span class="card-icon-premium me-3">
                                    <i class="mdi mdi-calendar-check text-primary"></i>
                                </span>
                                {!! __('reservations.show_all_reservations') !!}
                            </h4>
                            <div class="table-loader-container" style="position: relative;">
                                <div class="table-loader-overlay">
                                    <span class="premium-loader"></span>
                                </div>
                                <div id="table_data">
                                    @include('dashboard.reservations.partials._table', [
                                        'reservations' => $reservations,
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.general.tr-details')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            window.initIndexTable({
                container: '#table_data',
                loader: '.table-loader-overlay',
                detailsModal: '#detailsModal',
                detailsModalLabel: '#detailsModalLabel',
                detailsModalBody: '#modalBody'
            });


        });
    </script>
@endpush
