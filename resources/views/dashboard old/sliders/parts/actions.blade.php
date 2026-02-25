<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        <a href="{!! route('dashboard.sliders.edit', $slider->id) !!}" class="btn btn-sm btn-outline-primary" title="{!! __('general.edit') !!}">
            <i class="la la-edit"></i>
        </a>

        <a href="#" data-id="{!! $slider->id !!}" class="btn btn-sm btn-outline-danger delete_slider_btn"
            title="  {!! __('general.delete') !!}">
            <i class="la la-trash"></i>
        </a>

    </div>
</div>
