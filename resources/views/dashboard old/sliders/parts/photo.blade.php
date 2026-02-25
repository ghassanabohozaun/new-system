<div class="text-center" style="width: 150px;">

    @if (!empty($slider->photo))
        <img src='{!! asset('/uploads/sliders/' . $slider->photo) !!}' width="150" height="120" class="img-fluid">

        <button type="button" class="btn btn-primary btn-block btn-glow px-2 mt-1 " data-toggle="modal"
            data-target="#fullScreenModal_{!! $slider->id !!}">
            {!! __('general.full_screen') !!}
        </button>
    @else
        <img src='{!! asset('assets/dashbaord/images/images-empty.png') !!}' style="width: 100%" class="img-fluid img-responsive">
    @endif

</div>

<!-- begin: modal-->
<div class="modal fade" id="fullScreenModal_{!! $slider->id !!}" tabindex="-1" role="dialog"
    aria-labelledby="fullScreenModalLabel" aria-hidden="true" style="z-index: 10001">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--begin::modal header-->
            <div class="modal-header">
                <h5 class="modal-title test_answer_header" id="fullScreenModalLabel">{!! $slider->name !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--end::modal header-->

            <!--begin::modal body-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div id="carouselExampleControlsModal_{!! $slider->id !!}" class="carousel slide"
                            data-ride="carousel" style="width: 100%">
                            <div class="carousel-inner">
                                <div>
                                    <img src="{!! asset('uploads/sliders/' . $slider->photo) !!}" class="d-block w-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::modal body-->
        </div>
    </div>
</div>
<!-- end: modal-->
