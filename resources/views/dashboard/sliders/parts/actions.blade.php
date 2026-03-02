<div class="d-flex justify-content-end gap-2">
    <button type="button" class="btn btn-outline-primary btn-sm btn-icon-text js-edit-slider"
        data-slider-id="{{ $slider->id }}" data-title-ar="{{ $slider->getTranslation('title', 'ar') }}"
        data-title-en="{{ $slider->getTranslation('title', 'en') }}"
        data-details-ar="{{ $slider->getTranslation('details', 'ar') }}"
        data-details-en="{{ $slider->getTranslation('details', 'en') }}"
        data-url-ar="{{ $slider->getTranslation('url', 'ar') }}" data-url-en="{{ $slider->getTranslation('url', 'en') }}"
        data-status-active="{{ $slider->status }}" data-details-status-active="{{ $slider->details_status }}"
        data-button-status-active="{{ $slider->button_status }}"
        data-photo="{{ asset('uploads/sliders/' . $slider->photo) }}" title="{!! __('general.edit') !!}">
        <i class="icon-pencil"></i>
        {!! __('general.edit') !!}
    </button>

    <button type="button" class="btn btn-outline-danger btn-sm btn-icon-text js-delete-btn"
        data-id="{!! $slider->id !!}" data-url="{!! route('dashboard.sliders.destroy') !!}" title="{!! __('general.delete') !!}">
        <i class="ti-trash btn-icon-prepend"></i>
        {!! __('general.delete') !!}
    </button>
</div>
