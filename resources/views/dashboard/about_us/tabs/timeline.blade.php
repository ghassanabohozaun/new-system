<div class="tab-pane fade show active" id="timeline" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-rounded mt-1">
                <div class="card-body">
                    <div class="d-md-flex align-items-center justify-content-between mb-4">
                        <h4 class="card-title mb-0 d-flex align-items-center">
                            <span class="card-icon-premium me-3">
                                <i class="mdi mdi-timeline-clock-outline"></i>
                            </span>
                            {{ __('about.manage_timeline') }}
                        </h4>
                        <div class="btn-wrapper mt-3 mt-sm-0">
                            <button type="button" class="btn btn-primary text-white me-0" data-bs-toggle="modal"
                                data-bs-target="#createTimelineModal">
                                <i class="icon-plus"></i> {{ __('about.add_new_milestone') }}
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive table-responsive-custom">
                        <table class="table table-hover" id="responsiveTable">
                            <thead>
                                <tr>
                                    <th class="text-start">#</th>
                                    <th class="text-start">{{ __('about.year') }}</th>
                                    <th class="text-start">{{ __('about.title') }}</th>
                                    <th class="text-start">{{ __('about.sort_order') }}</th>
                                    <th class="text-center">{!! __('general.actions') !!}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($timelines as $node)
                                    <tr id="row{{ $node->id }}">
                                        <td class="text-start">{{ $loop->iteration }}</td>
                                        <td class="text-start fw-bold">{{ $node->year }}</td>
                                        <td class="text-start">{{ $node->title }}</td>
                                        <td class="text-start">{{ $node->sort_order }}</td>
                                        <td class="text-end td-fit">
                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="#"
                                                    class="btn btn-outline-primary btn-icon-text btn-sm edit_timeline_button"
                                                    title="{!! __('general.edit') !!}" data-id="{{ $node->id }}"
                                                    data-year="{{ $node->year }}" data-sort="{{ $node->sort_order }}"
                                                    data-title-ar="{{ $node->getTranslation('title', 'ar') }}"
                                                    data-title-en="{{ $node->getTranslation('title', 'en') }}"
                                                    data-text-ar="{{ $node->getTranslation('text', 'ar') }}"
                                                    data-text-en="{{ $node->getTranslation('text', 'en') }}">
                                                    <i class="ti-pencil btn-icon-prepend"></i>
                                                    {!! __('general.edit') !!}
                                                </a>
                                                <button type="button"
                                                    class="btn btn-outline-danger btn-icon-text btn-sm js-delete-btn"
                                                    data-id="{{ $node->id }}"
                                                    data-url="{{ route('dashboard.about-us-timeline.destroy') }}"
                                                    data-title="{!! __('general.ask_delete_record') !!}"
                                                    data-text="{!! __('general.delete_warning_text') !!}"
                                                    data-confirm-btn="{!! __('general.yes') !!}"
                                                    data-cancel-btn="{!! __('general.no') !!}"
                                                    data-success-title="{!! __('general.deleted') !!}"
                                                    data-success-text="{!! __('general.delete_success_message') !!}"
                                                    title="{!! __('general.delete') !!}">
                                                    <i class="ti-trash btn-icon-prepend"></i>
                                                    {!! __('general.delete') !!}
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <x-dashboard.empty-state icon="mdi-timeline-outline" :message="__('addresses.no_cities_found')" />
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
