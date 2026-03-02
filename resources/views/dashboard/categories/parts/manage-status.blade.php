<div class="form-check form-switch d-flex justify-content-center">
    <input class="form-check-input js-status-change" type="checkbox" role="switch" data-id="{{ $category->id }}"
        data-url="{{ route('dashboard.categories.change.status') }}" data-badge-prefix="category_status_"
        {{ $category->status == 1 ? 'checked' : '' }}>
</div>
