@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <!-- begin: content header -->
            <div class="content-header row">

                <!-- begin: content header left-->
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('reservations.reservations') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.reservations.index') !!}">
                                        {!! __('reservations.reservations') !!}
                                    </a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->

                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12">
                    <div class="float-md-right mb-2">
                        <a href="{{ route('dashboard.reservations.create') }}" class="btn btn-info btn-glow px-2">
                            <span class="la la-pencil"></span>
                            {!! __('reservations.create_new_reservation') !!}
                        </a>
                    </div>
                </div>
                <!-- end: content header right-->

            </div> <!-- end :content header -->

            <!-- begin: content body -->
            <div class="row" style="display: flex ; justify-content: center;">
                <div class="col-md-12">
                    <div class="content-body">

                        <section id="basic-form-layouts">
                            <div class="row match-height">
                                <div class="col-md-12">

                                    @include('dashboard.reservations.partials._search')


                                    @include('dashboard.reservations.partials._table')

                                </div><!-- end: row  -->
                        </section><!-- end: sections  -->
                    </div>
                </div>
            </div>
            <!-- end: content body  -->
        </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->
@endsection


@push('scripts')
    <script type="text/javascript">
        var lang = '{{ Lang() }}';

        loadData();

        function loadData(flight_id = '', service = '', ticket_id = '', client_name = '', client_passport_number = '',
            economy_class_type = '', depature_country_id = '', depature_date = '', return_date = '', created_at = '') {
            // yajra tables
            $('#yajra-datatable').DataTable({
                // dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                colReorder: true,
                fixedHeader: true,
                "bDestroy": true,
                "bFilter": false,
                "bLengthChange": false, //thought this line could hide the LengthMenu
                pageLength: 10,
                // rowReorder: {
                //     update: false,
                //     // selector: 'tr',
                // },
                // select: true,
                // responsive: true,
                // scrollCollapse: true,
                // scroller: true,
                // scrollY: 900,
                responsive: {
                    details: {
                        display: DataTable.Responsive.display.modal({
                            header: function(row) {
                                var data = row.data();
                                return '{!! __('general.detalis_for') !!} : ' + data['name'];

                            }
                        }),
                        renderer: DataTable.Responsive.renderer.tableAll({
                            tableClass: 'table'
                        })
                    }
                },


                ajax: {
                    url: '{!! route('dashboard.reservations.get.all') !!}',
                    data: {
                        flight_id: flight_id,
                        service: service,
                        ticket_id: ticket_id,
                        client_name: client_name,
                        client_passport_number: client_passport_number,
                        economy_class_type: economy_class_type,
                        depature_country_id: depature_country_id,
                        depature_date: depature_date,
                        return_date: return_date,
                        created_at: created_at,
                    },
                    beforeSend: function() {}
                },

                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'flight_id',
                        name: 'flight_id',
                    },
                    {
                        data: 'service',
                        name: 'service',
                    },
                    {
                        data: 'client_name',
                        name: 'client_name',
                    },

                    {
                        data: 'client_passport_number',
                        name: 'client_passport_number',
                    },
                    {
                        data: 'depature_country_id',
                        name: 'depature_country_id',
                    },
                    {
                        data: 'depature_date',
                        name: 'depature_date',
                    },
                    {
                        data: 'return_date',
                        name: 'return_date',
                    },
                    {
                        data: 'ticket_id',
                        name: 'ticket_id',
                    },
                    {
                        data: 'economy_class_type',
                        name: 'economy_class_type',
                    },

                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                    // {
                    //     data: 'status',
                    //     name: 'status',
                    //     searchable: false,
                    //     orderable: false,
                    // },
                    // {
                    //     data: 'manage_status',
                    //     name: 'manage_status',
                    //     searchable: false,
                    //     orderable: false,
                    // },
                    {
                        data: 'actions',
                        searchable: false,
                        orderable: false,
                    }
                ],

                layout: {
                    // 'colvis',
                    // topStart: {
                    //     buttons: ['copy', 'print', 'excel', 'pdf']
                    // }
                },

                language: lang === 'ar' ? {
                    url: '{!! asset('vendor/datatables/ar.json') !!}',
                } : {},

            });

        }


        // delete
        $('body').on('click', '.delete_reservation_btn', function(e) {
            e.preventDefault();
            var currentPage = $('#yajra-datatable').DataTable().page();
            var id = $(this).data('id');
            swal({
                title: "{{ __('general.ask_delete_record') }}",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "{{ __('general.no') }}",
                        value: null,
                        visible: true,
                        className: "btn-danger",
                        closeModal: false,
                    },
                    confirm: {
                        text: "{{ __('general.yes') }}",
                        value: true,
                        visible: true,
                        className: "btn-info",
                        closeModal: false
                    }
                }
            }).then(isConfirm => {
                if (isConfirm) {
                    $.ajax({
                        url: '{!! route('dashboard.reservations.destroy', ':id') !!}'.replace(':id', id),
                        data: {
                            '_token': "{!! csrf_token() !!}"
                        },
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(data) {
                            $('#yajra-datatable').DataTable().page(currentPage).draw(false);
                            if (data.status == true) {
                                swal({
                                    title: "{!! __('general.deleted') !!} ",
                                    text: "{!! __('general.delete_success_message') !!} ",
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            text: "{!! __('general.yes') !!}",
                                            visible: true,
                                            closeModal: true
                                        }
                                    }
                                });
                            }
                        }, //end success
                        error: function(data) {
                            console.log(data.status);
                            swal({
                                title: "{!! __('general.warning') !!} ",
                                text: "{!! __('general.delete_error_message') !!} ",
                                icon: "warning",
                                buttons: {
                                    confirm: {
                                        text: "{!! __('general.yes') !!}",
                                        visible: true,
                                        closeModal: true
                                    }
                                }
                            });
                        } //end error
                    });

                } else {
                    swal({
                        title: "{!! __('general.cancelled') !!} ",
                        text: "{!! __('general.delete_error_message') !!} ",
                        icon: "error",
                        buttons: {
                            confirm: {
                                text: "{!! __('general.yes') !!}",
                                visible: true,
                                closeModal: true
                            }
                        }
                    });
                }
            });


        });

        //  change status
        var statusSwitch = false;
        $('body').on('change', '.change_status', function(e) {
            e.preventDefault();

            var currentPage = $('#yajra-datatable').DataTable().page();
            var id = $(this).data('id');

            if ($(this).is(':checked')) {
                statusSwitch = 1;
            } else {
                statusSwitch = 0;
            }

            $.ajax({
                url: "{{ route('dashboard.reservations.change.status') }}",
                data: {
                    statusSwitch: statusSwitch,
                    id: id
                },
                type: 'post',
                dataType: 'JSON',
                success: function(data) {

                    $('#yajra-datatable').DataTable().page(currentPage).draw(false);
                    if (data.status == true) {
                        flasher.success("{!! __('general.change_status_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.change_status_error_message') !!}");
                    }
                }, //end success
            })
        });
    </script>
@endpush
