@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <!--------------------  Start Breadcrumb  ---------------------------->
                    <div class="d-md-flex align-items-center justify-content-between border-bottom mb-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.index') }}">{!! __('dashboard.dashboard') !!}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{!! __('settings.settings') !!}</li>
                            </ol>
                        </nav>
                    </div>
                    <!--------------------  End Breadcrumb  ---------------------------->

                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('settings.settings') }}</h4>
                                    <p class="card-description">
                                        {{ __('settings.basic_settings_section') }}
                                    </p>
                                    <form class="forms-sample" id="settings_form" action="" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" id='id' name="id" value="{!! setting()->id !!}">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="site_name_ar">{!! __('settings.site_name_ar') !!}</label>
                                                    <input type="text" id="site_name_ar" name="site_name[ar]"
                                                        value="{!! old('site_name.ar', setting()->getTranslation('site_name', 'ar')) !!}" class="form-control form-control-sm"
                                                        autocomplete="off" placeholder="{!! __('settings.enter_site_name_ar') !!}">
                                                    <strong id="site_name_ar_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="site_name_en">{!! __('settings.site_name_en') !!}</label>
                                                    <input type="text" id="site_name_en" name="site_name[en]"
                                                        value="{!! old('site_name.en', setting()->getTranslation('site_name', 'en')) !!}" class="form-control form-control-sm"
                                                        autocomplete="off" placeholder="{!! __('settings.enter_site_name_en') !!}">
                                                    <strong id="site_name_en_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="facebook">{!! __('settings.facebook') !!}</label>
                                                    <input type="text" id="facebook" name="facebook"
                                                        value="{!! old('facebook', setting()->facebook) !!}"
                                                        class="form-control form-control-sm" autocomplete="off"
                                                        placeholder="{!! __('settings.enter_facebook') !!}">
                                                    <strong id="facebook_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="twitter">{!! __('settings.twitter') !!}</label>
                                                    <input type="text" id="twitter" name="twitter"
                                                        value="{!! old('twitter', setting()->twitter) !!}"
                                                        class="form-control form-control-sm" autocomplete="off"
                                                        placeholder="{!! __('settings.enter_twitter') !!}">
                                                    <strong id="twitter_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="instegram">{!! __('settings.instegram') !!}</label>
                                                    <input type="text" id="instegram" name="instegram"
                                                        value="{!! old('instegram', setting()->instegram) !!}"
                                                        class="form-control form-control-sm" autocomplete="off"
                                                        placeholder="{!! __('settings.enter_instegram') !!}">
                                                    <strong id="instegram_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="youtube">{!! __('settings.youtube') !!}</label>
                                                    <input type="text" id="youtube" name="youtube"
                                                        value="{!! old('youtube', setting()->youtube) !!}"
                                                        class="form-control form-control-sm" autocomplete="off"
                                                        placeholder="{!! __('settings.enter_youtube') !!}">
                                                    <strong id="youtube_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <p class="card-description">
                                            {{ __('settings.contact_section') }}
                                        </p>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="phone">{!! __('settings.phone') !!}</label>
                                                    <input type="text" id="phone" name="phone"
                                                        value="{!! old('phone', setting()->phone) !!}"
                                                        class="form-control form-control-sm" autocomplete="off"
                                                        placeholder="{!! __('settings.enter_phone') !!}">
                                                    <strong id="phone_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="mobile">{!! __('settings.mobile') !!}</label>
                                                    <input type="text" id="mobile" name="mobile"
                                                        value="{!! old('mobile', setting()->mobile) !!}"
                                                        class="form-control form-control-sm" autocomplete="off"
                                                        placeholder="{!! __('settings.enter_mobile') !!}">
                                                    <strong id="mobile_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="whatsapp">{!! __('settings.whatsapp') !!}</label>
                                                    <input type="text" id="whatsapp" name="whatsapp"
                                                        value="{!! old('whatsapp', setting()->whatsapp) !!}"
                                                        class="form-control form-control-sm" autocomplete="off"
                                                        placeholder="{!! __('settings.enter_whatsapp') !!}">
                                                    <strong id="whatsapp_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">{!! __('settings.email') !!}</label>
                                                    <input type="text" id="email" name="email"
                                                        value="{!! old('email', setting()->email) !!}"
                                                        class="form-control form-control-sm" autocomplete="off"
                                                        placeholder="{!! __('settings.enter_email') !!}">
                                                    <strong id="email_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email_support">{!! __('settings.email_support') !!}</label>
                                                    <input type="text" id="email_support" name="email_support"
                                                        value="{!! old('email_support', setting()->email_support) !!}"
                                                        class="form-control form-control-sm" autocomplete="off"
                                                        placeholder="{!! __('settings.enter_email_support') !!}">
                                                    <strong id="email_support_error" class="text-danger small"></strong>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <p class="card-description">
                                            {{ __('settings.media_section') }}
                                        </p>

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

                                        <button type="submit" class="btn btn-primary me-2 text-white">
                                            <i class="ti-save me-1"></i> {{ __('general.save') }}
                                            <span class="spinner-border spinner-border-sm d-none spinner_loading"
                                                role="status" aria-hidden="true"></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
