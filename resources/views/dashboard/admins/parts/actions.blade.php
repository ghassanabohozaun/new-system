<a href="javascript:void(0)" class="btn btn-outline-primary btn-icon-text btn-sm edit_admin_button"
    title="{!! __('general.edit') !!}" admin-id="{!! $admin->id !!}" admin-name-ar="{!! $admin->getTranslation('name', 'ar') !!}"
    admin-name-en="{!! $admin->getTranslation('name', 'en') !!}" admin-email="{!! $admin->email !!}" admin-role-id="{!! $admin->role_id !!}"
    admin-status="{!! $admin->status !!}">
    <i class="ti-file btn-icon-prepend"></i>
    {!! __('general.edit') !!}
</a>

<button type="button" class="btn btn-outline-danger btn-icon-text btn-sm {!! auth('admin')->id() != $admin->id ? 'delete-confirm' : '' !!}"
    data-id="{!! $admin->id !!}" data-route="{!! route('dashboard.admins.destroy', $admin->id) !!}" data-title="{!! __('general.ask_delete_record') !!}"
    data-text="{!! __('general.delete_warning_text') !!}" data-confirm-btn="{!! __('general.yes') !!}"
    data-cancel-btn="{!! __('general.no') !!}" data-success-title="{!! __('general.deleted') !!}"
    data-success-text="{!! __('general.delete_success_message') !!}" title="{!! auth('admin')->id() == $admin->id ? __('general.prevent_delete') : '' !!}" {!! auth('admin')->id() == $admin->id ? 'disabled' : '' !!}>
    <i class="ti-alert btn-icon-prepend"></i>
    {!! __('general.delete') !!}
</button>
