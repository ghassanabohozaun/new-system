@php
    $photo = $flight->images->first()?->image;
@endphp

@if ($photo)
    <div class="expandable-image-container relative ms-4">
        <a href="{{ asset($photo) }}" data-lightbox="flight-{{ $flight->id }}" data-title="{{ $flight->name }}">
            <img src="{{ asset($photo) }}" alt="Flight Photo" class="img-thumbnail rounded-3 premium-thumbnail"
                style="width: 45px; height: 45px; object-fit: cover;">
        </a>
    </div>
@else
    <div class="d-flex align-items-center justify-content-center bg-light rounded-3 ms-4"
        style="width: 45px; height: 45px;">
        <i class="mdi mdi-image-off text-muted opacity-50 fs-4"></i>
    </div>
@endif
