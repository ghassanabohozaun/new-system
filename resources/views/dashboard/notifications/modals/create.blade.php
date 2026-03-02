<div class="modal fade" id="createNotificationModal" tabindex="-1" aria-labelledby="createNotificationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createNotificationModalLabel">
                    <i class="mdi mdi-plus-circle me-2"></i>{!! __('notifications.create_new_notification') !!}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createNotificationForm" action="{!! route('dashboard.notifications.store') !!}" method="POST" novalidate>
                <div class="modal-body text-start">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3 theme-primary">
                                <label for="title" class="form-label-premium">{!! __('notifications.title') !!} <span
                                        class="text-danger">*</span></label>
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-format-title"></i></span>
                                    <input type="text" id="title" name="title" class="form-control"
                                        autocomplete="off" placeholder="{!! __('notifications.enter_title') !!}">
                                </div>
                                <strong id="title_error" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-3 theme-primary">
                                <label for="details" class="form-label-premium">{!! __('notifications.details') !!} <span
                                        class="text-danger">*</span></label>
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-text-subject"></i></span>
                                    <textarea id="details" name="details" class="form-control" rows="3" placeholder="{!! __('notifications.enter_details') !!}"></textarea>
                                </div>
                                <strong id="details_error" class="text-danger small"></strong>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-3 theme-info">
                                <label for="link" class="form-label-premium">{!! __('notifications.link') !!}</label>
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-link"></i></span>
                                    <input type="text" id="link" name="link" class="form-control"
                                        autocomplete="off" placeholder="https://example.com">
                                </div>
                                <strong id="link_error" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- Buttons removed in favor of Floating Command HUD -->
                </div>

                <!-- Floating Command HUD -->
                <x-dashboard.command-hud formId="createNotificationForm" hudId="create_notification_hud"
                    countId="create_notification_count" discardId="create_notification_discard"
                    submitId="create_notification_save" />
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        // reset
        function resetCreateNotificationForm() {
            $('#createNotificationForm')[0].reset();
            window.clearFormErrors('#createNotificationForm');
        }

        // hide
        $('#createNotificationModal').on('hidden.bs.modal', function(e) {
            resetCreateNotificationForm();
        });

        // Initialize HUD when modal is shown
        $('#createNotificationModal').on('shown.bs.modal', function() {
            initHud('createNotificationForm', {
                hudId: 'create_notification_hud',
                countId: 'create_notification_count',
                discardId: 'create_notification_discard',
                submitId: 'create_notification_save'
            });
        });
    </script>
@endpush
