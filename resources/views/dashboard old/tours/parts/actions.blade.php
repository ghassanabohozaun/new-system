<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">


        {{-- edit --}}
        <a href="#" class="btn btn-sm btn-outline-info show_tour_button" title="{!! __('general.show') !!}"
            tour-id="{!! $tour->id !!}" tour-details-ar="{{ $tour->getTranslation('details', 'ar') }} "
            tour-details-en="{{ $tour->getTranslation('details', 'en') }} ">
            <i class="la la-eye"></i>
        </a>


        <a href="{!! route('dashboard.tours.edit', $tour->id) !!}" class="btn btn-sm btn-outline-primary" title="{!! __('general.edit') !!}">
            <i class="la la-edit"></i>
        </a>

        <a href="#" data-id="{!! $tour->id !!}" class="btn btn-sm btn-outline-danger delete_tour_btn"
            title="  {!! __('general.delete') !!}">
            <i class="la la-trash"></i>
        </a>

    </div>
</div>
