<div class="d-flex justify-content-end gap-2">
    <a href="{!! route('dashboard.tickets.edit', $ticket->id) !!}" class="btn btn-outline-primary btn-icon-text btn-sm" title="{!! __('general.edit') !!}"
        data-id="{!! $ticket->id !!}" data-title-ar="{!! $ticket->getTranslation('title', 'ar') !!}" data-title-en="{!! $ticket->getTranslation('title', 'en') !!}"
        data-price="{!! $ticket->price !!}">
        <i class="ti-pencil btn-icon-prepend"></i>
        {!! __('general.edit') !!}
    </a>

    <button type="button" class="btn btn-outline-danger btn-icon-text btn-sm js-delete-btn"
        data-url="{!! route('dashboard.tickets.destroy') !!}" data-id="{!! $ticket->id !!}" title="{!! __('general.delete') !!}">
        <i class="ti-trash btn-icon-prepend"></i>
        {!! __('general.delete') !!}
    </button>
</div>
