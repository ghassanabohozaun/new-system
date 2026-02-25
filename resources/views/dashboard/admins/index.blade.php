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
                                <li class="breadcrumb-item active" aria-current="page">{!! __('admins.admins') !!}</li>
                            </ol>
                        </nav>
                        <div class="btn-wrapper mt-3 mt-sm-0">
                            <button type="button" class="btn btn-primary text-white me-0" data-bs-toggle="modal"
                                data-bs-target="#createAdminModal">
                                <i class="icon-plus"></i> {!! __('admins.create_new_admin') !!}
                            </button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{!! __('admins.show_all_admins') !!}</h4>
                            <div class="table-responsive table-responsive-custom">
                                <table class="table table-hover" id="responsiveTable">
                                    <thead>
                                        <tr>
                                            <th class="details-col"></th>
                                            <th>#</th>
                                            <th>{!! __('admins.name') !!}</th>
                                            <th class="d-none d-md-table-cell">{!! __('admins.email') !!}</th>
                                            <th class="d-none d-lg-table-cell">{!! __('admins.role_id') !!}</th>
                                            <th class="d-none d-xl-table-cell">{!! __('admins.created_at') !!}</th>
                                            <th class="d-none d-xl-table-cell">{!! __('admins.status') !!}</th>
                                            <th class="d-none d-xl-table-cell text-center">{!! __('admins.manage_status') !!}</th>
                                            <th class="text-center">{!! __('general.actions') !!}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($admins as $admin)
                                            <tr id="row{{ $admin->id }}">
                                                <td class="details-col"><i class="mdi mdi-plus-circle details-control"></i>
                                                </td>
                                                <td>{!! $loop->iteration !!}</td>
                                                <td>{!! $admin->name !!}</td>
                                                <td class="d-none d-md-table-cell">{!! $admin->email !!}</td>
                                                <td class="d-none d-lg-table-cell">{!! $admin->role->role ?? 'N/A' !!}</td>
                                                <td class="d-none d-xl-table-cell">{!! $admin->created_at !!}</td>
                                                <td class="d-none d-xl-table-cell">
                                                    @include('dashboard.admins.parts.status')
                                                </td>
                                                <td class="d-none d-xl-table-cell">
                                                    @include('dashboard.admins.parts.manage_status')
                                                </td>
                                                <td class="text-center">
                                                    @include('dashboard.admins.parts.actions', [
                                                        'admin' => $admin,
                                                    ])
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">{!! __('admins.no_admins_found') !!}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {!! $admins->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.admins.modals.create')
    @include('dashboard.admins.modals.edit')
    @include('dashboard.admins.modals.tr-details')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Toggle password visibility
            $(document).on('click', '.toggle-password', function() {
                const targetId = $(this).data('target');
                const input = $('#' + targetId);
                const icon = $(this).find('i');
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.css('opacity', '0.5'); // Visually indicate "eye off"
                    icon.parent().css('background-color', '#ebebeb');
                } else {
                    input.attr('type', 'password');
                    icon.css('opacity', '1');
                    icon.parent().css('background-color', 'transparent');
                }
            });

            // STATUS TOGGLE
            $(document).on('change', '.change_status', function() {
                const checkbox = $(this);
                const id = checkbox.data('id');
                const status = checkbox.is(':checked') ? 1 : 0;

                $.ajax({
                    url: "{{ route('dashboard.admins.change.status') }}",
                    type: 'POST',
                    data: {
                        statusSwitch: status,
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status) {
                            const statusBadge = $('.admin_status_' + id);
                            statusBadge.empty();
                            statusBadge.removeClass(
                                'badge badge-pill-danger badge badge-pill-success');

                            if (data.data.status == 1) {
                                statusBadge.addClass('badge badge-pill-success').text(
                                    "{!! __('general.enable') !!}");
                            } else {
                                statusBadge.addClass('badge badge-pill-danger').text(
                                    "{!! __('general.disabled') !!}");
                            }

                            Swal.fire({
                                icon: 'success',
                                title: "{!! __('general.change_status_success_message') !!}",
                                customClass: {
                                    title: 'fs-6'
                                },
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true
                            });
                        } else {
                            checkbox.prop('checked', !checkbox.is(':checked'));
                            Swal.fire({
                                icon: 'error',
                                title: "{!! __('general.change_status_error_message') !!}",
                                customClass: {
                                    title: 'fs-6'
                                }
                            });
                        }
                    },
                    error: function() {
                        checkbox.prop('checked', !checkbox.is(':checked'));
                        Swal.fire({
                            icon: 'error',
                            title: "{!! __('general.change_status_error_message') !!}",
                            customClass: {
                                title: 'fs-6'
                            }
                        });
                    }
                });
            });



            // --- Table Details Modal Setup ---
            const table = document.getElementById('responsiveTable');
            const modalElement = document.getElementById('detailsModal');
            let detailsModal; // Initialize lazily
            const modalBody = document.getElementById('modalBody');
            const modalTitle = document.getElementById('detailsModalLabel');

            if (table && modalElement) {
                // --- Modal Trigger Logic ---
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
                        for (let i = 1; i < headers.length -
                            1; i++) { // Skip the first (toggler) and last (actions) columns
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

                        modalTitle.innerText = "{!! __('general.details') !!} - " + cells[2]
                            .innerText; // Assuming name is col index 2
                        modalBody.innerHTML = html;
                        detailsModal.show();
                    }
                });
            }
        });
    </script>
@endpush
