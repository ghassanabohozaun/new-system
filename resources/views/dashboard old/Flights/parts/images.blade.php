<div class="text-center" style="width: 150px;">

    <div class="position-relative d-inline-block">
        @if (!empty($flight->images()->first()))
            <img src='{!! asset('/uploads/flights/' . $flight->images()->first()->file_name) !!}' width="100" height="100" class="img-fluid img-responsive">
            <a href="#" data-target="#fullScreenModal_{!! $flight->id !!}" data-toggle="modal"
                class="badge badge-sm bg-info  position-absolute" style="top: 5px; left: 2px;">
                <i class="la la-arrows"></i>
            </a>
        @else
            <img src='{!! asset('assets/dashbaord/images/images-empty.png') !!}' width="100" height="100" class="img-fluid img-responsive">
        @endif

    </div>
</div>

<!-- begin: modal-->
<div class="modal fade" id="fullScreenModal_{!! $flight->id !!}" tabindex="-1" role="dialog"
    aria-labelledby="fullScreenModalLabel" aria-hidden="true" style="z-index: 10001">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--begin::modal header-->
            <div class="modal-header">
                <h5 class="modal-title test_answer_header" id="fullScreenModalLabel">{!! $flight->name !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--end::modal header-->

            <!--begin::modal body-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div id="carouselExampleControlsModal_{!! $flight->id !!}" class="carousel slide"
                            data-ride="carousel" style="width: 100%">
                            <div class="carousel-inner">
                                @foreach ($flight->images as $key => $image)
                                    <div class="carousel-item {!! $key == 0 ? 'active' : '' !!}">
                                        <img src="{!! asset('uploads/flights/' . $image->file_name) !!}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach
                                <a href="#carouselExampleControlsModal_{!! $flight->id !!}"
                                    class="carousel-control-prev" type="button"
                                    data-target="#carouselExampleControlsModal_{!! $flight->id !!}"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">{!! __('general.previous') !!}</span>
                                </a>
                                <a href="#carouselExampleControlsModal_{!! $flight->id !!}"
                                    class="carousel-control-next" type="button"
                                    data-target="#carouselExampleControlsModal_{!! $flight->id !!}"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">{!! __('general.next') !!}</span>
                                </a>
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
