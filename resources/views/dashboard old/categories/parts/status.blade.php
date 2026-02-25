<div class="badge badge-md {!! $category->status == 1 ? 'badge-success' : 'badge-danger' !!} category_status_{!! $category->id !!}">
    {!! $category->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
