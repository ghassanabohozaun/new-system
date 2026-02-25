<div class="d-flex justify-content-center gap-2">
    <button type="button" class="btn btn-outline-primary btn-sm btn-icon-text js-edit-slider"
        data-id="{{ $slider->id }}" data-title-ar="{{ $slider->getTranslation('title', 'ar') }}"
        data-title-en="{{ $slider->getTranslation('title', 'en') }}"
        data-details-ar="{{ $slider->getTranslation('details', 'ar') }}"
        data-details-en="{{ $slider->getTranslation('details', 'en') }}"
        data-url-ar="{{ $slider->getTranslation('url', 'ar') }}" data-url-en="{{ $slider->getTranslation('url', 'en') }}"
        data-status="{{ $slider->status }}" data-details-status="{{ $slider->details_status }}"
        data-button-status="{{ $slider->button_status }}" data-photo="{{ asset('uploads/sliders/' . $slider->photo) }}"
        title="{!! __('general.edit') !!}">
        <i class="icon-pencil"></i>
    </button>

    <button type="button" class="btn btn-outline-danger btn-sm btn-icon-text delete-confirm"
        data-id="{!! $slider->id !!}" data-route="{!! route('dashboard.sliders.destroy') !!}" data-title="{!! __('general.ask_delete_record') !!}"
        data-text="{!! __('general.delete_warning_text') !!}" data-confirm-btn="{!! __('general.yes') !!}"
        data-cancel-btn="{!! __('general.no') !!}" data-success-title="{!! __('general.deleted') !!}"
        data-success-text="{!! __('general.delete_success_message') !!}" title="{!! __('general.delete') !!}">
        <i class="ti-trash btn-icon-prepend"></i>
        {!! __('general.delete') !!}
    </button>
</div>
