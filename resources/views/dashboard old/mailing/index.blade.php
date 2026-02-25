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
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('mailing.mailing') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.mailing.index') !!}">
                                        {!! __('mailing.mailing') !!}
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
                        <button type="button" class="btn btn-info  btn-glow px-2" data-toggle="modal"
                            data-target="#createMailModal">
                            <span class="la la-pencil"></span>
                            {!! __('mailing.create_new_email') !!}
                        </button>

                    </div>
                </div>
                <!-- end: content header right-->

            </div> <!-- end :content header -->

            <!-- begin: content body -->
            <div class="content-body">

                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- begin: card header -->
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-colored-form-control">
                                        {!! __('mailing.show_all') !!}
                                    </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                                        <!-- begin: seach form -->
                                        <form action="{!! url()->current() !!}" method="GET" class="mb-4">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input type="text" name="keyword" class="form-control"
                                                        autocomplete="off" placeholder="{!! __('mailing.enter_email') !!}">
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-primary" id='search'>
                                                        <span class="la la-search"></span>
                                                        {!! __('general.search') !!}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- end: search -->
                                        <div class="table-responsive">
                                            <table class="table" id='myTable'>
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{!! __('mailing.email') !!}</th>
                                                        <th>{!! __('mailing.status') !!}</th>
                                                        <th class="text-center">{!! __('general.actions') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($mailings as $mail)
                                                        <tr>
                                                            <th class="col-lg-1">{!! $loop->iteration !!} </th>
                                                            <td class="col-lg-6">
                                                                {!! $mail->email !!}
                                                            </td>
                                                            <td class="col-lg-3">
                                                                @include('dashboard.mailing.parts.status')
                                                            </td>
                                                            <td class="col-lg-1">
                                                                @include('dashboard.mailing.parts.actions')
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center">
                                                                {!! __('mailing.mail_box_empty') !!}
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>

                                            </table>
                                            <div class="float-right">
                                                {!! $mailings->links() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: card content -->
                            </div>
                        </div> <!-- end: card  -->
                    </div><!-- end: row  -->
                </section><!-- end: sections  -->
            </div><!-- end: content body  -->
        </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->
    @include('dashboard.mailing.modals.create')
@endsection
@push('scripts')
    <script type="text/javascript">
        // delete
        $('body').on('click', '.delete_mail_btn', function(e) {
            e.preventDefault();
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
                        url: '{!! route('dashboard.mailing.destroy', ':id') !!}'.replace(':id', id),
                        data: {
                            '_token': "{!! csrf_token() !!}"
                        },
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(data) {
                            $('#myTable').load(location.href + (' #myTable'));

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

        //  contact mail click
        $('body').on('click', '.contact_mail_btn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            console.log(id);

            $.ajax({
                url: "{{ route('dashboard.mailing.change.status') }}",
                data: {
                    id: id
                },
                type: 'post',
                dataType: 'JSON',
                success: function(data) {
                    $('#myTable').load(location.href + (' #myTable'));
                    if (data.status === true) {
                        flasher.success("{!! __('general.change_status_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.change_status_error_message') !!}");
                    }
                }, //end success
            })
        });


        // $('body').on('click', '.get_all_governorate_by_country_btn', function(e) {

        //     e.preventDefault();
        //     var id = $(this).data('id');
        //     console.log(id);

        //     $.ajax({
        //         url: '',
        //         data: {
        //             id,
        //             id
        //         },
        //         method: 'get',
        //         dataType: 'json',
        //         success: function(data) {
        //             console.log(data.data);
        //             trHTML = "";
        //             if (!$.trim(data.data)) {
        //                 $("#governoraties_tbody").empty();
        //                 trHTML += '<tr class="notfound" id="notfound">' +
        //                     '<td colspan="10">' + '{{ __('general.no_record_found') }}' + '</td>' +
        //                     '</tr>';
        //             } else {
        //                 $("#governoraties_tbody").empty();
        //                 $.each(data.data, function(i, item) {
        //                     var lang = '{!! Config::get('app.locale') !!}';

        //                     var itration = i + 1;
        //                     if (lang === 'en') {
        //                         trHTML += '<tr id="row_' + item.id +
        //                             '">' +
        //                             '<td class="col-1">' + itration + '</td>' +
        //                             '<td class="col-6">' + item.name.en + '</td>' +
        //                             '</tr>';
        //                     } else {
        //                         trHTML += '<tr id="row_' + item.id +
        //                             '">' +
        //                             '<td class="col-1">' + itration + '</td>' +
        //                             '<td class="col-6">' + item.name.ar + '</td>' +
        //                             '</tr>';
        //                     }
        //                 });
        //             }
        //             $('#governoraties_tbody').append(trHTML);
        //             $('#governoraties_modal').modal('show');
        //         }

        //     });
        // });
    </script>
@endpush
