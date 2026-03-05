<div class="modal fade" id="createMailingModal" tabindex="-1" aria-labelledby="createMailingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered premium-modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createMailingModalLabel">
                    <i class="mdi mdi-plus-circle me-2"></i>{!! __('mailing.create_new_email') !!}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createMailingForm" action="{!! route('dashboard.mailing.store') !!}" method="POST" novalidate>
                <div class="modal-body text-start">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3 theme-primary">
                                <label for="email" class="form-label-premium">{!! __('mailing.email') !!} <span
                                        class="text-danger">*</span></label>
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                                    <input type="email" id="email" name="email" class="form-control"
                                        autocomplete="off" placeholder="{!! __('mailing.enter_email') !!}">
                                </div>
                                <strong id="email_error" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- Buttons removed in favor of Floating Command HUD -->
                </div>

                <!-- Floating Command HUD -->
                <x-dashboard.command-hud formId="createMailingForm" hudId="create_mailing_hud"
                    countId="create_mailing_count" discardId="create_mailing_discard" submitId="create_mailing_save" />
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        // reset
        function resetCreateMailingForm() {
            $('#createMailingForm')[0].reset();
            window.clearFormErrors('#createMailingForm');
        }

        // hide
        $('#createMailingModal').on('hidden.bs.modal', function(e) {
            resetCreateMailingForm();
        });

        // Initialize HUD when modal is shown
        $('#createMailingModal').on('shown.bs.modal', function() {
            initHud('createMailingForm', {
                hudId: 'create_mailing_hud',
                countId: 'create_mailing_count',
                discardId: 'create_mailing_discard',
                submitId: 'create_mailing_save'
            });
        });
    </script>
@endpush
