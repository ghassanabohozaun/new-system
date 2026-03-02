<div class="d-flex justify-content-end gap-2">
    <a href="{!! route('dashboard.pages.edit', $page->id) !!}" class="btn btn-outline-primary btn-icon-text btn-sm" title="{!! __('general.edit') !!}">
        <i class="ti-pencil btn-icon-prepend"></i>
        {!! __('general.edit') !!}
    </a>

    <button type="button" class="btn btn-outline-danger btn-icon-text btn-sm js-delete-btn"
        data-url="{!! route('dashboard.pages.destroy') !!}" data-id="{!! $page->id !!}" title="{!! __('general.delete') !!}">
        <i class="ti-trash btn-icon-prepend"></i>
        {!! __('general.delete') !!}
    </button>
</div>
