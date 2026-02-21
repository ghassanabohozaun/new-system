<div class="form-check form-switch d-flex justify-content-center">
    <input type="checkbox" class="form-check-input change_status" {{ $admin->status == 1 ? 'checked' : '' }}
        data-id="{{ $admin->id }}" role="switch">
</div>
