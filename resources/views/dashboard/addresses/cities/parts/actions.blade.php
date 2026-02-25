<div class="text-center">
    <a href="javascript:void(0)" class="btn btn-outline-primary btn-icon-text btn-sm edit_city_button me-2"
        title="{!! __('general.edit') !!}" city-id="{!! $city->id !!}" city-name-ar="{!! $city->getTranslation('name', 'ar') !!}"
        city-name-en="{!! $city->getTranslation('name', 'en') !!}" governorate-id="{!! $city->governorate_id !!}">
        <i class="ti-pencil btn-icon-prepend"></i>
        {!! __('general.edit') !!}
    </a>

    <button type="button" class="btn btn-outline-danger btn-icon-text btn-sm delete-confirm"
        data-id="{!! $city->id !!}" data-route="{!! route('dashboard.addresses.cities.destroy') !!}" data-title="{!! __('general.ask_delete_record') !!}"
        data-text="{!! __('general.delete_warning_text') !!}" data-confirm-btn="{!! __('general.yes') !!}"
        data-cancel-btn="{!! __('general.no') !!}" data-success-title="{!! __('general.deleted') !!}"
        data-success-text="{!! __('general.delete_success_message') !!}" title="{!! __('general.delete') !!}">
        <i class="ti-trash btn-icon-prepend"></i>
        {!! __('general.delete') !!}
    </button>
</div>
