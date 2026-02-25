<div class="form-check form-switch d-flex justify-content-center">
    <input type="checkbox" class="form-check-input change_status" {{ $governorate->status == 'on' ? 'checked' : '' }}
        data-id="{{ $governorate->id }}" role="switch">
</div>
