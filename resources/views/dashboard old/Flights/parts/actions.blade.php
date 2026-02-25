<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        {{-- edit --}}
        <a href="{!! route('dashboard.flights.edit', $flight->id) !!}" class="btn btn-sm btn-outline-primary" title="{!! __('general.edit') !!}">
            <i class="la la-edit"></i>
        </a>
        {{-- show --}}
        <a href="{!! route('dashboard.flights.show', $flight->id) !!}" class="btn btn-sm btn-outline-success" title="{!! __('general.show') !!}">
            <i class="la la-eye"></i>
        </a>

        {{-- delete --}}
        <button class="btn btn-sm btn-outline-danger delete_flight_btn" title="{!! __('general.delete') !!}"
            data-id="{!! $flight->id !!}">
            <i class="la la-trash"></i>
        </button>


    </div>
</div>
