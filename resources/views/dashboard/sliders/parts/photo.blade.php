@if ($slider->photo)
    <img src="{{ asset('uploads/sliders/' . $slider->photo) }}" alt="{{ $slider->getTranslation('title', Lang()) }}"
        style="width: 80px; height: 40px; border-radius: 4px; object-fit: cover;">
@else
    <span class="badge badge-pill-secondary">No Photo</span>
@endif
