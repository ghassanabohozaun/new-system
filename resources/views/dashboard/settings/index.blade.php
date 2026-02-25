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

                                        <div class="row">
                                            <!-- Logo Section -->
                                            <div class="col-md-6">
                                                <div class="form-group mb-2">
                                                    <label for="logo">{!! __('settings.logo') !!}</label>
                                                    <input type="file" name="logo" id="logo_input"
                                                        class="form-control form-control-sm" accept="image/*">
                                                    <strong id="logo_error" class="text-danger small"></strong>
                                                </div>
                                                <div class="{{ Lang() == 'ar' ? 'text-right' : 'text-left' }} mb-3">
                                                    <img id="logo_preview" src="{!! setting()->logo ? asset('uploads/settings/' . setting()->logo) : '' !!}"
                                                        alt="Logo Preview" class="img-thumbnail {!! setting()->logo ? '' : 'd-none' !!}"
                                                        style="max-height: 150px; width: auto; min-width: 100px;">
                                                </div>
                                            </div>

                                            <!-- Favicon Section -->
                                            <div class="col-md-6">
                                                <div class="form-group mb-2">
                                                    <label for="favicon">{!! __('settings.favicon') !!}</label>
                                                    <input type="file" name="favicon" id="favicon_input"
                                                        class="form-control form-control-sm" accept="image/*">
                                                    <strong id="favicon_error" class="text-danger small"></strong>
                                                </div>
                                                <div class="{{ Lang() == 'ar' ? 'text-right' : 'text-left' }} mb-3">
                                                    <img id="favicon_preview" src="{!! setting()->favicon ? asset('uploads/settings/' . setting()->favicon) : '' !!}"
                                                        alt="Favicon Preview"
                                                        class="img-thumbnail {!! setting()->favicon ? '' : 'd-none' !!}"
                                                        style="max-height: 150px; width: auto; min-width: 100px;">
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
        // Reset errors
        function clearErrors() {
            $('#settings_form input').removeClass('is-invalid');
            $('#settings_form strong.text-danger').text('');
        }

        // Real-time preview for Logo
        $('#logo_input').on('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#logo_preview').attr('src', e.target.result).removeClass('d-none');
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
                    $('#favicon_preview').attr('src', e.target.result).removeClass('d-none');
                }
                reader.readAsDataURL(file);
            }
        });

        // Update settings via AJAX
        $('#settings_form').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            const settings_id = $("#id").val();
            const data = new FormData(this);
            const url = "{!! route('dashboard.settings.update', 'id') !!}".replace('id', settings_id);

            $.ajax({
                url: url,
                data: data,
                type: 'POST', // Will be handled as PUT by @method('PUT')
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    clearErrors();
                    $('.spinner_loading').removeClass('d-none');
                },
                success: function(data) {
                    if (data.status) {
                        flasher.success("{!! __('general.update_success_message') !!}");

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
                },
                error: function(xhr) {
                    const errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        const field = key.replace(/\./g, '_');
                        $(`#${field}`).addClass('is-invalid');
                        $(`#${field}_error`).text(value[0]);
                    });
                },
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }
            });
        });
    </script>
@endpush
