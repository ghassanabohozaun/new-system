<div class="badge badge-md {!! $user->status == 'on' ? 'badge-success' : 'badge-danger' !!} user_status_{!! $user->id !!}">
    {!! $user->status == 'on' ? __('general.enable') : __('general.disabled') !!}
</div>
