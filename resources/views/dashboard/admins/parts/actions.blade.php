<div class="d-flex justify-content-end gap-2">
    <a href="javascript:void(0)" class="btn btn-outline-primary btn-icon-text btn-sm edit_admin_button"
        title="{!! __('general.edit') !!}" data-id="{!! $admin->id !!}" data-name-ar="{!! $admin->getTranslation('name', 'ar') !!}"
        data-name-en="{!! $admin->getTranslation('name', 'en') !!}" data-email="{!! $admin->email !!}" data-role-id="{!! $admin->role_id !!}"
        data-status-active="{!! $admin->status !!}" data-photo="{!! $admin->photo !!}">
        <i class="ti-pencil btn-icon-prepend"></i>
        {!! __('general.edit') !!}
    </a>

    <button type="button" class="btn btn-outline-danger btn-icon-text btn-sm {!! auth('admin')->id() != $admin->id ? 'js-delete-btn' : '' !!}"
        data-id="{!! $admin->id !!}" data-url="{!! route('dashboard.admins.destroy', $admin->id) !!}" title="{!! auth('admin')->id() == $admin->id ? __('general.prevent_delete') : __('general.delete') !!}"
        {!! auth('admin')->id() == $admin->id ? 'disabled' : '' !!}>
        <i class="ti-trash btn-icon-prepend"></i>
        {!! __('general.delete') !!}
    </button>
</div>
