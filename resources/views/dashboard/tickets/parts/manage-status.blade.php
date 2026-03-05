<div class="form-check form-switch d-flex justify-content-center align-items-center m-0 p-0">
    <input type="checkbox" class="form-check-input mt-0 js-status-change cursor-pointer" data-id="{{ $ticket->id }}"
        data-url="{{ route('dashboard.tickets.change.status') }}" data-badge-prefix="ticket_status_"
        style="width: 2.5rem; height: 1.25rem;" {{ $ticket->status == 1 ? 'checked' : '' }}>
</div>
