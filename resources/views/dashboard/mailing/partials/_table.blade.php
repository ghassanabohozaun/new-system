<div class="table-responsive table-responsive-custom">
    <table class="table table-hover" id="responsiveTable">
        <thead>
            <tr>
                <th class="details-col"></th>
                <th class="text-start">#</th>
                <th class="text-start">{!! __('mailing.email') !!}</th>
                <th class="text-start d-none d-md-table-cell">{!! __('mailing.status') !!}</th>
                <th class="text-center">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mailings as $mail)
                <tr id="row{{ $mail->id }}">
                    <td class="details-col">
                        <i class="mdi mdi-plus-circle details-control"></i>
                    </td>
                    <td class="text-start">{!! $loop->iteration !!}</td>
                    <td class="text-start">{!! $mail->email !!}</td>
                    <td class="text-start d-none d-md-table-cell align-middle">
                        <div class="premium-mailing-switch-wrapper">
                            <label class="premium-mailing-switch mb-0">
                                <input class="js-mailing-status-change" type="checkbox" role="switch"
                                    data-id="{{ $mail->id }}"
                                    data-url="{{ route('dashboard.mailing.changeStatus') }}"
                                    data-badge-prefix="status-badge-"
                                    {{ $mail->status == 'contacted' ? 'checked' : '' }}>
                                <div class="slider-capsule">
                                    <div class="capsule-icons">
                                        <i class="mdi mdi-check"></i>
                                        <i class="mdi mdi-email-outline"></i>
                                    </div>
                                </div>
                            </label>
                            <span class="status-label-premium {{ $mail->status }} status-badge-{{ $mail->id }}">
                                {!! __('mailing.' . $mail->status) !!}
                            </span>
                        </div>
                    </td>
                    <td class="text-end td-fit">
                        @include('dashboard.mailing.parts.actions')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11">
                        <x-dashboard.empty-state icon="mdi-email-off-outline" :message="__('mailing.no_emails_found')" />
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4 pagination-wrapper d-flex justify-content-end">
    {!! $mailings->withQueryString()->links() !!}
</div>
