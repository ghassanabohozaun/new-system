<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        {{-- contact --}}
        <a href="#" title="{!! __('mail.mark_as_contacted') !!}" class="btn btn-sm {!! $mail->status == 'new' ? 'btn-outline-warning' : 'btn-outline-success ' !!}  contact_mail_btn"
            data-id="{{ $mail->id }}">
            <span class="icon-call-out"></span>
        </a>

        {{-- delete --}}
        <button class="btn btn-sm btn-outline-danger delete_mail_btn" title="{!! __('general.delete') !!}"
            data-id="{!! $mail->id !!}">
            <i class="la la-trash"></i>
        </button>

    </div>
</div>
