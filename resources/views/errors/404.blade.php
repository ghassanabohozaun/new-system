<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('errors.404_title') }}</title>

    <!-- Local Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/website/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/fonts.css') }}">

    <!-- Custom 404 Styles -->
    <link rel="stylesheet" href="{{ asset('assets/website/css/404.css') }}">
    <link rel="shortcut icon" href="{!! setting()->favicon
        ? asset('uploads/settings/' . setting()->favicon)
        : asset('assets/website/images/logo-mini.png') !!}" />

    @stack('css')
</head>

<body>

    <div class="flight-stage">
        <div class="radar-sweep"></div>

        <svg class="flight-paths-svg" viewBox="0 0 1200 800" preserveAspectRatio="xMidYMid slice">
            <defs>
                <path id="path1"
                    d="M100,300 C100,100 400,100 400,300 C400,500 700,500 700,300 C700,100 1000,100 1000,300" />
                <path id="path2" d="M-100,600 C200,400 600,800 1200,500" />
            </defs>

            <use href="#path1" class="path-line" />
            <use href="#path2" class="path-line" opacity="0.1" />

            <g class="plane-icon plane-1">
                <path
                    d="M21.5,18.4L12,11l0-6.3c0-0.9-0.7-1.7-1.6-1.7H9.6C8.7,3,8,3.8,8,4.7l0,6.3L-1.5,18.4c-0.4,0.3-0.7,0.8-0.7,1.3 v1.9c0,0.7,0.8,1.2,1.5,0.9l8.6-3.2v6.7l-2.4,1.8c-0.3,0.2-0.4,0.5-0.4,0.8v1.3c0,0.4,0.4,0.8,0.8,0.7l4-0.6 l4,0.6c0.4,0.1,0.8-0.3,0.8-0.7v-1.3c0-0.3-0.2-0.6-0.4-0.8l-2.4-1.8v-6.7l8.6,3.2c0.7,0.3,1.5-0.2,1.5-0.9v-1.9 C22.2,19.2,21.9,18.7,21.5,18.4z"
                    transform="scale(1.5) rotate(90)" />
            </g>

            <g class="plane-icon plane-2" opacity="0.6">
                <path
                    d="M21.5,18.4L12,11l0-6.3c0-0.9-0.7-1.7-1.6-1.7H9.6C8.7,3,8,3.8,8,4.7l0,6.3L-1.5,18.4c-0.4,0.3-0.7,0.8-0.7,1.3 v1.9c0,0.7,0.8,1.2,1.5,0.9l8.6-3.2v6.7l-2.4,1.8c-0.3,0.2-0.4,0.5-0.4,0.8v1.3c0,0.4,0.4,0.8,0.8,0.7l4-0.6 l4,0.6c0.4,0.1,0.8-0.3,0.8-0.7v-1.3c0-0.3-0.2-0.6-0.4-0.8l-2.4-1.8v-6.7l8.6,3.2c0.7,0.3,1.5-0.2,1.5-0.9v-1.9 C22.2,19.2,21.9,18.7,21.5,18.4z"
                    transform="scale(1) rotate(90)" />
            </g>
        </svg>

        <div class="content-vault">
            <div class="nav-404-container">
                <h1 class="nav-404-text">404</h1>
                <div class="coordinates">N 24° 46' 12" E 46° 37' 36"</div>
            </div>
            <span class="nav-status">/// {{ __('errors.diverging_path') }} ///</span>

            <h2 class="error-heading">
                {{ __('errors.lost_contact') }}
            </h2>
            <p class="error-message">
                {{ __('errors.radar_message') }}
            </p>

            <a href="{{ route('website.index') }}" class="btn-flight-action">
                <i class="bi bi-airplane-fill"></i>
                {{ __('errors.return_to_runway') }}
            </a>
        </div>
    </div>

    <!-- Local Scripts -->
    <script src="{{ asset('assets/website/js/404.js') }}"></script>
</body>

</html>
