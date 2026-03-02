<div class="d-flex justify-content-end gap-2">
    <a href="{{ route('dashboard.roles.edit', $role->id) }}" class="btn btn-outline-primary btn-icon-text btn-sm">
        <i class="ti-pencil btn-icon-prepend"></i>
        {!! __('general.edit') !!}
    </a>
    <button type="button" class="btn btn-outline-danger btn-icon-text btn-sm delete-confirm"
        data-id="{!! $role->id !!}" data-route="{!! route('dashboard.roles.destroy') !!}" data-title="{!! __('general.ask_delete_record') !!}"
        data-text="{!! __('general.delete_warning_text') !!}">
        <i class="ti-trash btn-icon-prepend"></i>
        {!! __('general.delete') !!}
    </button>
</div>
