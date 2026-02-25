<!DOCTYPE html>
<html lang="{{ Lang() }}" dir="{{ Lang() == 'ar' ? 'rtl' : 'ltr' }}">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{!! asset('assets/website/css/bootstrap.rtl.min.css') !!}">
    @else
        <link rel="stylesheet" href="{!! asset('assets/website/css/bootstrap.min.css') !!}">
    @endif
    <link rel="stylesheet" href="{!! asset('assets/website/css/fonts.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/website/css/bootstrap-icons.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/website/css/swiper-bundle.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/website/css/style.css') !!}">
    <link rel="shortcut icon" href="{!! setting()->favicon
        ? asset('uploads/settings/' . setting()->favicon)
        : asset('assets/website/images/logo-mini.png') !!}" />

    @stack('css')
</head>

<body class="bg-light">

    @include('layouts.website.parts._preloader')
    @include('layouts.website.parts._scroll-progress-bar')


    <div class="container-fluid bg-white p-0">
        <div class="row justify-content-center m-0">
            <div class="col-12 col-lg-10 p-0 position-relative shadow-sm">
                @include('layouts.website.parts._navbar')
                @yield('content')
                @include('layouts.website.parts._newsletter-section-index')
                @include('layouts.website.parts._footer')
            </div>
        </div>
    </div>

    @include('layouts.website.parts._scroll-top')
    @include('layouts.website.modals.currency-modal')

    <script src="{!! asset('assets/website/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('assets/website/js/swiper-bundle.min.js') !!}"></script>
    <script src="{!! asset('assets/website/js/script.js') !!}"></script>

    @stack('js')
</body>

</html>
