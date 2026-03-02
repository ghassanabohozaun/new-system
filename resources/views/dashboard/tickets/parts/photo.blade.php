@if (!empty($ticket->photo))
    <img src='{!! asset('/uploads/tickets/' . $ticket->photo) !!}' width="50" height="50" class="rounded shadow-sm">
@else
    <span class="text-muted small">No Image</span>
@endif
