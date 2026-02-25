<div class="badge badge-md {!! $tour->status == 1 ? 'badge-success' : 'badge-danger' !!} tour_status_{!! $tour->id !!}">
    {!! $tour->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
