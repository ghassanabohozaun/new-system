<button type="button" class="btn btn-block btn-primary btn-glow px-2 mt-1" data-toggle="modal"
    data-target="#fullScreenModal_{!! $page->id !!}">
    {!! __('general.full_screen') !!}
</button>


<!-- begin: modal-->
<div class="modal fade" id="fullScreenModal_{!! $page->id !!}" tabindex="-1" role="dialog"
    aria-labelledby="fullScreenModalLabel" aria-hidden="true" style="z-index: 10001">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--begin::modal header-->
            <div class="modal-header">
                <h5 class="modal-title test_answer_header" id="fullScreenModalLabel">{!! $page->title !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--end::modal header-->

            <!--begin::modal body-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        {!! $page->getTranslation('details', Lang()) !!}
                    </div>
                </div>
            </div>
            <!--end::modal body-->
        </div>
    </div>
</div>
<!-- end: modal-->
