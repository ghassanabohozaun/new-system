<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">


        <a href="{!! route('dashboard.categories.get.flights', $category->id) !!}" class="btn btn-sm btn-outline-primary" title="{!! __('categories.flights') !!}">
            <i class="la la-plane"></i>
        </a>


        <a href="{!! route('dashboard.categories.edit', $category->id) !!}" class="btn btn-sm btn-outline-info" title="{!! __('general.edit') !!}">
            <i class="la la-edit"></i>
        </a>

        <a href="#" data-id="{!! $category->id !!}" class="btn btn-sm btn-outline-danger delete_category_btn"
            title="  {!! __('general.delete') !!}">
            <i class="la la-trash"></i>
        </a>

    </div>
</div>
