@if ($tour->photo)
    <div class="expandable-image-wrapper" data-img-url="{{ asset('uploads/tours/' . $tour->photo) }}"
        data-title="{{ $tour->getTranslation('name', Lang()) }}">
        <img src="{{ asset('uploads/tours/' . $tour->photo) }}" alt="{{ $tour->getTranslation('name', Lang()) }}"
            class="js-expandable-image" style="width: 70px; height: 70px; object-fit: cover; border-radius: 10px;">
        <div class="image-overlay">
            <i class="mdi mdi-magnify"></i>
        </div>
    </div>
@else
    <div class="d-flex align-items-center justify-content-center bg-light border rounded-2"
        style="width: 70px; height: 70px; min-width: 70px;">
        <i class="mdi mdi-image-off-outline text-muted" style="font-size: 1.6rem; opacity: 0.5;"></i>
    </div>
@endif
