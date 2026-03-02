<div class="card border-0 shadow-sm premium-glass-card overflow-hidden">
    <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pt-4 px-4">
        <h4 class="text-secondary mb-0 fw-bold">
            <i class="mdi mdi-image-multiple me-2"></i>{!! __('flights.images') !!}
        </h4>
    </div>
    <div class="card-body p-4 pt-2">
        <div class="row">
            <!-- begin: input -->
            <div class="col-md-12">
                <div class="form-group theme-primary">
                    <label class="form-label-premium" for="newImages">{!! __('flights.images') !!}</label>
                    <div class="input-group-premium">
                        <span class="input-group-text"><i class="mdi mdi-image-multiple"></i></span>
                        <input type="file" wire:model.live="newImages" class="form-control" multiple accept="image/*"
                            @error('newImages') style="border-color: rgb(246, 78, 96)" @enderror>
                    </div>
                    <div wire:loading wire:target="newImages" class="text-info mt-1 small"><i
                            class="mdi mdi-loading mdi-spin mr-1"></i> {!! __('flights.uploading') !!}</div>
                    @error('newImages')
                        <span class="text text-danger d-block mt-1 small">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- end: input -->

            <!-- begin: new image -->
            @if ($newImages)
                <div class="col-md-12 mt-3">
                    <h5 class="text-primary mb-3"><i class="mdi mdi-image-plus me-2"></i>{!! __('flights.new_images') !!}</h5>
                    <div class="d-flex flex-wrap gap-3">
                        @foreach ($newImages as $key => $image)
                            <div class="position-relative d-inline-block">
                                <img src="{!! $image->temporaryUrl() !!}"
                                    class="img-fluid img-thumbnail rounded-3 shadow-sm border-0"
                                    style="max-width: 250px; max-height: 250px; object-fit: cover;">

                                <!-- begin: delete image -->
                                <button type="button" wire:click="deleteNewImage({{ $key }})"
                                    class="btn btn-gradient-danger btn-icon btn-sm position-absolute rounded-circle shadow"
                                    style="top: -10px; right: -10px; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">
                                    <i class="mdi mdi-close" style="font-size: 14px;"></i>
                                </button>
                                <!-- end: delete image -->
                            </div>
                        @endforeach
                    </div>
                    <hr class="mt-4">
                </div>
            @endif
            <!-- end: new image -->


            <!-- begin: old image -->
            @if ($images)
                <div class="col-md-12 mt-3">
                    <h5 class="text-secondary mb-3"><i class="mdi mdi-image-outline me-2"></i>Uploaded Images</h5>
                    <div class="d-flex flex-wrap gap-3">
                        @foreach ($images as $key => $image)
                            <div class="position-relative d-inline-block">
                                <img src="{!! asset('uploads/flights/' . $image->file_name) !!}"
                                    class="img-fluid img-thumbnail rounded-3 shadow-sm border-0"
                                    style="max-width: 250px; max-height: 250px; object-fit: cover;">

                                <!-- begin: delete image -->
                                <button type="button"
                                    wire:click="deleteOldImage({{ $key }} , {{ $image }})"
                                    class="btn btn-gradient-danger btn-icon btn-sm position-absolute rounded-circle shadow"
                                    style="top: -10px; right: -10px; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">
                                    <i class="mdi mdi-close" style="font-size: 14px;"></i>
                                </button>
                                <!-- end: delete image -->
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <!-- end: old image -->
        </div>
    </div>
</div>
