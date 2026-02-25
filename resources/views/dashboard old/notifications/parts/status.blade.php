@if ($mail->status == 'new')
    <span class="badge badge-warning badge-sm">
        {!! __('mailing.new') !!}
    </span>
@elseif($mail->status == 'contacted')
    <span class="badge badge-success badge-sm">
        {!! __('mailing.contacted') !!}
    </span>
@endif
