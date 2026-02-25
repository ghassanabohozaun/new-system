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
    <a href="{{ LaravelLocalization::getLocalizedURL($targetLocale, null, [], true) }}" class="btn btn-primary btn-sm"
        id="login-rtl-toggle">
        {{ $targetNative }}
    </a>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                @if (setting()->logo)
                                    <img src="{{ asset('uploads/settings/' . setting()->logo) }}" alt="logo">
                                @else
                                    <img src="{{ asset('assets/dashboard/images/logo.svg') }}" alt="logo">
                                @endif
                            </div>
                            <h4>{!! __('auth.verify_otp') !!}</h4>
                            <h6 class="fw-light">{!! __('auth.enter_otp_code_sent_to_email') !!}</h6>

                            @if ($errors->has('error'))
                                <div class="alert alert-danger mt-3">
                                    {!! $errors->first('error') !!}
                                </div>
                            @endif

                            <form class="pt-3" action="{!! route('dashboard.password.post.verify') !!}" method="post">
                                @csrf
                                <input type="hidden" name="email" value="{{ $email }}">
                                <div class="form-group">
                                    <input type="text" name="code" class="form-control form-control-lg text-center"
                                        id="otpCode" placeholder="######" maxlength="6" autocomplete="off" required>
                                    <div class="help-block font-small-3">
                                        @error('code')
                                            <strong class="text-danger"> {!! $message !!} </strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">
                                        {!! __('auth.verify') !!}
                                    </button>
                                </div>
                                <div class="text-center mt-4 fw-light">
                                    <a href="{{ route('dashboard.password.get.email') }}"
                                        class="text-primary">{!! __('auth.resend_otp') !!}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
