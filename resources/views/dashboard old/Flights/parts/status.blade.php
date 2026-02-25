<div class="badge badge-md {!! $flight->status == 1 ? 'badge-success' : 'badge-danger' !!} flight_status_{!! $flight->id !!}">
    {!! $flight->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
