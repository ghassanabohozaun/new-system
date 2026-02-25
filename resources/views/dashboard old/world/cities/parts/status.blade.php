<div class="badge badge-md {!! $city->status == 'on' ? 'badge-success' : 'badge-danger' !!} city_status_{!! $city->id !!}" id=''>
    {!! $city->status == 'on' ? __('general.enable') : __('general.disabled') !!}
</div>
