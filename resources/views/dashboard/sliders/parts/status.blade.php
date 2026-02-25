<span
    class="badge slider-status-{{ $slider->id }} {{ $slider->status == 1 ? 'badge-pill-success' : 'badge-pill-danger' }}">
    {{ $slider->status == 1 ? __('general.active') : __('general.inactive') }}
</span>
