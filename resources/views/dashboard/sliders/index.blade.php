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
                    <!--------------------  Start Breadcrumb  ---------------------------->
                    <div class="d-md-flex align-items-center justify-content-between border-bottom mb-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.index') }}">{!! __('dashboard.dashboard') !!}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{!! __('sliders.sliders') !!}</li>
                            </ol>
                        </nav>
                        <div class="btn-wrapper mt-3 mt-sm-0">
                            <button type="button" class="btn btn-primary text-white me-0" data-bs-toggle="modal"
                                data-bs-target="#createSliderModal">
                                <i class="icon-plus"></i> {!! __('sliders.create_new_slider') !!}
                            </button>
                        </div>
                    </div>
                    <!--------------------  End Breadcrumb  ---------------------------->

                    <!--------------------  Start Table  ---------------------------->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{!! __('sliders.show_all_sliders') !!}</h4>
                            <div class="table-responsive table-responsive-custom">
                                <table class="table table-hover js-sliders-table" id="responsiveTable">
                                    <thead>
                                        <tr>
                                            <th class="details-col"></th>
                                            <th>#</th>
                                            <th>{!! __('sliders.photo') !!}</th>
                                            <th>{!! __('sliders.title') !!}</th>
                                            <th class="d-none d-lg-table-cell">{!! __('sliders.details') !!}</th>
                                            <th class="text-center d-none d-md-table-cell">{!! __('sliders.status') !!}</th>
                                            <th class="text-center d-none d-xl-table-cell">{!! __('sliders.manage_status') !!}</th>
                                            <th class="text-center">{!! __('general.actions') !!}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sliders as $slider)
                                            <tr id="slider-row-{{ $slider->id }}">
                                                <td class="details-col">
                                                    <i class="mdi mdi-plus-circle details-control"></i>
                                                </td>
                                                <td>{!! $loop->iteration !!}</td>
                                                <td>
                                                    @include('dashboard.sliders.parts.photo', [
                                                        'slider' => $slider,
                                                    ])
                                                </td>
                                                <td>{!! $slider->getTranslation('title', Lang()) !!}</td>
                                                <td class="d-none d-lg-table-cell"
                                                    style="white-space: normal; max-width: 300px;">
                                                    {!! str($slider->getTranslation('details', Lang()))->limit(50) !!}
                                                </td>
                                                <td class="text-center d-none d-md-table-cell">
                                                    @include('dashboard.sliders.parts.status', [
                                                        'slider' => $slider,
                                                    ])
                                                </td>
                                                <td class="text-center d-none d-xl-table-cell">
                                                    @include('dashboard.sliders.parts.manage_status', [
                                                        'slider' => $slider,
                                                    ])
                                                </td>
                                                <td class="text-center">
                                                    @include('dashboard.sliders.parts.actions', [
                                                        'slider' => $slider,
                                                    ])
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center text-muted">
                                                    {!! __('sliders.no_sliders_found') !!}
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {!! $sliders->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--------------------  End Table  ---------------------------->
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.sliders.modals.create')
    @include('dashboard.sliders.modals.edit')
    @include('dashboard.admins.modals.tr-details')
@endsection

@push('scripts')
    <script src="{!! asset('assets/dashboard/js/modules/sliders.js') !!}"></script>
    <script>
        $(document).ready(function() {
            SliderModule.init({
                routes: {
                    update: "{{ route('dashboard.sliders.update', ':id') }}"
                },
                labels: {
                    details: "{!! __('general.details') !!}"
                },
                messages: {
                    add_success: "{!! __('general.add_success_message') !!}",
                    update_success: "{!! __('general.update_success_message') !!}"
                }
            });
        });
    </script>
@endpush
