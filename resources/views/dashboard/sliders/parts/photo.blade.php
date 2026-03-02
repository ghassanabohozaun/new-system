@if ($slider->photo)
    <div class="expandable-image-wrapper" data-img-url="{{ asset('uploads/sliders/' . $slider->photo) }}"
        data-title="{{ $slider->getTranslation('title', Lang()) }}">
        <img src="{{ asset('uploads/sliders/' . $slider->photo) }}" alt="{{ $slider->getTranslation('title', Lang()) }}"
            class="js-expandable-image">
        <div class="image-overlay">
            <i class="mdi mdi-magnify"></i>
        </div>
    </div>
@else
    <span class="badge badge-pill-secondary">No Photo</span>
@endif
