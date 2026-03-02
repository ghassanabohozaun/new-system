<div class="card border-0 shadow-sm premium-glass-card overflow-hidden">
    <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pt-4 px-4">
        <h4 class="text-success mb-0 fw-bold">
            <i class="mdi mdi-cash-multiple me-2"></i>{!! __('flights.pricing') !!}
        </h4>
        <button type="button" wire:click.prevent="addNewPrice"
            class="btn btn-sm btn-gradient-success-light btn-icon-text shadow-sm">
            <i class="mdi mdi-plus btn-icon-prepend"></i> {!! __('general.add_new') !!}
        </button>
    </div>
    <div class="card-body p-4 pt-2">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-premium table-premium-responsive">
                <thead class="bg-light">
                    <tr>
                        <th class="py-3 px-4">{!! __('flights.price_text_ar') !!}</th>
                        <th class="py-3 px-4">{!! __('flights.price_text_en') !!}</th>
                        <th class="py-3 px-4">{!! __('flights.price') !!}</th>
                        <th class="py-3 px-4 text-center">{!! __('flights.main_option') !!}</th>
                        <th class="py-3 px-4 text-center d-none d-md-table-cell column-actions-minimal">
                            {!! __('general.actions') !!}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pricesItems as $index => $row)
                        <tr wire:key="row-{{ $index }}">
                            <td class="p-3">
                                <div class="form-group mb-0 theme-success">
                                    <div class="input-group-premium">
                                        <span class="input-group-text"><i class="mdi mdi-translate"></i></span>
                                        <input type="text"
                                            wire:model="pricesItems.{!! $index !!}.price_text_ar"
                                            class="form-control" placeholder="{!! __('flights.enter_price_text_ar') !!}"
                                            @error('pricesItems.' . $index . '.price_text_ar') style="border-color: rgb(246, 78, 96)" @enderror>
                                    </div>
                                    @error('pricesItems.' . $index . '.price_text_ar')
                                        <span class="text text-danger d-block mt-1 small">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>

                            <td class="p-3">
                                <div class="form-group mb-0 theme-success">
                                    <div class="input-group-premium">
                                        <span class="input-group-text"><i
                                                class="mdi mdi-alpha-p-box-outline"></i></span>
                                        <input type="text"
                                            wire:model="pricesItems.{!! $index !!}.price_text_en"
                                            class="form-control" placeholder="{!! __('flights.enter_price_text_en') !!}"
                                            @error('pricesItems.' . $index . '.price_text_en') style="border-color: rgb(246, 78, 96)" @enderror />
                                    </div>
                                    @error('pricesItems.' . $index . '.price_text_en')
                                        <span class="text text-danger d-block mt-1 small">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>

                            <td class="p-3">
                                <div class="form-group mb-0 theme-warning">
                                    <div class="input-group-premium">
                                        <span class="input-group-text"><i class="mdi mdi-currency-usd"></i></span>
                                        <input type="number" wire:model="pricesItems.{!! $index !!}.price"
                                            class="form-control" placeholder="{!! __('flights.price') !!}"
                                            @error('pricesItems.' . $index . '.price') style="border-color: rgb(246, 78, 96)" @enderror>
                                    </div>
                                    @error('pricesItems.' . $index . '.price')
                                        <span class="text text-danger d-block mt-1 small">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>

                            <td class="p-3 text-center align-middle">
                                <div
                                    class="form-check form-check-flat form-check-primary d-flex justify-content-center m-0">
                                    <label class="form-check-label">
                                        <input type="checkbox"
                                            wire:model="pricesItems.{!! $index !!}.main_option"
                                            class="form-check-input" {!! $row['main_option'] == true ? 'checked' : '' !!}
                                            wire:change="mainOptionChange({!! $index !!})">
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                                @error('pricesItems.' . $index . '.main_option')
                                    <span class="text text-danger d-block mt-1 small">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </td>

                            <td class="p-3 text-center align-middle">
                                <button type="button" wire:click.prevent="addNewPrice"
                                    class="btn btn-sm btn-gradient-primary btn-icon me-1">
                                    <i class="mdi mdi-plus"></i>
                                </button>
                                <button type="button" wire:click.prevent="removePrice({{ $index }})"
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
