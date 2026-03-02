<div class="form-check form-switch d-flex justify-content-center">
    <input type="checkbox" class="form-check-input js-status-change" {{ $page->status == 1 ? 'checked' : '' }}
        id="status-manage-{{ $page->id }}" data-id="{{ $page->id }}"
        data-url="{{ route('dashboard.pages.change.status') }}" data-badge-prefix="page_status_" role="switch">
    <label class="form-check-label mn-0" for="status-manage-{{ $page->id }}"></label>
</div>
