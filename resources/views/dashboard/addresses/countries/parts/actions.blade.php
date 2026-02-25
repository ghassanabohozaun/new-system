<div class="text-center">
    <a href="#" class="btn btn-outline-primary btn-icon-text btn-sm edit_country_button"
        title="{!! __('general.edit') !!}" country-id="{!! $country->id !!}" country-name-ar="{!! $country->getTranslation('name', 'ar') !!}"
        country-name-en="{!! $country->getTranslation('name', 'en') !!}" country-phone-code = "{!! $country->phone_code !!}"
        country-flag-code = "{!! $country->flag_code !!}" country-status = "{!! $country->status !!}">
        <i class="ti-pencil btn-icon-prepend"></i>
    </a>



    <button type="button" class="btn btn-outline-danger btn-icon-text btn-sm delete-confirm"
        data-id="{!! $country->id !!}" data-route="{!! route('dashboard.addresses.countries.destroy') !!}" data-title="{!! __('general.ask_delete_record') !!}"
        data-text="{!! __('general.delete_warning_text') !!}" data-confirm-btn="{!! __('general.yes') !!}"
        data-cancel-btn="{!! __('general.no') !!}" data-success-title="{!! __('general.deleted') !!}"
        data-success-text="{!! __('general.delete_success_message') !!}" title="{!! __('general.delete') !!}">
        <i class="ti-trash btn-icon-prepend"></i>
        {!! __('general.delete') !!}
    </button>
</div>
