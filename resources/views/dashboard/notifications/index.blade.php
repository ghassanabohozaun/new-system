@extends('layouts.dashboard.app')

@section('title')
    {!! $title !!}
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
                                <li class="breadcrumb-item active" aria-current="page">{!! __('notifications.notifications') !!}</li>
                            </ol>
                        </nav>
                        <div class="btn-wrapper mt-3 mt-sm-0">
                            <button type="button" class="btn btn-primary text-white me-0" data-bs-toggle="modal"
                                data-bs-target="#createNotificationModal">
                                <i class="icon-plus"></i> {!! __('notifications.create_new_notification') !!}
                            </button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 d-flex align-items-center">
                                <span class="card-icon-premium me-3">
                                    <i class="mdi mdi-bell-ring-outline"></i>
                                </span>
                                {!! __('notifications.notifications') !!}
                            </h4>
                            <div class="table-loader-container" style="position: relative;">
                                <div class="table-loader-overlay">
                                    <span class="premium-loader"></span>
                                </div>
                                <div id="table_data">
                                    @include('dashboard.notifications.partials._table', [
                                        'notifications' => $notifications,
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modals')
    @include('dashboard.notifications.modals.create')
    @include('dashboard.general.tr-details')
@endpush

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

            // Initialize Form Submit for Creation
            window.handleFormSubmit('#createNotificationForm', {
                modalToHide: '#createNotificationModal',
                tableToLoad: '#responsiveTable',
                successMessage: "{!! __('general.add_success_message') !!}",
                onSuccess: function() {
                    if (typeof resetCreateNotificationForm === 'function') {
                        resetCreateNotificationForm();
                    }
                }
            });
        });
    </script>
@endpush
