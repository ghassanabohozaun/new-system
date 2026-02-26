@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">

                {{-- Breadcrumb --}}
                <div class="d-md-flex align-items-center justify-content-between border-bottom mb-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard.index') }}">{!! __('dashboard.dashboard') !!}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{!! __('settings.settings') !!}</li>
                        </ol>
                    </nav>
                    {{-- Page title + save button --}}




                    <div class="btn-wrapper mt-3 mt-sm-0">
                        <button type="submit" form="settings_form" class="btn btn-primary text-white me-0">
                            <i class="ti-save small mx-0"></i> {{ __('general.save') }}
                        </button>
                    </div>





                </div>

                <form id="settings_form" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id='id' name="id" value="{!! setting()->id !!}">

                    <div class="row g-4">

                        {{-- ===== Section 1: Basic Info ===== --}}
                        <div class="col-12">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white border-bottom d-flex align-items-center gap-2 py-3">
                                    <span class="settings-section-icon bg-primary-subtle text-primary rounded-2 p-2">
                                        <i class="mdi mdi-web fs-5"></i>
                                    </span>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ __('settings.basic_settings_section') }}</h6>
                                        <small class="text-muted">{{ __('settings.site_name_ar') }} /
                                            {{ __('settings.site_name_en') }}</small>
                                    </div>
                                </div>
                                <div class="card-body py-3">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="site_name_ar" class="form-label">{!! __('settings.site_name_ar') !!}</label>
                                            <input type="text" id="site_name_ar" name="site_name[ar]"
                                                value="{!! old('site_name.ar', setting()->getTranslation('site_name', 'ar')) !!}" class="form-control form-control-sm"
                                                autocomplete="off" placeholder="{!! __('settings.enter_site_name_ar') !!}">
                                            <strong id="site_name_ar_error" class="text-danger small"></strong>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="site_name_en" class="form-label">{!! __('settings.site_name_en') !!}</label>
                                            <input type="text" id="site_name_en" name="site_name[en]"
                                                value="{!! old('site_name.en', setting()->getTranslation('site_name', 'en')) !!}" class="form-control form-control-sm"
                                                autocomplete="off" placeholder="{!! __('settings.enter_site_name_en') !!}">
                                            <strong id="site_name_en_error" class="text-danger small"></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ===== Section 2: Social Media ===== --}}
                        <div class="col-12">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white border-bottom d-flex align-items-center gap-2 py-3">
                                    <span class="settings-section-icon bg-info-subtle text-info rounded-2 p-2">
                                        <i class="mdi mdi-share-variant fs-5"></i>
                                    </span>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">
                                            {{ __('settings.social_media_section') ?? __('settings.facebook') . ' / ' . __('settings.twitter') }}
                                        </h6>
                                        <small class="text-muted">Facebook · X (Twitter) · Instagram · YouTube</small>
                                    </div>
                                </div>
                                <div class="card-body py-3">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="facebook" class="form-label">
                                                <i class="mdi mdi-facebook text-primary me-1"></i>{!! __('settings.facebook') !!}
                                            </label>
                                            <input type="text" id="facebook" name="facebook"
                                                value="{!! old('facebook', setting()->facebook) !!}" class="form-control form-control-sm"
                                                autocomplete="off" placeholder="{!! __('settings.enter_facebook') !!}">
                                            <strong id="facebook_error" class="text-danger small"></strong>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="twitter" class="form-label">
                                                <i class="mdi mdi-twitter text-info me-1"></i>{!! __('settings.twitter') !!}
                                            </label>
                                            <input type="text" id="twitter" name="twitter"
                                                value="{!! old('twitter', setting()->twitter) !!}" class="form-control form-control-sm"
                                                autocomplete="off" placeholder="{!! __('settings.enter_twitter') !!}">
                                            <strong id="twitter_error" class="text-danger small"></strong>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="instegram" class="form-label">
                                                <i class="mdi mdi-instagram text-danger me-1"></i>{!! __('settings.instegram') !!}
                                            </label>
                                            <input type="text" id="instegram" name="instegram"
                                                value="{!! old('instegram', setting()->instegram) !!}" class="form-control form-control-sm"
                                                autocomplete="off" placeholder="{!! __('settings.enter_instegram') !!}">
                                            <strong id="instegram_error" class="text-danger small"></strong>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="youtube" class="form-label">
                                                <i class="mdi mdi-youtube text-danger me-1"></i>{!! __('settings.youtube') !!}
                                            </label>
                                            <input type="text" id="youtube" name="youtube"
                                                value="{!! old('youtube', setting()->youtube) !!}" class="form-control form-control-sm"
                                                autocomplete="off" placeholder="{!! __('settings.enter_youtube') !!}">
                                            <strong id="youtube_error" class="text-danger small"></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ===== Section 3: Contact ===== --}}
                        <div class="col-12">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white border-bottom d-flex align-items-center gap-2 py-3">
                                    <span class="settings-section-icon bg-success-subtle text-success rounded-2 p-2">
                                        <i class="mdi mdi-phone-outline fs-5"></i>
                                    </span>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ __('settings.contact_section') }}</h6>
                                        <small class="text-muted">{{ __('settings.phone') }} ·
                                            {{ __('settings.email') }}</small>
                                    </div>
                                </div>
                                <div class="card-body py-3">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="phone" class="form-label">
                                                <i class="mdi mdi-phone me-1 text-muted"></i>{!! __('settings.phone') !!}
                                            </label>
                                            <input type="text" id="phone" name="phone"
                                                value="{!! old('phone', setting()->phone) !!}" class="form-control form-control-sm"
                                                autocomplete="off" placeholder="{!! __('settings.enter_phone') !!}">
                                            <strong id="phone_error" class="text-danger small"></strong>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="mobile" class="form-label">
                                                <i class="mdi mdi-cellphone me-1 text-muted"></i>{!! __('settings.mobile') !!}
                                            </label>
                                            <input type="text" id="mobile" name="mobile"
                                                value="{!! old('mobile', setting()->mobile) !!}" class="form-control form-control-sm"
                                                autocomplete="off" placeholder="{!! __('settings.enter_mobile') !!}">
                                            <strong id="mobile_error" class="text-danger small"></strong>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="whatsapp" class="form-label">
                                                <i class="mdi mdi-whatsapp me-1 text-success"></i>{!! __('settings.whatsapp') !!}
                                            </label>
                                            <input type="text" id="whatsapp" name="whatsapp"
                                                value="{!! old('whatsapp', setting()->whatsapp) !!}" class="form-control form-control-sm"
                                                autocomplete="off" placeholder="{!! __('settings.enter_whatsapp') !!}">
                                            <strong id="whatsapp_error" class="text-danger small"></strong>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">
                                                <i
                                                    class="mdi mdi-email-outline me-1 text-muted"></i>{!! __('settings.email') !!}
                                            </label>
                                            <input type="text" id="email" name="email"
                                                value="{!! old('email', setting()->email) !!}" class="form-control form-control-sm"
                                                autocomplete="off" placeholder="{!! __('settings.enter_email') !!}">
                                            <strong id="email_error" class="text-danger small"></strong>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email_support" class="form-label">
                                                <i class="mdi mdi-face-agent me-1 text-muted"></i>{!! __('settings.email_support') !!}
                                            </label>
                                            <input type="text" id="email_support" name="email_support"
                                                value="{!! old('email_support', setting()->email_support) !!}" class="form-control form-control-sm"
                                                autocomplete="off" placeholder="{!! __('settings.enter_email_support') !!}">
                                            <strong id="email_support_error" class="text-danger small"></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ===== Section 4: Media (Image upload - UNCHANGED) ===== --}}
                        <div class="col-12">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white border-bottom d-flex align-items-center gap-2 py-3">
                                    <span class="settings-section-icon bg-warning-subtle text-warning rounded-2 p-2">
                                        <i class="mdi mdi-image-multiple-outline fs-5"></i>
                                    </span>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ __('settings.media_section') }}</h6>
                                        <small class="text-muted">{{ __('settings.logo') }} ·
                                            {{ __('settings.favicon') }}</small>
                                    </div>
                                </div>
                                <div class="card-body py-3">
                                    <div class="row g-4">
                                        <!-- Logo Section -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label text-dark fw-bold"><i
                                                        class="mdi mdi-image-filter-hdr me-1 text-primary"></i>{!! __('settings.logo') !!}</label>
                                                <div
                                                    class="slider-upload-card d-flex align-items-stretch gap-3 border rounded-3 p-3">
                                                    <!-- Preview -->
                                                    <div id="logo_preview"
                                                        class="slider-thumb-preview rounded-3 overflow-hidden border flex-shrink-0 bg-white d-flex align-items-center justify-content-center"
                                                        style="width:120px; height:80px;">
                                                        @if (setting()->logo)
                                                            <img src="{!! asset('uploads/settings/' . setting()->logo) !!}"
                                                                style="width:100%;height:100%;object-fit:contain;">
                                                        @else
                                                            <div class="text-center text-muted"><i
                                                                    class="mdi mdi-image-outline"
                                                                    style="font-size:2rem; opacity:0.3;"></i></div>
                                                        @endif
                                                    </div>
                                                    <!-- Input -->
                                                    <div class="d-flex flex-column justify-content-center flex-grow-1">
                                                        <div class="mb-1 text-muted small"><i
                                                                class="mdi mdi-cloud-upload-outline me-1"></i>{!! __('sliders.click_to_upload') !!}
                                                        </div>
                                                        <input type="file" name="logo" id="logo_input"
                                                            class="form-control form-control-sm" accept="image/*">
                                                        <strong id="logo_error"
                                                            class="text-danger small d-block mt-1"></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Favicon Section -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label text-dark fw-bold"><i
                                                        class="mdi mdi-star-circle me-1 text-primary"></i>{!! __('settings.favicon') !!}</label>
                                                <div
                                                    class="slider-upload-card d-flex align-items-stretch gap-3 border rounded-3 p-3">
                                                    <!-- Preview -->
                                                    <div id="favicon_preview"
                                                        class="slider-thumb-preview rounded-3 overflow-hidden border flex-shrink-0 bg-white d-flex align-items-center justify-content-center"
                                                        style="width:80px; height:80px;">
                                                        @if (setting()->favicon)
                                                            <img src="{!! asset('uploads/settings/' . setting()->favicon) !!}"
                                                                style="width:100%;height:100%;object-fit:contain;">
                                                        @else
                                                            <div class="text-center text-muted"><i
                                                                    class="mdi mdi-star-outline"
                                                                    style="font-size:2rem; opacity:0.3;"></i></div>
                                                        @endif
                                                    </div>
                                                    <!-- Input -->
                                                    <div class="d-flex flex-column justify-content-center flex-grow-1">
                                                        <div class="mb-1 text-muted small"><i
                                                                class="mdi mdi-cloud-upload-outline me-1"></i>{!! __('sliders.click_to_upload') !!}
                                                        </div>
                                                        <input type="file" name="favicon" id="favicon_input"
                                                            class="form-control form-control-sm" accept="image/*">
                                                        <strong id="favicon_error"
                                                            class="text-danger small d-block mt-1"></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>{{-- end row --}}
                </form>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        // Real-time preview for Logo
        $('#logo_input').on('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#logo_preview').html('<img src="' + e.target.result +
                        '" style="width:100%;height:100%;object-fit:contain;">');
                }
                reader.readAsDataURL(file);
            }
        });

        // Real-time preview for Favicon
        $('#favicon_input').on('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#favicon_preview').html('<img src="' + e.target.result +
                        '" style="width:100%;height:100%;object-fit:contain;">');
                }
                reader.readAsDataURL(file);
            }
        });

        window.handleFormSubmit('#settings_form', {
            url: function(form) {
                const settings_id = $("#id").val();
                return "{!! route('dashboard.settings.update', 'id') !!}".replace('id', settings_id);
            },
            successMessage: "{!! __('general.update_success_message') !!}",
            resetForm: false,
            onSuccess: function(data) {
                // Sync Top Navbar Logos
                if (data.data.logo) {
                    var logoUrl = "{{ asset('uploads/settings') }}/" + data.data.logo;
                    $('#navbar_brand_logo').attr('src', logoUrl);
                }
                if (data.data.favicon) {
                    var faviconUrl = "{{ asset('uploads/settings') }}/" + data.data.favicon;
                    $('#navbar_brand_logo_mini').attr('src', faviconUrl);
                }
            }
        });
    </script>
@endpush
