@extends('layouts.dashboard.auth')
@section('title')
    {!! __('auth.enter_email') !!}
@endsection
@section('content')
    @php
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $targetLocale = $currentLocale == 'ar' ? 'en' : 'ar';
        $targetNative = LaravelLocalization::getSupportedLocales()[$targetLocale]['native'];
    @endphp
    <a href="{{ LaravelLocalization::getLocalizedURL($targetLocale, null, [], true) }}" class="enterprise-lang-toggle"
        id="login-rtl-toggle">
        <i class="mdi mdi-translate"></i>
        <span>{{ $targetNative }}</span>
    </a>
    <div class="enterprise-lock-wrapper">
        <div class="enterprise-bg-mesh"></div>

        <div class="enterprise-card" style="max-width: 500px;">
            <div class="card-body p-4 p-sm-2">
                <div class="brand-logo text-center mb-4">
                    @if (setting()->logo)
                        <img src="{{ asset('uploads/settings/' . setting()->logo) }}" alt="logo"
                            style="width: 160px; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));">
                    @else
                        <img src="{{ asset('assets/dashboard/images/logo.svg') }}" alt="logo"
                            style="width: 160px; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));">
                    @endif
                </div>
                <h2 class="enterprise-user-name text-center mb-2" style="font-size: 1.5rem;">{!! __('auth.recover_password') !!}</h2>
                <p class="text-muted small text-center mb-4" style="color: #94a3b8 !important;">{!! __('auth.enter_email_to_recover_password') !!}</p>

                @if ($errors->has('error'))
                    <div class="alert alert-danger mt-3"
                        style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #ef4444; border-radius: 12px;">
                        {!! $errors->first('error') !!}
                    </div>
                @endif

                <form class="pt-2 text-start enterprise-form" action="{!! route('dashboard.password.post.email') !!}" method="post" novalidate>
                    @csrf
                    <div class="form-group mb-3 theme-primary">
                        <label class="form-label-premium text-white">{!! __('auth.email') !!}</label>
                        <div class="input-group-premium @error('email') is-invalid @enderror">
                            <span class="input-group-text"><i class="mdi mdi-email-open-outline"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="{!! __('auth.enter_email') !!}"
                                autocomplete="off" value="{{ old('email') }}">
                            <span class="error-icon"><i class="mdi mdi-alert-circle-outline"></i></span>
                        </div>
                        @error('email')
                            <strong class="text-danger small mt-1 d-block"> {!! $message !!} </strong>
                        @enderror
                    </div>

                    <div class="mt-4 d-grid gap-2">
                        <button type="submit" class="enterprise-unlock-btn" style="padding: 14px !important;">
                            <i class="mdi mdi-email-fast-outline btn-animated-icon"></i>
                            {!! __('auth.send_otp') !!}
                        </button>
                    </div>

                    <div class="enterprise-footer-links mt-4">
                        <a href="{{ route('dashboard.get.login') }}" class="enterprise-link fw-bold small"><i
                                class="mdi mdi-arrow-left me-1"></i> {!! __('auth.back_to_login') !!}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
