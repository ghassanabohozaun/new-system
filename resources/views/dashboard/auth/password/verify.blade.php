@extends('layouts.dashboard.auth')
@section('title')
    {!! __('auth.verify_otp') !!}
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
                <h2 class="enterprise-user-name text-center mb-2" style="font-size: 1.5rem;">{!! __('auth.verify_otp') !!}</h2>
                <p class="text-muted small text-center mb-4" style="color: #94a3b8 !important;">{!! __('auth.enter_otp_code_sent_to_email') !!}</p>

                @if ($errors->has('error'))
                    <div class="alert alert-danger mt-3"
                        style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #ef4444; border-radius: 12px;">
                        {!! $errors->first('error') !!}
                    </div>
                @endif

                <form class="pt-3 text-start enterprise-form" action="{!! route('dashboard.password.post.verify') !!}" method="post">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">

                    <div class="form-group mb-4 theme-primary">
                        <div class="input-group-premium @error('code') is-invalid @enderror"
                            style="background: rgba(255, 255, 255, 0.05) !important;">
                            <input type="text" name="code" class="form-control text-center text-white fw-bold"
                                id="otpCode" placeholder="######" maxlength="6" autocomplete="off" required
                                style="font-size: 2rem !important; letter-spacing: 0.5rem; height: 70px;">
                        </div>
                        @error('code')
                            <strong class="text-danger small mt-2 d-block text-center"> {!! $message !!} </strong>
                        @enderror
                    </div>

                    <div class="mt-4 d-grid gap-2">
                        <button type="submit" class="enterprise-unlock-btn" style="padding: 14px !important;">
                            <i class="mdi mdi-shield-check-outline btn-animated-icon"></i>
                            {!! __('auth.verify') !!}
                        </button>
                    </div>

                    <div class="enterprise-footer-links mt-4">
                        <a href="{{ route('dashboard.password.get.email') }}" class="enterprise-link fw-bold small"><i
                                class="mdi mdi-refresh me-1"></i> {!! __('auth.resend_otp') !!}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
