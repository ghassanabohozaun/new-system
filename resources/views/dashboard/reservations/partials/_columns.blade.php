<div class="card mb-4">
    <div class="card-body">
        <h4 class="card-title mb-4 d-flex align-items-center">
            <span class="card-icon-premium me-3">
                <i class="mdi mdi-view-column text-primary"></i>
            </span>
            {!! __('reservations.columns') !!}
        </h4>

        <div class="row mt-2">
            @foreach ($filteredColumnNames as $key => $value)
                <div class="col-md-3 mb-2">
                    <label class="form-check custom-checkbox-premium" for="col_{{ $value }}">
                        <input type="checkbox" class="form-check-input" id="col_{{ $value }}" name="columns[]"
                            value="{{ $value }}">
                        <span class="form-check-label fw-bold">
                            {!! __('reservations.' . $value) !!}
                        </span>
                    </label>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12">
                <div id="columns_error" class="text-danger small mt-2 fw-bold"></div>
            </div>
        </div>
    </div>
</div>
