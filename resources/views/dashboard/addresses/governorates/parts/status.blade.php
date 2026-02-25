<div class="badge {!! $governorate->status == 'on' ? 'badge badge-pill-success' : 'badge badge-pill-danger' !!} governorate_status_{!! $governorate->id !!}">
    {!! $governorate->status == 'on' ? __('general.enable') : __('general.disabled') !!}
</div>
