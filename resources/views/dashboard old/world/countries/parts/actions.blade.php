<div class="btn-group" role="group" aria-label="Button group with nested dropdown">

    {{-- edit --}}
    <a href="#" class="btn btn-sm btn-outline-primary edit_country_button" title="{!! __('general.edit') !!}"
        country-id="{!! $country->id !!}" country-name-ar="{!! $country->getTranslation('name', 'ar') !!}"
        country-name-en="{!! $country->getTranslation('name', 'en') !!}" country-phone-code = "{!! $country->phone_code !!}"
        country-flag-code = "{!! $country->flag_code !!}" country-status = "{!! $country->status !!}">
        <i class="la la-edit"></i>
    </a>

    {{-- delete --}}
    <a href="#" class="btn btn-sm btn-outline-danger delete_country_btn" data-id="{!! $country->id !!}">
        <i class="la la-trash"></i>
    </a>
</div>
</div>
