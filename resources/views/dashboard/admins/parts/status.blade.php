<div class="badge {!! $admin->status == 1 ? 'badge badge-pill-success' : 'badge badge-pill-danger' !!} admin_status_{!! $admin->id !!}">
    {!! $admin->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
