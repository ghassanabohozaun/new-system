<div class="form-check form-switch mb-0">
    <input type="checkbox" class="form-check-input js-status-change" role="switch" id="status-manage-{{ $slider->id }}"
        data-id="{{ $slider->id }}" data-url="{{ route('dashboard.sliders.change.status') }}"
        data-badge-prefix="slider-status-" {{ $slider->status == 1 ? 'checked' : '' }}>
    <label class="form-check-label mn-0" for="status-manage-{{ $slider->id }}"></label>
</div>
