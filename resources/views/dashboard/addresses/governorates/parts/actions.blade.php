<div class="text-center">
    <a href="javascript:void(0)" class="btn btn-outline-primary btn-icon-text btn-sm edit_governorate_button me-2"
        title="{!! __('general.edit') !!}" governorate-id="{!! $governorate->id !!}"
        governorate-name-ar="{!! $governorate->getTranslation('name', 'ar') !!}" governorate-name-en="{!! $governorate->getTranslation('name', 'en') !!}">
        <i class="ti-pencil btn-icon-prepend"></i>
        {!! __('general.edit') !!}
    </a>

    <button type="button" class="btn btn-outline-danger btn-icon-text btn-sm delete-confirm"
        data-id="{!! $governorate->id !!}" data-route="{!! route('dashboard.addresses.governorates.destroy') !!}" data-title="{!! __('general.ask_delete_record') !!}"
        data-text="{!! __('general.delete_warning_text') !!}" data-confirm-btn="{!! __('general.yes') !!}"
        data-cancel-btn="{!! __('general.no') !!}" data-success-title="{!! __('general.deleted') !!}"
        data-success-text="{!! __('general.delete_success_message') !!}" title="{!! __('general.delete') !!}">
        <i class="ti-trash btn-icon-prepend"></i>
        {!! __('general.delete') !!}
    </button>
</div>
