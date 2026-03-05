<div class="table-responsive table-responsive-custom">
    <table class="table table-hover" id="responsiveTable">
        <thead>
            <tr>
                <th class="details-col"></th>
                <th class="text-start">#</th>
                <th class="text-start">{!! __('notifications.title') !!}</th>
                <th class="text-start d-none d-md-table-cell">{!! __('notifications.details') !!}</th>
                <th class="text-start d-none d-md-table-cell">{!! __('notifications.status') !!}</th>
                <th class="text-center">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($notifications as $notification)
                <tr id="row{{ $notification->id }}">
                    <td class="details-col">
                        <i class="mdi mdi-plus-circle details-control" data-title="{!! $notification->title !!}"></i>
                    </td>
                    <td class="text-start">{!! $loop->iteration !!}</td>
                    <td class="text-start">{!! $notification->title !!}</td>
                    <td class="text-start d-none d-md-table-cell">
                        {!! \Illuminate\Support\Str::limit(strip_tags($notification->details), 50) !!}
                    </td>
                    <td class="text-start d-none d-md-table-cell align-middle">
                        <div class="premium-mailing-switch-wrapper">
                            <label class="premium-mailing-switch mb-0">
                                <input class="js-mailing-status-change" type="checkbox" role="switch"
                                    data-id="{{ $notification->id }}"
                                    data-url="{{ route('dashboard.notifications.changeStatus') }}"
                                    data-badge-prefix="status-badge-" {{ $notification->status == 1 ? 'checked' : '' }}>
                                <div class="slider-capsule">
                                    <div class="capsule-icons">
                                        <i class="mdi mdi-check"></i>
                                        <i class="mdi mdi-bell-outline"></i>
                                    </div>
                                </div>
                            </label>
                            <span
                                class="status-label-premium {{ $notification->status == 1 ? 'contacted' : 'new' }} status-badge-{{ $notification->id }}">
                                {!! $notification->status == 1 ? __('general.active') : __('general.inactive') !!}
                            </span>
                        </div>
                    </td>
                    <td class="text-end td-fit">
                        @include('dashboard.notifications.parts.actions')
                    </td>

                    {{-- Hidden content for Details Modal --}}
                    <td class="d-none row-details">
                        <div class="px-2 py-3">
                            <div class="d-flex align-items-center mb-4 p-3 bg-light rounded-3 border">
                                <div class="me-3 flex-shrink-0">
                                    <div class="rounded-circle bg-white d-flex align-items-center justify-content-center border shadow-sm"
                                        style="width: 48px; height: 48px;">
                                        <i class="mdi mdi-bell-ring-outline text-primary fs-3"></i>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="mb-1 text-dark fw-bold" style="font-size: 1.1rem;">
                                        {!! $notification->title !!}
                                    </h5>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="p-3 border rounded-3 bg-white h-100 shadow-sm">
                                        <label class="small text-muted d-block text-uppercase fw-bold mb-2"
                                            style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                            <i class="mdi mdi-text-box-outline me-1"></i>{!! __('notifications.details') !!}
                                        </label>
                                        <div class="text-dark bg-light p-3 rounded border"
                                            style="font-size: 0.9rem; line-height: 1.6;">
                                            {!! strip_tags($notification->details) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <div
                                        class="p-3 border rounded-3 bg-light shadow-sm d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-white d-flex align-items-center justify-content-center me-3 border shadow-sm"
                                                style="width: 36px; height: 36px;">
                                                <i class="mdi mdi-toggle-switch-outline text-primary fs-5"></i>
                                            </div>
                                            <div>
                                                <label class="small text-muted d-block text-uppercase fw-bold mb-0"
                                                    style="font-size: 0.7rem;">{!! __('notifications.status') !!}</label>
                                                <div class="mt-2">
                                                    <div class="premium-mailing-switch-wrapper">
                                                        <label class="premium-mailing-switch mb-0">
                                                            <input class="js-mailing-status-change" type="checkbox"
                                                                role="switch" data-id="{{ $notification->id }}"
                                                                data-url="{{ route('dashboard.notifications.changeStatus') }}"
                                                                data-badge-prefix="status-badge-modal-"
                                                                {{ $notification->status == 1 ? 'checked' : '' }}>
                                                            <div class="slider-capsule">
                                                                <div class="capsule-icons">
                                                                    <i class="mdi mdi-check"></i>
                                                                    <i class="mdi mdi-bell-outline"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <span
                                                            class="status-label-premium {{ $notification->status == 1 ? 'contacted' : 'new' }} status-badge-modal-{{ $notification->id }}">
                                                            {!! $notification->status == 1 ? __('general.active') : __('general.inactive') !!}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11">
                        <x-dashboard.empty-state icon="mdi-bell-off-outline" :message="__('notifications.notification_box_empty')" />
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4 pagination-wrapper d-flex justify-content-end">
    {!! $notifications->withQueryString()->links() !!}
</div>
