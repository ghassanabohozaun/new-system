<div class="modal fade" id="createNotificationModal" tabindex="-1" role="dialog"
    aria-labelledby="createNotificationModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="{!! route('dashboard.notifications.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_notification_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="createNotificationModalLabel">{!! __('notifications.create_new_notification') !!}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal body-->
                <div class="modal-body">

                    <!--begin: form-->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- begin: row -->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{!! __('notifications.title') !!}</label>
                                        <input type="text" id="title" name="title" class="form-control"
                                            autocomplete="off" placeholder="{!! __('notifications.enter_title') !!}">
                                        <span class="text text-danger">
                                            <strong id="title_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->


                            <!-- begin: row -->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="details">{!! __('notifications.details') !!}</label>
                                        <textarea type="text" id="details" name="details" class="form-control" autocomplete="off" rows="5"
                                            placeholder="{!! __('notifications.enter_details') !!}"></textarea>
                                        <span class="text text-danger">
                                            <strong id="details_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->

                        </div>
                    </div>
                    <!--end: form-->
                </div>
                <!--end::modal body-->

                <!--begin::modal footer-->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info font-weight-bold ">
                        <span class="la la-save"></span>
                        {{ __('general.save') }}
                        <i class="la la-refresh spinner spinner_loading d-none">
                        </i>
                    </button>

                    <button type="button" id="cancel_notification_btn" class="btn btn-light-dark font-weight-bold"
                        data-dismiss="modal">
                        <span class="la la-close"></span>
                        {{ __('general.cancel') }}
                    </button>
                </div>
                <!--end::modal footer-->

            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        // reset
        function resetCreateForm() {
            $('#title').css('border-color', '');
            $('#details').css('border-color', '');

            $('#title_error').text('');
            $('#details_error').text('');
        }

        // cancel
        $('body').on('click', '#cancel_notification_btn', function(e) {
            $('#createNotificationModal').modal('hide');
            $('#create_notification_form')[0].reset();
            resetCreateForm();
        });

        // hide
        $('#createNotificationModal').on('hidden.bs.modal', function(e) {
            $('#createNotificationModal').modal('hide');
            $('#create_notification_form')[0].reset();
            resetCreateForm();
        });


        // create
        $('#create_notification_form').on('submit', function(e) {
            e.preventDefault();
            // reset
            resetCreateForm();

            // paramters
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('.spinner_loading').removeClass('d-none');
                },
                success: function(data) {
                    if (data.status == true) {
                        console.log(data);
                        $('#myTable').load(location.href + (' #myTable'));
                        $('#create_notification_form')[0].reset();
                        resetCreateForm();
                        $('#createNotificationModal').modal('hide');
                        flasher.success("{!! __('general.add_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.add_error_message') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                    });
                }, //end error
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }
            });

        });
    </script>
@endpush
