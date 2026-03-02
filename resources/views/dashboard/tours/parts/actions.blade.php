<div class="d-flex justify-content-end gap-2">
    <a href="{!! route('dashboard.tours.edit', $tour->id) !!}" class="btn btn-outline-primary btn-sm btn-icon-text" title="{!! __('general.edit') !!}">
        <i class="icon-pencil"></i>
        {!! __('general.edit') !!}
    </a>

    <button type="button" class="btn btn-outline-danger btn-sm btn-icon-text js-delete-btn"
        data-id="{!! $tour->id !!}" data-url="{!! route('dashboard.tours.destroy') !!}" title="{!! __('general.delete') !!}">
        <i class="ti-trash btn-icon-prepend"></i>
        {!! __('general.delete') !!}
    </button>
</div>
