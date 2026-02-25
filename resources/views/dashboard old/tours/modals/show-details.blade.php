@push('style')
    <link href="{!! asset('vendor/summernote/summernote-bs4.css') !!}" rel="stylesheet">
@endpush
<div class="modal fade" id="showTourModal" tabindex="-1" role="dialog" aria-labelledby="showTourModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="" method="" enctype="multipart/form-data">

            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="showTourModalLabel">{!! __('tours.show_tour_details') !!}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal body-->
                <div class="modal-body">

                    <!-- begin: row  details ar-->
                    <div class="row">
                        <!-- begin: input -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="details_ar">{!! __('tours.details_ar') !!}</label>
                                <textarea rows="5" id="details_ar" name="details[ar]" class="form-control details_ar_summernote"></textarea>
                            </div>
                        </div>
                        <!-- end: input -->
                    </div>
                    <!-- end: row  details ar-->

                    <!-- begin: row  details en-->
                    <div class="row">
                        <!-- begin: input -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="details_en">{!! __('tours.details_en') !!}</label>
                                <textarea rows="5" id="details_en" name="details[en]" class="form-control details_en_summernote"></textarea>
                            </div>
                        </div>
                        <!-- end: input -->
                    </div>
                    <!-- end: row  details ar-->


                </div>
                <!--end::modal body-->

                <!--begin::modal footer-->
                <div class="modal-footer">
                    <button type="button" id="cancel_tour_btn_show" class="btn btn-light-dark font-weight-bold"
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
    <script src="{!! asset('vendor/summernote/summernote.js') !!}"></script>
    <script type="text/javascript">
        // details ar summernote
        $('.details_ar_summernote').summernote({
            placeholder: '{!! __('general.write_here') !!}',
            tabsize: 2,
            height: 150,
            toolbar: [
                // ['style', ['style']],
                // ['font', ['bold', 'underline', 'clear']],
                // ['color', ['color']],
                // ['para', ['ul', 'ol', 'paragraph']],
                // ['table', ['table']],
                // ['insert', ['link', 'video']],
                // ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });


        // details _en summernote
        $('.details_en_summernote').summernote({
            placeholder: '{!! __('general.write_here') !!}',
            tabsize: 2,
            height: 150,
            toolbar: [
                // ['style', ['style']],
                // ['font', ['bold', 'underline', 'clear']],
                // ['color', ['color']],
                // ['para', ['ul', 'ol', 'paragraph']],
                // ['table', ['table']],
                // ['insert', ['link', 'video']],
                // ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        // show edit modal
        $('body').on('click', '.show_tour_button', function(e) {
            e.preventDefault();
            var tour_id = $(this).attr('tour-id');
            var tour_details_ar = $(this).attr('tour-details-ar');
            var tour_details_en = $(this).attr('tour-details-en');

            $('.details_ar_summernote').summernote('code', tour_details_ar);
            $('.details_en_summernote').summernote('code', tour_details_en);

            $('#showTourModal').modal('show');
        })


        // cancel
        $('body').on('click', '#cancel_tour_btn_show', function(e) {
            $('#showTourModal').modal('hide');
        });

        // hide
        $('#showTourModal').on('hidden.bs.modal', function(e) {
            $('#showTourModal').modal('hide');
        });
    </script>
@endpush
