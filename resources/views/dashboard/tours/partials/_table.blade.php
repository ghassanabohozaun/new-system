<div class="table-responsive table-responsive-custom">
    <table class="table table-hover" id="responsiveTable">
        <thead>
            <tr>
                <th class="details-col"></th>
                <th class="text-start">#</th>
                <th class="text-start" style="min-width: 200px;">{!! __('tours.title') !!}</th>
                <th class="text-start d-none d-lg-table-cell">{!! __('tours.price') !!}</th>
                <th class="text-start d-none d-xl-table-cell">{!! __('tours.country_id') !!}</th>
                <th class="text-start d-none d-xl-table-cell">{!! __('tours.city_id') !!}</th>
                <th class="text-center d-none d-xl-table-cell">{!! __('tours.status') !!}</th>
                <th class="text-center d-none d-xl-table-cell">{!! __('tours.manage_status') !!}</th>
                <th class="text-center">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tours as $tour)
                <tr id="tour-row-{{ $tour->id }}">
                    <td class="details-col">
                        <i class="mdi mdi-plus-circle details-control" data-title="{!! $tour->getTranslation('title', Lang()) !!}"></i>
                    </td>
                    <td class="text-start">{!! $loop->iteration !!}</td>
                    <td class="text-start"
                        style="min-width: 200px; max-width: 350px; white-space: normal; word-break: break-word;">
                        {!! $tour->getTranslation('title', Lang()) !!}</td>
                    <td class="text-start d-none d-lg-table-cell">{!! $tour->price !!}</td>
                    <td class="text-start d-none d-xl-table-cell">{!! $tour->country->getTranslation('name', Lang()) !!}</td>
                    <td class="text-start d-none d-xl-table-cell">{!! $tour->city->getTranslation('name', Lang()) !!}</td>
                    <td class="text-center d-none d-xl-table-cell td-fit td-center-content"
                        data-label="{!! __('tours.status') !!}">
                        @include('dashboard.tours.parts.status', ['tour' => $tour])
                    </td>
                    <td class="text-center d-none d-xl-table-cell td-fit td-center-content">
                        @include('dashboard.tours.parts.manage-status', ['tour' => $tour])
                    </td>
                    <td class="text-end td-fit">
                        @include('dashboard.tours.parts.actions', ['tour' => $tour])
                    </td>

                    {{-- Hidden content for Details Modal --}}
                    <td class="d-none row-details">
                        <div class="px-2 py-3">
                            <div class="d-flex align-items-center mb-4 p-3 bg-light rounded-3 border">
                                <div class="me-3 flex-shrink-0">
                                    @include('dashboard.tours.parts.photo', ['tour' => $tour])
                                </div>
                                <div>
                                    <h5 class="mb-1 text-dark fw-bold" style="font-size: 1.1rem;">
                                        {!! $tour->getTranslation('title', Lang()) !!}
                                    </h5>
                                    <div class="d-flex align-items-center text-muted small">
                                        <i class="mdi mdi-cash-multiple me-1"></i>
                                        <span>{!! $tour->price !!}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="p-3 border rounded-3 bg-white h-100 shadow-sm">
                                        <label class="small text-muted d-block text-uppercase fw-bold mb-2"
                                            style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                            <i class="mdi mdi-map-marker-outline me-1"></i>{!! __('tours.country_id') !!} /
                                            {!! __('tours.city_id') !!}
                                        </label>
                                        <span
                                            class="badge badge-opacity-primary rounded-pill px-3 py-2 fw-bold d-inline-flex align-items-center"
                                            style="font-size: 0.85rem;">
                                            {!! $tour->country->getTranslation('name', Lang()) !!} - {!! $tour->city->getTranslation('name', Lang()) !!}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="p-3 border rounded-3 bg-white h-100 shadow-sm">
                                        <label class="small text-muted d-block text-uppercase fw-bold mb-2"
                                            style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                            <i class="mdi mdi-toggle-switch-outline me-1"></i>{!! __('tours.status') !!}
                                        </label>
                                        <div>
                                            @include('dashboard.tours.parts.status', ['tour' => $tour])
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
                        <x-dashboard.empty-state icon="mdi-map-marker-off-outline" :message="__('tours.no_tours_found')" />
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4 pagination-wrapper d-flex justify-content-end">
        {!! $tours->withQueryString()->links() !!}
    </div>
</div>
