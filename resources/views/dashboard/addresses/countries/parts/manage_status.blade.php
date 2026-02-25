<div class="form-check form-switch d-flex justify-content-center">
    <input type="checkbox" class="form-check-input change_status" {{ $country->status == 1 ? 'checked' : '' }}
        data-id="{{ $country->id }}" role="switch" style="cursor: pointer; transform: scale(1.1);">
</div>
