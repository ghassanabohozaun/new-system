<div class="d-flex justify-content-end gap-2">

    <a href="{{ route('dashboard.categories.get.flights', $category->id) }}"
        class="btn btn-outline-info btn-icon-text btn-sm" title="{!! __('categories.flights') !!}">
        <i class="mdi mdi-airplane btn-icon-prepend"></i>
        {!! __('categories.flights') !!}
    </a>

    <a href="javascript:void(0)" class="btn btn-outline-primary btn-icon-text btn-sm edit-btn"
        title="{!! __('general.edit') !!}" data-id="{{ $category->id }}"
        data-name-ar="{{ $category->getTranslation('name', 'ar') }}"
        data-name-en="{{ $category->getTranslation('name', 'en') }}"
        data-slug-ar="{{ $category->getTranslation('slug', 'ar') }}"
        data-slug-en="{{ $category->getTranslation('slug', 'en') }}" data-parent="{{ $category->parent }}"
        data-status-active="{{ $category->status }}" data-photo="{!! $category->icon !!}">
        <i class="ti-pencil btn-icon-prepend"></i>
        {!! __('general.edit') !!}
    </a>

    <button type="button" class="btn btn-outline-danger btn-icon-text btn-sm js-delete-btn"
        data-id="{{ $category->id }}" data-url="{{ route('dashboard.categories.destroy') }}"
        title="{!! __('general.delete') !!}">
        <i class="ti-trash btn-icon-prepend"></i>
        {!! __('general.delete') !!}
    </button>
</div>
