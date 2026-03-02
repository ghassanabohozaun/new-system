@extends('layouts.dashboard.auth')
@section('title')
    {!! __('dashboard.lock_screen') !!}
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

        <div class="enterprise-card">
            <div class="enterprise-identity">
                @php
                    $user = admin()->user();
                    $userPhoto =
                        $user && $user->photo
                            ? asset('uploads/adminsPhotos/' . $user->photo)
                            : asset('assets/dashboard/images/faces/avatar-male.jpg');
                @endphp
                <div class="enterprise-avatar-wrapper">
                    <img src="{{ $userPhoto }}" class="enterprise-avatar" alt="User Avatar">
                    <div class="security-verified-badge" title="Identity Verified">
                        <i class="mdi mdi-check-decagram"></i>
                    </div>
                </div>
                <h2 class="enterprise-user-name">{{ $user ? $user->getTranslation('name', Lang()) : 'Admin' }}</h2>
            </div>

            <div class="enterprise-status-pill">
                <div class="status-dot"></div>
                <span>{{ __('dashboard.active_session') ?? 'Active Secured Session' }}</span>
            </div>

            <form id="lock-form" action="{{ route('dashboard.unlock.screen') }}" method="POST" novalidate
                class="enterprise-form">
                @csrf
                <div class="input-group-premium" id="password-group">
                    <span class="input-group-text"><i class="mdi mdi-shield-lock-outline"></i></span>
                    <input type="password" name="password" class="form-control" id="lock-password"
                        placeholder="{{ __('auth.password') }}" autocomplete="off">
                    <button type="button" class="password-toggle-btn js-password-toggle">
                        <i class="mdi mdi-eye-outline text-muted"></i>
                    </button>
                </div>
                <div id="lock-error" class="text-danger small mt-1 d-none"></div>

                <button type="submit" id="unlock-btn" class="enterprise-unlock-btn">
                    <i class="mdi mdi-key btn-animated-icon"></i>
                    {{ __('auth.unlock') }}
                </button>

                <div class="enterprise-footer-links">
                    <a href="{{ route('dashboard.get.login') }}" class="enterprise-link">
                        <i class="mdi mdi-account-switch-outline me-1"></i>
                        {{ __('auth.sign_in_different_account') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        window.Translations = {
            routes: {
                lock_screen: "{{ route('dashboard.lock.screen') }}",
                unlock_screen: "{{ route('dashboard.unlock.screen') }}",
                dashboard_index: "{{ route('dashboard.index') }}"
            },
            labels: {
                unlock: "{{ __('auth.unlock') }}"
            },
            messages: {
                error: "{{ __('general.error') }}",
                failed: "{{ __('auth.failed') }}",
                unlock_success: "{{ __('auth.unlock_success') }}"
            }
        };
    </script>
    <script src="{!! asset('assets/dashboard/js/lock-screen.js') !!}"></script>
    <script>
        // Custom handling for Lock Screen error visualization within the premium group
        $(document).ready(function() {
            const form = $('#lock-form');
            form.on('submit', function() {
                // Clear state
                $('.input-group-premium').removeClass('is-invalid');
            });

            // Listen for failure from lock-screen.js logic if it uses DOM classes
            // lock-screen.js typically handles the AJAX. We ensure it plays nice with our premium CSS.
        });
    </script>
@endpush
