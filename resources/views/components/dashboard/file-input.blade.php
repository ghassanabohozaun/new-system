@props([
    'name',
    'id' => null,
    'previewWidth' => '240px',
    'previewHeight' => '135px',
    'currentImageUrl' => null,
    'deleteUrl' => null,
    'deleteId' => null,
    'placeholderIcon' => 'mdi-image-outline',
    'placeholderText' => null,
    'isRequired' => false,
    'label' => __('general.photo'),
    'errorId' => null,
    'imageFit' => 'contain',
])

@php
    $inputId = $id ?? $name . '_input';
    $previewId = $inputId . '_preview';
    $resetBtnId = 'reset_' . $inputId . '_btn';
    $errorElementId = $errorId ?? $name . '_error';
    $isEditMode = null !== $currentImageUrl;
@endphp

<div class="form-group mb-0 fileinput-component" data-mode="{{ $isEditMode ? 'edit' : 'create' }}"
    data-required="{{ $isRequired ? 'true' : 'false' }}" data-fit="{{ $imageFit }}">
    <label class="form-label-premium">
        <i class="mdi {{ $placeholderIcon }} me-1 text-primary"></i>{!! $label !!}
        @if ($isRequired)
            <span class="text-danger">*</span>
        @endif
    </label>

    <div class="slider-upload-card d-flex align-items-stretch gap-3 border rounded-3 p-3 bg-light">
        <!-- Preview Container -->
        <div id="{{ $previewId }}"
            class="fileinput-preview slider-thumb-preview rounded-3 overflow-hidden border flex-shrink-0 bg-white d-flex align-items-center justify-content-center position-relative"
            style="width:{{ $previewWidth }}; height:{{ $previewHeight }};">

            <!-- Placeholder (Create Mode OR Edit mode when deleted) -->
            <div class="fileinput-placeholder text-center text-muted {{ $isEditMode ? 'd-none' : '' }}">
                <i class="mdi {{ $placeholderIcon }}" style="font-size:2rem; opacity:0.35;"></i>
                @if ($placeholderText)
                    <div style="font-size:0.75rem; margin-top:4px; font-weight:600;">{{ $placeholderText }}</div>
                @endif
            </div>

            @if ($isEditMode)
                <!-- Current Image (Edit Mode) -->
                <img src="{{ $currentImageUrl }}" class="fileinput-current-img"
                    style="width:100%; height:100%; object-fit:{{ $imageFit }} !important; background-color: #f8f9fa;">

                <!-- Backend Delete Button -->
                @if ($deleteUrl && $deleteId)
                    <button type="button"
                        class="btn-delete-premium fileinput-backend-delete position-absolute top-0 end-0 m-2 shadow-sm"
                        data-url="{{ $deleteUrl }}" data-id="{{ $deleteId }}"
                        title="{{ __('general.delete') }}">
                        <i class="ti-trash"></i>
                    </button>
                @endif
            @endif

            <!-- Local Reset Button (Always hidden initially) -->
            <button type="button" id="{{ $resetBtnId }}"
                class="btn-delete-premium fileinput-local-reset position-absolute top-0 end-0 m-2 shadow-sm d-none"
                title="{{ __('general.undo') }}">
                <i class="ti-close"></i>
            </button>
        </div>

        <!-- Input Area -->
        <div class="d-flex flex-column justify-content-center flex-grow-1">
            <div class="mb-1 text-muted small">
                <i class="mdi mdi-cloud-upload-outline me-1"></i>{!! __('general.click_to_upload') !!}
            </div>

            <input type="file" name="{{ $name }}"
                class="form-control form-control-sm fileinput-input fileinput-trigger" id="{{ $inputId }}"
                data-preview="#{{ $previewId }}" accept="image/*">

            <!-- Hidden input to track if the current image was deleted before saving -->
            <input type="hidden" name="is_{{ $name }}_deleted" class="fileinput-deleted-flag" value="0">

            <strong id="{{ $errorElementId }}" class="text-danger small d-block mt-1 fileinput-error"></strong>
        </div>
    </div>
</div>
