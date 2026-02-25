<div class="form-check form-switch d-flex justify-content-center">
    <input type="checkbox" class="form-check-input js-status-change" {{ $admin->status == 1 ? 'checked' : '' }}
        data-id="{{ $admin->id }}" data-url="{{ route('dashboard.admins.change.status') }}"
        data-badge-prefix="admin_status_" role="switch">
</div>
