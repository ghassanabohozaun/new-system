<div class="badge {!! $country->status == 1 ? 'badge-pill-success' : 'badge-pill-danger' !!} country_status_{!! $country->id !!}"
    style="font-weight: 600; padding: 5px 12px;">
    {!! $country->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
