@extends('layouts.dashboard.auth')
@section('title')
    {!! __('dashboard.look_screen') !!}
@endsection
@section('content')
    @php
        $currentLocale = Lang();
        $targetLocale = $currentLocale == 'ar' ? 'en' : 'ar';
        $targetNative = LaravelLocalization::getSupportedLocales()[$targetLocale]['native'];
    @endphp
    <a href="{{ LaravelLocalization::getLocalizedURL($targetLocale, null, [], true) }}" class="btn btn-primary btn-sm"
        id="login-rtl-toggle">
        {{ $targetNative }}
    </a>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth"
                style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{!! asset('assets/dashboard/images/auth/lockscreen-bg.jpg') !!}'); background-size: cover; background-position: center;">
                <div class="row w-100 flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-transparent text-left p-5 text-center">
                            @php
                                $user = admin()->user();
                                $userPhoto =
                                    $user && $user->photo
                                        ? asset('uploads/adminsPhotos/' . $user->photo)
                                        : asset('assets/dashboard/images/faces/avatar-male.jpg');
                            @endphp
                            <img src="{{ $userPhoto }}" class="lock-profile-img mb-4 rounded-circle" alt="img"
                                width="100">
                            <form class="pt-5" id="lock-form" method="POST">
                                @csrf
                                <div class="form-group text-white">
                                    <label for="lock-password">{!! __('auth.password_to_unlock') !!}</label>
                                    <input type="password" class="form-control text-center text-white" id="lock-password"
                                        placeholder="{!! __('auth.password') !!}" autocomplete="new-password" required>
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit" class="btn btn-block btn-success btn-lg fw-medium auth-form-btn">
                                        {!! __('auth.unlock') !!}
                                    </button>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="{{ route('dashboard.get.login') }}" class="auth-link text-white">
                                        {!! __('auth.sign_in_different_account') !!}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
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
@endpush
