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
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('categories.categories') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.categories.index') !!}">
                                        {!! __('categories.categories') !!}
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
                        {{-- <a href="{{ route('dashboard.categories.create') }}" class="btn btn-info round btn-glow px-2" i>
                            {!! __('categories.create_new_category') !!}</a> --}}
                        <button type="button" class="btn btn-info  btn-glow px-2" data-toggle="modal"
                            data-target="#createCategoryModal">
                            <span class="la la-pencil"></span>
                            {!! __('categories.create_new_category') !!}
                        </button>

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
                                    <div class="card">
                                        <!-- begin: card header -->
                                        <div class="card-header">
                                            <h4 class="card-title" id="basic-layout-colored-form-control">
                                                {!! __('categories.show_all_categories') !!}
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
                                                    <table id="yajra-datatable" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>{!! __('categories.icon') !!}</th>
                                                                <th>{!! __('categories.category_name') !!}</th>
                                                                <th>{!! __('categories.added_flights_count') !!}</th>
                                                                <th>{!! __('categories.created_at') !!}</th>
                                                                <th>{!! __('categories.status') !!}</th>
                                                                <th>{!! __('categories.manage_status') !!}</th>
                                                                <th>{!! __('general.actions') !!}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
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

    @include('dashboard.categories.modal.create')
    @include('dashboard.categories.modal.edit')
@endsection


@push('scripts')
    <script type="text/javascript">
        var lang = '{{ Lang() }}';
        // yajra tables
        $('#yajra-datatable').DataTable({
            // dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            colReorder: true,
            fixedHeader: true,
            "bFilter": true,
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


            ajax: '{!! route('dashboard.categories.all') !!}',

            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'icon',
                    name: 'icon',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'added_flights_count',
                    name: 'added_flights_count',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'status',
                    name: 'status',

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

        // // disable button when mouse down
        // $('table').on('mousedown', 'button', function(e) {
        //     table.rowReorder.disable();
        // })

        // // enable button when mouse up
        // $('table').on('mouseup', 'button', function(e) {
        //     table.rowReorder.enable();
        // })
        // delete category
        $('body').on('click', '.delete_category_btn', function(e) {
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
                        url: '{!! route('dashboard.categories.destroy') !!}',
                        data: {
                            id,
                            id
                        },
                        type: 'post',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
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
                            $('#yajra-datatable').DataTable().page(currentPage).draw(false);
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
                        }
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


            // const swalWithBootstrapButtons = Swal.mixin({
            //     customClass: {
            //         confirmButton: "btn btn-success",
            //         cancelButton: "btn btn-danger"
            //     },
            //     buttonsStyling: true
            // });

            // swalWithBootstrapButtons.fire({
            //     title: "{{ __('general.ask_delete_record') }}",
            //     text: "",
            //     icon: "warning",
            //     showCancelButton: true,
            //     confirmButtonText: "{{ __('general.yes_delete_it') }}",
            //     cancelButtonText: "{{ __('general.no_cancel') }}",
            //     reverseButtons: true
            // }).then((result) => {
            //     if (result.isConfirmed) {
            //         $.ajax({
            //             url: '{!! route('dashboard.categories.destroy') !!}',
            //             data: {
            //                 id,
            //                 id
            //             },
            //             type: 'post',
            //             dataType: 'json',
            //             success: function(data) {

            //                 if (data.status == true) {
            //                     swalWithBootstrapButtons.fire({
            //                         title: "{!! __('general.deleted') !!}",
            //                         text: "{{ __('general.delete_success_message') }}",
            //                         icon: "success"
            //                     });
            //                     $('#yajra-datatable').DataTable().ajax.reload();
            //                     window.location.reload();
            //                 } else if (data.status == false) {
            //                     swalWithBootstrapButtons.fire({
            //                         title: "{!! __('general.deleted') !!}",
            //                         text: "{{ __('general.delete_error_message') }}",
            //                         icon: "error"
            //                     });
            //                 }
            //             }
            //         });

            //     } else if (
            //         /* Read more about handling dismissals below */
            //         result.dismiss === Swal.DismissReason.cancel
            //     ) {
            //         swalWithBootstrapButtons.fire({
            //             title: "{!! __('general.cancelled') !!}",
            //             text: "{!! __('general.you_recored_is_safe') !!} :)",
            //             icon: "error"
            //         });
            //     }
            // });
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
                url: "{{ route('dashboard.categories.change.status') }}",
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
