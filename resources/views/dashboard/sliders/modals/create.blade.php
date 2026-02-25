<div class="modal fade" id="createSliderModal" tabindex="-1" role="dialog" aria-labelledby="createSliderModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-uw" role="document">
        <form class="forms-sample" action="{{ route('dashboard.sliders.store') }}" method="POST"
            enctype="multipart/form-data" id="create_slider_form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSliderModalLabel">
                        <i class="mdi mdi-plus-circle me-2"></i>{!! __('sliders.create_new_slider') !!}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title_ar">{!! __('sliders.title_ar') !!} <span class="text-danger">*</span></label>
                                <input type="text" id="title_ar" name="title[ar]"
                                    class="form-control form-control-sm" placeholder="{!! __('sliders.enter_title_ar') !!}"
                                    autocomplete="off">
                                <strong id="title_ar_error" class="text-danger small"></strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title_en">{!! __('sliders.title_en') !!} <span class="text-danger">*</span></label>
                                <input type="text" id="title_en" name="title[en]"
                                    class="form-control form-control-sm" placeholder="{!! __('sliders.enter_title_en') !!}"
                                    autocomplete="off">
                                <strong id="title_en_error" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="details_ar">{!! __('sliders.details_ar') !!} <span
                                        class="text-danger">*</span></label>
                                <textarea id="details_ar" name="details[ar]" class="form-control form-control-sm" rows="5"
                                    placeholder="{!! __('sliders.enter_details_ar') !!}"></textarea>
                                <strong id="details_ar_error" class="text-danger small"></strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="details_en">{!! __('sliders.details_en') !!} <span
                                        class="text-danger">*</span></label>
                                <textarea id="details_en" name="details[en]" class="form-control form-control-sm" rows="5"
                                    placeholder="{!! __('sliders.enter_details_en') !!}"></textarea>
                                <strong id="details_en_error" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="url_ar">{!! __('sliders.url_ar') !!}</label>
                                <input type="text" id="url_ar" name="url[ar]" class="form-control form-control-sm"
                                    placeholder="{!! __('sliders.enter_url_ar') !!}">
                                <strong id="url_ar_error" class="text-danger small"></strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="url_en">{!! __('sliders.url_en') !!}</label>
                                <input type="text" id="url_en" name="url[en]" class="form-control form-control-sm"
                                    placeholder="{!! __('sliders.enter_url_en') !!}">
                                <strong id="url_en_error" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label text-dark fw-bold"><i
                                        class="mdi mdi-image me-1 text-primary"></i>{!! __('sliders.photo') !!} <span
                                        class="text-danger">*</span></label>
                                <div
                                    class="slider-upload-card d-flex align-items-stretch gap-3 border rounded-3 p-3 bg-light">

                                    <!-- Preview Thumbnail -->
                                    <div id="create_slider_preview"
                                        class="slider-thumb-preview rounded-3 overflow-hidden border flex-shrink-0 bg-white d-flex align-items-center justify-content-center"
                                        style="width:240px; height:135px;">
                                        <div class="text-center text-muted">
                                            <i class="mdi mdi-image-outline"
                                                style="font-size:2rem; opacity:0.35;"></i>
                                            <div style="font-size:0.7rem; margin-top:4px;">1920 × 742</div>
                                        </div>
                                    </div>

                                    <!-- Upload Input -->
                                    <div class="d-flex flex-column justify-content-center flex-grow-1">
                                        <div class="mb-1 text-muted small"><i
                                                class="mdi mdi-cloud-upload-outline me-1"></i>{!! __('sliders.click_to_upload') !!}
                                        </div>
                                        <input type="file" id="photo" name="photo"
                                            class="form-control form-control-sm js-image-preview"
                                            data-preview="#create_slider_preview" accept="image/*">
                                        <small class="text-muted mt-1"><i
                                                class="mdi mdi-information-outline me-1"></i>{!! __('sliders.slider_size') !!}</small>
                                        <strong id="photo_error" class="text-danger small d-block mt-1"></strong>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <div
                                    class="d-flex align-items-center justify-content-between border rounded p-2 bg-light">
                                    <label class="mb-0 text-dark fw-bold" for="status_active"><i
                                            class="mdi mdi-power me-2 text-primary"></i>{!! __('sliders.status') !!}</label>
                                    <div class="form-check form-switch mb-0">
                                        <input type="hidden" name="status" value="0">
                                        <input type="checkbox" class="form-check-input" name="status"
                                            id="status_active" value="1" checked>
                                    </div>
                                </div>
                                <strong id="status_error" class="text-danger small"></strong>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <div
                                    class="d-flex align-items-center justify-content-between border rounded p-2 bg-light">
                                    <label class="mb-0 text-dark fw-bold" for="details_status_active"><i
                                            class="mdi mdi-format-list-bulleted-type me-2 text-primary"></i>{!! __('sliders.details_status') !!}</label>
                                    <div class="form-check form-switch mb-0">
                                        <input type="hidden" name="details_status" value="0">
                                        <input type="checkbox" class="form-check-input" name="details_status"
                                            id="details_status_active" value="1" checked>
                                    </div>
                                </div>
                                <strong id="details_status_error" class="text-danger small"></strong>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <div
                                    class="d-flex align-items-center justify-content-between border rounded p-2 bg-light">
                                    <label class="mb-0 text-dark fw-bold" for="button_status_active"><i
                                            class="mdi mdi-gesture-tap-button me-2 text-primary"></i>{!! __('sliders.button_status') !!}</label>
                                    <div class="form-check form-switch mb-0">
                                        <input type="hidden" name="button_status" value="0">
                                        <input type="checkbox" class="form-check-input" name="button_status"
                                            id="button_status_active" value="1" checked>
                                    </div>
                                </div>
                                <strong id="button_status_error" class="text-danger small"></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary text-white">
                        <i class="ti-save me-1" style="font-size: 0.85rem;"></i> {!! __('general.save') !!}
                        <span class="spinner-border spinner-border-sm d-none spinner_loading" role="status"
                            aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">
                        <i class="ti-close me-1" style="font-size: 0.85rem;"></i> {!! __('general.cancel') !!}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
