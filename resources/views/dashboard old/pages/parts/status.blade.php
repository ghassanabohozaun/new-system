<div class="badge badge-md {!! $page->status == 1 ? 'badge-success' : 'badge-danger' !!} page_status_{!! $page->id !!}">
    {!! $page->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
