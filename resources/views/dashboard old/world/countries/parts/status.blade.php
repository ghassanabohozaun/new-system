<div class="badge badge-md {!! $country->status == 1 ? 'badge-success' : 'badge-danger' !!} country_status_{!! $country->id !!}">
    {!! $country->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
