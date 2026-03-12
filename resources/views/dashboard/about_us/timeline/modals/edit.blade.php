<div class="modal fade" id="updateTimelineModal" tabindex="-1" role="dialog" aria-labelledby="updateTimelineModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered premium-modal-xl" role="document">
        <form class="forms-sample" action="" method="POST" id='update_timeline_form'>
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateTimelineModalLabel">
                        <i class="mdi mdi-pencil me-2 text-warning"></i>{{ __('about.edit_milestone') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id_edit_timeline" name="id">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3 theme-primary">
                                <label for="year_edit" class="form-label-premium">{{ __('about.year') }} <span class="text-danger">*</span></label>
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    <input type="text" id="year_edit" name="year" class="form-control" placeholder="{{ __('about.placeholder_year') }}">
                                </div>
                                <strong id="year_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3 theme-primary">
                                <label for="sort_order_edit" class="form-label-premium">{{ __('about.sort_order') }} <span class="text-danger">*</span></label>
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-sort-numeric-ascending"></i></span>
                                    <input type="number" id="sort_order_edit" name="sort_order" class="form-control" value="0">
                                </div>
                                <strong id="sort_order_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3 theme-primary">
                                <label class="form-label-premium">{{ __('about.title_ar') }} <span class="text-danger">*</span></label>
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-format-title"></i></span>
                                    <input type="text" id="title_ar_edit" name="title[ar]" class="form-control">
                                </div>
                                <strong id="title_ar_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3 theme-primary">
                                <label class="form-label-premium">{{ __('about.title_en') }} <span class="text-danger">*</span></label>
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-format-title"></i></span>
                                    <input type="text" id="title_en_edit" name="title[en]" class="form-control">
                                </div>
                                <strong id="title_en_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3 theme-primary">
                                <label class="form-label-premium">{{ __('about.text_ar') }} <span class="text-danger">*</span></label>
                                <textarea id="text_ar_edit" name="text[ar]" class="form-control" rows="3"></textarea>
                                <strong id="text_ar_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3 theme-primary">
                                <label class="form-label-premium">{{ __('about.text_en') }} <span class="text-danger">*</span></label>
                                <textarea id="text_en_edit" name="text[en]" class="form-control" rows="3"></textarea>
                                <strong id="text_en_error_edit" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                </div>

            </div>
        </form>
    </div>
</div>

<!-- Floating Command HUD -->
<x-dashboard.command-hud formId="update_timeline_form" hudId="update_timeline_hud" countId="update_timeline_count"
    discardId="update_timeline_discard" submitId="update_timeline_save" />

@push('scripts')
    <script type="text/javascript">
        // show edit modal
        $('body').on('click', '.edit_timeline_button', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var year = $(this).attr('data-year');
            var sort = $(this).attr('data-sort');
            var titleAr = $(this).attr('data-title-ar');
            var titleEn = $(this).attr('data-title-en');
            var textAr = $(this).attr('data-text-ar');
            var textEn = $(this).attr('data-text-en');

            const url = "{!! route('dashboard.about-us-timeline.update', 'id') !!}".replace('id', id);
            $('#update_timeline_form').attr('action', url);

            $('#id_edit_timeline').val(id);
            $('#year_edit').val(year);
            $('#sort_order_edit').val(sort);
            $('#title_ar_edit').val(titleAr);
            $('#title_en_edit').val(titleEn);
            $('#text_ar_edit').val(textAr);
            $('#text_en_edit').val(textEn);

            $('#updateTimelineModal').modal('show');
            if (window.activeHud) window.activeHud.changedFields.clear();
            initHud('update_timeline_form', {
                hudId: 'update_timeline_hud',
                countId: 'update_timeline_count',
                discardId: 'update_timeline_discard',
                submitId: 'update_timeline_save'
            });
        });

        $('#updateTimelineModal').on('hidden.bs.modal', function() {
            window.clearFormErrors('#update_timeline_form');
        });

        $('#updateTimelineModal').on('hide.bs.modal', function() {
            $('#update_timeline_hud').removeClass('visible');
        });

        window.handleFormSubmit('#update_timeline_form', {
            modalToHide: '#updateTimelineModal',
            successMessage: "{!! __('general.update_success_message') !!}",
            suffix: '_edit',
            resetForm: false
        });
    </script>
@endpush
