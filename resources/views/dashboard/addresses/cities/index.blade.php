@extends('layouts.dashboard.app')

@section('title')
    {!! $title !!}
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

        /* Hide the toggle column on extra large screens where all columns are visible */
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
                                <li class="breadcrumb-item active" aria-current="page">{!! __('addresses.cities') !!}</li>
                            </ol>
                        </nav>
                        <div class="btn-wrapper mt-3 mt-sm-0">
                            <button type="button" class="btn btn-primary text-white me-0" data-bs-toggle="modal"
                                data-bs-target="#createCityModal">
                                <i class="icon-plus"></i> {!! __('addresses.create_new_city') !!}
                            </button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 d-flex align-items-center">
                                <span class="card-icon-premium me-3">
                                    <i class="mdi mdi-city-variant-outline"></i>
                                </span>
                                {!! __('addresses.show_all_cities') !!}
                            </h4>
                            <div class="table-loader-container" style="position: relative;">
                                <div class="table-loader-overlay">
                                    <span class="premium-loader"></span>
                                </div>
                                <div id="table_data">
                                    @include('dashboard.addresses.cities.partials._table', [
                                        'cities' => $cities,
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.addresses.cities.modals.create')
    @include('dashboard.addresses.cities.modals.edit')
    @include('dashboard.general.tr-details')
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize Generic Index Table Handler
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
