<div class="card border-0 shadow-sm premium-glass-card overflow-hidden">
    <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pt-4 px-4">
        <h4 class="text-info mb-0 fw-bold">
            <i class="mdi mdi-face-agent me-2"></i>{!! __('flights.services') !!}
        </h4>
        <button type="button" wire:click.prevent="addNewService"
            class="btn btn-sm btn-gradient-info-light btn-icon-text shadow-sm">
            <i class="mdi mdi-plus btn-icon-prepend"></i> {!! __('general.add_new') !!}
        </button>
    </div>
    <div class="card-body p-4 pt-2">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-premium table-premium-responsive">
                <thead class="bg-light">
                    <tr>
                        <th class="py-3 px-4">{!! __('flights.service_name_ar') !!}</th>
                        <th class="py-3 px-4">{!! __('flights.service_name_en') !!}</th>
                        <th class="py-3 px-4 text-center d-none d-md-table-cell column-actions-minimal">
                            {!! __('general.actions') !!}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicesItems as $index => $row)
                        <tr wire:key="row-{{ $index }}">
                            <td class="p-3">
                                <div class="form-group mb-0 theme-info">
                                    <div class="input-group-premium">
                                        <span class="input-group-text"><i class="mdi mdi-translate"></i></span>
                                        <input type="text"
                                            wire:model="servicesItems.{!! $index !!}.service_name_ar"
                                            class="form-control" placeholder="{!! __('flights.enter_service_name_ar') !!}"
                                            @error('servicesItems.' . $index . '.service_name_ar') style="border-color: rgb(246, 78, 96)" @enderror>
                                    </div>
                                    @error('servicesItems.' . $index . '.service_name_ar')
                                        <span class="text text-danger d-block mt-1 small">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>

                            <td class="p-3">
                                <div class="form-group mb-0 theme-info">
                                    <div class="input-group-premium">
                                        <span class="input-group-text"><i
                                                class="mdi mdi-alpha-n-box-outline"></i></span>
                                        <input type="text"
                                            wire:model="servicesItems.{!! $index !!}.service_name_en"
                                            class="form-control" placeholder="{!! __('flights.enter_service_name_en') !!}"
                                            @error('servicesItems.' . $index . '.service_name_en') style="border-color: rgb(246, 78, 96)" @enderror />
                                    </div>
                                    @error('servicesItems.' . $index . '.service_name_en')
                                        <span class="text text-danger d-block mt-1 small">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                            <td class="p-3 text-center align-middle">
                                <button type="button" wire:click.prevent="addNewService"
                                    class="btn btn-sm btn-gradient-primary btn-icon me-1">
                                    <i class="mdi mdi-plus"></i>
                                </button>
                                <button type="button" wire:click.prevent="removeService({{ $index }})"
                                    class="btn btn-sm btn-gradient-danger btn-icon">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
