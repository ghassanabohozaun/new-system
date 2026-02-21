@extends('layouts.dashboard.auth')
@section('title')
    {!! __('dashboard.login') !!}
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
                                    No LOGO
                                @else
                                    <img src="../../assets/images/logo.svg" alt="logo">
                                @endif

                            </div>
                            <h6 class="fw-light">{!! __('auth.sign_in_to_continue') !!}</h6>
                            @if (session('success'))
                                <div class="alert alert-success mt-2">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form class="pt-3" action="{!! route('dashboard.post.login') !!}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg"
                                        id="exampleInputEmail1" placeholder="{!! __('auth.email') !!}" autocomplete="off">
                                    <div class="help-block font-small-3">
                                        @error('email')
                                            <strong class="text-danger"> {!! $message !!} </strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="{!! __('auth.password') !!}"
                                        autocomplete="new-password">
                                    <div class="help-block font-small-3">
                                        @error('password')
                                            <strong class="text-danger"> {!! $message !!} </strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">{!! __('auth.login') !!}
                                    </button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" name="remmber" class="form-check-input">
                                            {!! __('auth.remmber_me') !!}
                                        </label>
                                    </div>
                                    <a href="{{ route('dashboard.password.get.email') }}"
                                        class="auth-link text-black">{!! __('auth.forget_password') !!}</a>
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
