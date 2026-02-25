<div class="form-check form-switch d-flex justify-content-center">
    <input type="checkbox" class="form-check-input js-status-change" {{ $country->status == 1 ? 'checked' : '' }}
        data-id="{{ $country->id }}" data-url="{{ route('dashboard.addresses.countries.change.status') }}"
        data-badge-prefix="country_status_" role="switch" style="cursor: pointer; transform: scale(1.1);">
</div>
