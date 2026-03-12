<div class="modal fade" id="createTimelineModal" tabindex="-1" role="dialog" aria-labelledby="createTimelineModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered premium-modal-xl" role="document">
        <form class="forms-sample" action="{!! route('dashboard.about-us-timeline.store') !!}" method="POST"
            id='create_timeline_form'>
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTimelineModalLabel">
                        <i class="mdi mdi-plus-circle me-2 text-primary"></i>{{ __('about.add_new_milestone') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3 theme-primary">
                                <label for="year" class="form-label-premium">{{ __('about.year') }} <span class="text-danger">*</span></label>
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    <input type="text" name="year" class="form-control" placeholder="{{ __('about.placeholder_year') }}">
                                </div>
                                <strong id="year_error" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3 theme-primary">
                                <label for="sort_order" class="form-label-premium">{{ __('about.sort_order') }} <span class="text-danger">*</span></label>
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-sort-numeric-ascending"></i></span>
                                    <input type="number" name="sort_order" class="form-control" value="0">
                                </div>
                                <strong id="sort_order_error" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3 theme-primary">
                                <label class="form-label-premium">{{ __('about.title_ar') }} <span class="text-danger">*</span></label>
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-format-title"></i></span>
                                    <input type="text" name="title[ar]" class="form-control">
                                </div>
                                <strong id="title_ar_error" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3 theme-primary">
                                <label class="form-label-premium">{{ __('about.title_en') }} <span class="text-danger">*</span></label>
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-format-title"></i></span>
                                    <input type="text" name="title[en]" class="form-control">
                                </div>
                                <strong id="title_en_error" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3 theme-primary">
                                <label class="form-label-premium">{{ __('about.text_ar') }} <span class="text-danger">*</span></label>
                                <textarea name="text[ar]" class="form-control" rows="3"></textarea>
                                <strong id="text_ar_error" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3 theme-primary">
                                <label class="form-label-premium">{{ __('about.text_en') }} <span class="text-danger">*</span></label>
                                <textarea name="text[en]" class="form-control" rows="3"></textarea>
                                <strong id="text_en_error" class="text-danger small"></strong>
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
<x-dashboard.command-hud formId="create_timeline_form" hudId="create_timeline_hud" countId="create_timeline_count"
    discardId="create_timeline_discard" submitId="create_timeline_save" />

@push('scripts')
    <script type="text/javascript">
        $('#createTimelineModal').on('hidden.bs.modal', function() {
            window.clearFormErrors('#create_timeline_form');
            $('#create_timeline_form')[0].reset();
        });

        window.handleFormSubmit('#create_timeline_form', {
            modalToHide: '#createTimelineModal',
            successMessage: "{!! __('general.add_success_message') !!}"
        });

        $('#createTimelineModal').on('hide.bs.modal', function() {
            $('#create_timeline_hud').removeClass('visible');
        });

        $('#createTimelineModal').on('shown.bs.modal', function() {
            initHud('create_timeline_form', {
                hudId: 'create_timeline_hud',
                countId: 'create_timeline_count',
                discardId: 'create_timeline_discard',
                submitId: 'create_timeline_save'
            });
        });
    </script>
@endpush
