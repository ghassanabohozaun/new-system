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
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('flights.flights') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.flights.index') !!}">
                                        {!! __('flights.flights') !!}
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
                        <a href="{{ route('dashboard.flights.create') }}" class="btn btn-info btn-glow px-2">
                            <span class="la la-pencil"></span>
                            {!! __('flights.create_new_flight') !!}
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

                                    @include('dashboard.flights.partials._search')

                                    <div class="card">
                                        <!-- begin: card header -->
                                        <div class="card-header">
                                            <h4 class="card-title" id="basic-layout-colored-form-control">
                                                {!! __('flights.show_all_flights') !!}
                                            </h4>
                                            <a class="heading-elements-toggle"><i
                                                    class="la la-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end: card header -->

                                        <!-- begin: card content -->
                                        <div class="card-content collapse show">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    @include('dashboard.flights.partials._table')
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end: card content -->
                                    </div>
                                </div> <!-- end: card  -->
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

        function loadData(flight_name = '', country_id = '', city_id = '', category_id = '',
            status = '') {
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
                    url: '{!! route('dashboard.flights.get.all') !!}',
                    data: {
                        flight_name: flight_name,
                        country_id: country_id,
                        city_id: city_id,
                        category_id: category_id,
                        status: status
                    },
                    beforeSend: function() {}
                },


                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'images',
                        name: 'images',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'country_id',
                        name: 'country_id',
                    },
                    {
                        data: 'city_id',
                        name: 'city_id',
                    },
                    {
                        data: 'category_id',
                        name: 'category_id',
                    },
                    {
                        data: 'reservations_count_total',
                        name: 'reservations_count_total',
                    },
                    {
                        data: 'Last_reservation_date',
                        name: 'Last_reservation_date',
                    },

                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                    {
                        data: 'status',
                        name: 'status',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'manage_status',
                        name: 'manage_status',
                        searchable: false,
                        orderable: false,
                    },
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

                // buttons: [{
                //         extend: 'colvis',
                //         className: 'btn btn-default',
                //         exportOptions: {
                //             // columns: [0, 1, 2],
                //             columns: ':not(:last-child)',
                //         }
                //     },
                //     {
                //         extend: 'copy',
                //         className: 'btn btn-default',
                //         exportOptions: {
                //             // columns: [0, 1, 2],
                //             columns: ':not(:last-child)',
                //         }
                //     },
                //     {
                //         extend: 'print',
                //         className: 'btn btn-default',
                //         exportOptions: {
                //             // columns: [0, 1, 2],
                //             columns: ':not(:last-child)',
                //         }
                //     },
                //     {
                //         extend: 'excel',
                //         className: 'btn btn-default',
                //         exportOptions: {
                //             // columns: [0, 1, 2],
                //             columns: ':not(:last-child)',
                //         }
                //     },
                //     {
                //         extend: 'pdf',
                //         className: 'btn btn-default',
                //         exportOptions: {
                //             // columns: [0, 1, 2],
                //             columns: ':not(:last-child)',
                //         }
                //     },

                // ]

            });

        }


        // delete
        $('body').on('click', '.delete_flight_btn', function(e) {
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
                        url: '{!! route('dashboard.flights.destroy', ':id') !!}'.replace(':id', id),
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
                url: "{{ route('dashboard.flights.change.status') }}",
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
