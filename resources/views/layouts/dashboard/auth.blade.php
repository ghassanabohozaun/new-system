<!DOCTYPE html>
<html lang="{{ Lang() }}" dir="{{ Lang() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="PIXINVENT">
    <meta charset="utf-8">
    <title> {!! __('dashboard.dashboard') !!} | @yield('title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/tajawal.css') }}">
    <link rel="stylesheet" href="{!! asset('vendor/flasher/flasher.min.css') !!}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/dashboard/images/favicon.png') }}" />
    <style>
        #login-rtl-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 999;
        }

        [dir="rtl"] #login-rtl-toggle {
            right: auto;
            left: 20px;
        }
    </style>
</head>

<body class="{{ Lang() == 'ar' ? 'rtl' : '' }}">


    @yield('content')

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/dashboard/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/dashboard/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/template.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/settings.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/todolist.js') }}"></script>
    <!-- endinject -->

    <script src="{!! asset('vendor/flasher/flasher.min.js') !!}" type="text/javascript"></script>

    @stack('scripts')
</body>

</html>
