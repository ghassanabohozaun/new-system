<div class="d-flex justify-content-end gap-2">
    <button type="button" class="btn btn-outline-danger btn-icon-text btn-sm delete-confirm"
        data-id="{!! $mail->id !!}" data-route="{!! route('dashboard.mailing.destroy', $mail->id) !!}" data-title="{!! __('general.ask_delete_record') !!}"
        data-text="{!! __('general.delete_warning_text') !!}" data-confirm-btn="{!! __('general.yes') !!}"
        data-cancel-btn="{!! __('general.no') !!}" data-success-title="{!! __('general.deleted') !!}"
        data-success-text="{!! __('general.delete_success_message') !!}" title="{!! __('general.delete') !!}">
        <i class="ti-trash btn-icon-prepend"></i>
        {!! __('general.delete') !!}
    </button>
</div>
