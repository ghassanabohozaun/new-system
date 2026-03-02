@extends('layouts.dashboard.auth')
@section('title')
    {!! __('dashboard.login') !!}
@endsection
@section('content')
    @php
        $currentLocale = Lang();
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
                        <img src="{!! asset('uploads/settings/' . setting()->logo) !!}" alt="logo"
                            style="width: 160px; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));">
                    @else
                        <img src="{{ asset('assets/dashboard/images/logo.svg') }}" alt="logo"
                            style="width: 160px; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));">
                    @endif
                </div>

                <h2 class="enterprise-user-name text-center mb-2" style="font-size: 1.5rem;">{!! __('auth.welcome_back') !!}</h2>
                <p class="text-muted small text-center mb-4" style="color: #94a3b8 !important;">{!! __('auth.sign_in_to_continue') !!}</p>

                @if (session('success'))
                    <div class="alert alert-success mt-2"
                        style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2); color: #10b981; border-radius: 12px;">
                        {{ session('success') }}
                    </div>
                @endif

                <form id="loginForm" action="{!! route('dashboard.post.login') !!}" method="post" novalidate
                    class="enterprise-form text-start">
                    @csrf
                    <div class="form-group mb-3 theme-primary">
                        <label class="form-label-premium text-white">{!! __('auth.email') !!}</label>
                        <div class="input-group-premium @error('email') is-invalid @enderror">
                            <span class="input-group-text"><i class="mdi mdi-email-outline text-white"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="{!! __('auth.enter_email') !!}"
                                autocomplete="off" value="{{ old('email') }}">
                            <span class="error-icon"><i class="mdi mdi-alert-circle-outline"></i></span>
                        </div>
                        @error('email')
                            <strong class="text-danger small mt-1 d-block"> {!! $message !!} </strong>
                        @enderror
                    </div>

                    <div class="form-group mb-4 theme-primary">
                        <label class="form-label-premium text-white">{!! __('auth.password') !!}</label>
                        <div class="input-group-premium @error('password') is-invalid @enderror">
                            <span class="input-group-text"><i class="mdi mdi-lock-outline text-white"></i></span>
                            <input type="password" name="password" class="form-control"
                                placeholder="{!! __('auth.enter_password') !!}" autocomplete="new-password">
                            <span class="error-icon"><i class="mdi mdi-alert-circle-outline"></i></span>
                            <button type="button" class="password-toggle-btn js-password-toggle">
                                <i class="mdi mdi-eye-outline text-muted"></i>
                            </button>
                        </div>
                        @error('password')
                            <strong class="text-danger small mt-1 d-block"> {!! $message !!} </strong>
                        @enderror
                    </div>

                    <div class="my-3 d-flex justify-content-between align-items-center">
                        <div class="form-check m-0">
                            <label class="form-check-label text-muted small" style="color: #94a3b8 !important;">
                                <input type="checkbox" name="remmber" class="form-check-input">
                                {!! __('auth.remmber_me') !!}
                            </label>
                        </div>
                        <a href="{{ route('dashboard.password.get.email') }}"
                            class="enterprise-link fw-bold p-0">{!! __('auth.forget_password') !!}</a>
                    </div>

                    <div class="mt-4 d-grid gap-2">
                        <button type="submit" class="enterprise-unlock-btn" style="padding: 14px !important;">
                            <i class="mdi mdi-login-variant btn-animated-icon"></i>
                            {!! __('auth.login') !!}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
