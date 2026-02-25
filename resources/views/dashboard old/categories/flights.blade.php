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
                                    <a href="{!! route('dashboard.categories.index') !!}">
                                        {!! __('categories.categories') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    {{-- <a href="{!! route('dashboard.categories.get.flights', $category->id) !!}">
                                        {!! $category->name !!}
                                    </a> --}}
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="javascript:void(0)"> {!! __('categories.flights') !!} </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->

                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12">
                    <div class="float-md-right mb-2">
                        {{-- <a href="{!! route('dashboard.flights.edit', $flight->id) !!}" class="btn btn-primary btn-glow px-2">
                            {!! __('flights.update_flight') !!}
                        </a>
                        <a href="{!! route('dashboard.flights.create') !!}" class="btn btn-info btn-glow px-2">
                            {!! __('flights.create_new_flight') !!}
                        </a> --}}
                    </div>
                </div>
                <!-- end: content header right-->

            </div> <!-- end :content header -->

            <!-- begin: content body -->
            <div class="content-body" id="my_flight_cards">

                <div class="row match-height" id="post-container">
                    @include('dashboard.categories.partials.flight-items', ['flights' => $flights])
                </div>

                <div class="clearfix"></div>

                @if ($flights->hasMorePages())
                    <div class="row">
                        <div class="col-12">
                            <button id="load-more-btn" class="btn btn-info"
                                data-next-page="{{ $flights->currentPage() + 1 }}">
                                {!! __('general.loading_more') !!}
                            </button>
                        </div>

                    </div>
                @endif

            </div>

        </div>

    </div><!-- end: content  -->
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#load-more-btn').on('click', function() {
                var button = $(this);
                var nextPage = button.data('next-page');
                // var url = '{{ route('dashboard.categories.flights.paging') }}?page=' +
                //     nextPage; // Adjust route name

                var url = '{{ route('dashboard.categories.flights.paging') }}?page=' + nextPage +
                    '&category_id=' + "{!! $category_id !!}"

                $('#load-more-btn').prop('disabled', true);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        if (response.html) {
                            $('#post-container').append(response.html);
                            button.data('next-page', nextPage + 1);
                            $('#load-more-btn').prop('disabled', false);
                        } else {
                            button.hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", error);
                        $('#load-more-btn').prop('disabled', false);
                    }
                });
            });
        });

        // delete
        $('body').on('click', '.delete_flight_btn', function(e) {
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
                        url: '{!! route('dashboard.flights.destroy', ':id') !!}'.replace(':id', id),
                        data: {
                            '_token': "{!! csrf_token() !!}"
                        },
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(data) {
                            $('#my_flight_cards').load(location.href + (' #my_flight_cards'));
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
                    $('#my_flight_cards').load(location.href + (' #my_flight_cards'));
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
