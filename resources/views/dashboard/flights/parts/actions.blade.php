<div class="d-flex justify-content-end gap-2">
    @can('flights')
        <a href="{!! route('dashboard.flights.show', $flight->id) !!}" class="btn btn-outline-info btn-sm btn-icon-text" title="{!! __('general.show') !!}">
            <i class="mdi mdi-eye"></i>
            {!! __('general.show') !!}
        </a>
    @endcan

    @can('flights')
        <a href="{!! route('dashboard.flights.edit', $flight->id) !!}" class="btn btn-outline-primary btn-sm btn-icon-text" title="{!! __('general.edit') !!}">
            <i class="icon-pencil"></i>
            {!! __('general.edit') !!}
        </a>
    @endcan

    @can('flights')
        <button type="button" class="btn btn-outline-danger btn-sm btn-icon-text js-delete-btn"
            data-id="{!! $flight->id !!}" data-url="{!! route('dashboard.flights.destroy') !!}" title="{!! __('general.delete') !!}">
            <i class="ti-trash btn-icon-prepend"></i>
            {!! __('general.delete') !!}
        </button>
    @endcan
</div>
