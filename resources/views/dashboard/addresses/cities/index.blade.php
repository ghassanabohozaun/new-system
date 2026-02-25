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
                            <h4 class="card-title">{!! __('addresses.show_all_cities') !!}</h4>
                            <div class="table-responsive table-responsive-custom">
                                <table class="table table-hover" id="responsiveTable">
                                    <thead>
                                        <tr>
                                            <th class="details-col"></th>
                                            <th>#</th>
                                            <th>{!! __('addresses.city_name') !!}</th>
                                            <th class="d-none d-md-table-cell">{!! __('addresses.governorate_name') !!}</th>
                                            <th class="text-center">{!! __('general.actions') !!}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cities as $city)
                                            <tr id="row{{ $city->id }}">
                                                <td class="details-col">
                                                    <i class="mdi mdi-plus-circle details-control"></i>
                                                </td>
                                                <td>{!! $loop->iteration !!}</td>
                                                <td>{!! $city->name !!}</td>
                                                <td class="d-none d-md-table-cell">{!! $city->governorate->name !!}</td>
                                                <td class="text-center">
                                                    @include('dashboard.addresses.cities.parts.actions')
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    {!! __('addresses.no_cities_found') !!}
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {!! $cities->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.addresses.cities.modals.create')
    @include('dashboard.addresses.cities.modals.edit')
    @include('dashboard.admins.modals.tr-details')
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            // --- Table Details Modal Setup ---
            const table = document.getElementById('responsiveTable');
            const modalElement = document.getElementById('detailsModal');
            let detailsModal;
            const modalBody = document.getElementById('modalBody');
            const modalTitle = document.getElementById('detailsModalLabel');

            if (table && modalElement) {
                table.addEventListener('click', function(e) {
                    if (e.target.classList.contains('details-control')) {
                        if (!detailsModal) {
                            detailsModal = new bootstrap.Modal(modalElement);
                        }
                        const row = e.target.closest('tr');
                        const headers = Array.from(table.querySelectorAll('thead th')).map(th => th
                            .innerText);
                        const cells = Array.from(row.querySelectorAll('td'));

                        let html = '<ul class="list-group list-group-flush">';
                        for (let i = 1; i < headers.length - 1; i++) {
                            if (headers[i] && headers[i].trim() !== "") {
                                const cellContent = cells[i].innerHTML;
                                html += `
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>${headers[i]}</strong>
                                    <span>${cellContent}</span>
                                </li>`;
                            }
                        }
                        html += '</ul>';

                        modalTitle.innerText = "{!! __('general.details') !!} - " + cells[2].innerText;
                        modalBody.innerHTML = html;
                        detailsModal.show();
                    }
                });
            }

        });
    </script>
@endpush
