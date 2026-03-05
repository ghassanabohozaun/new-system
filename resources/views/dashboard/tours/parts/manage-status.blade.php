<div class="form-check form-switch d-flex justify-content-center align-items-center m-0 p-0">
    <input type="checkbox" class="form-check-input mt-0 js-status-change cursor-pointer" role="switch"
        style="width: 2.5rem; height: 1.25rem;" id="status-manage-{{ $tour->id }}" data-id="{{ $tour->id }}"
        data-url="{{ route('dashboard.tours.change.status') }}" data-badge-prefix="tour-status-"
        {{ $tour->status == 1 ? 'checked' : '' }}>
</div>
