<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        <a href="{!! route('dashboard.pages.edit', $page->id) !!}" class="btn btn-sm btn-outline-primary" title="{!! __('general.edit') !!}">
            <i class="la la-edit"></i>
        </a>

        <a href="#" class="btn btn-sm btn-outline-danger delete_page_btn" data-id="{!! $page->id !!}"
            title="{!! __('general.delete') !!}">
            <i class="la la-trash-o"></i>
        </a>

    </div>
</div>
