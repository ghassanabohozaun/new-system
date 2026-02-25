<!DOCTYPE html>
<html lang="{{ Lang() }}" dir="{{ Lang() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{!! __('dashboard.dashboard') !!} | @yield('title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preload" href="{!! asset('assets/dashboard/vendors/simple-line-icons/fonts/Simple-Line-Icons.woff2?v=2.4.0') !!}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{!! asset('assets/dashboard/vendors/feather/fonts/feather-webfont.woff') !!}" as="font" type="font/woff" crossorigin>
    <link rel="stylesheet" href="{!! asset('assets') !!}/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="{!! asset('assets') !!}/css/mystyle.css">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{!! asset('assets') !!}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{!! asset('assets') !!}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{!! asset('assets') !!}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{!! asset('assets') !!}/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{!! asset('assets') !!}/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{!! asset('assets') !!}/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="{!! asset('assets') !!}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{!! asset('assets') !!}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    @if (Lang() == 'ar')
        <link rel="stylesheet" href="{!! asset('assets') !!}/vendors/bootstrap-rtl/bootstrap.rtl.min.css">
    @endif
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{!! asset('assets') !!}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets') !!}/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{!! asset('assets') !!}/css/style.css">
    @if (Lang() == 'ar')
        <link rel="stylesheet" href="{!! asset('assets') !!}/css/rtl-overrides.css">
    @endif
    <link rel="stylesheet" href="{!! asset('assets') !!}/css/tajawal.css">
    <!-- endinject -->
    <link rel="stylesheet" href="{!! asset('vendor/flasher/flasher.min.css') !!}" rel="stylesheet">
    <link rel="shortcut icon" href="{!! setting()->favicon ? asset('uploads/settings/' . setting()->favicon) : asset('assets/dashboard/images/logo-mini.svg') !!}" />
    @stack('css')
</head>

<body class="with-welcome-text {{ Lang() == 'ar' ? 'rtl' : '' }}">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('layouts.dashboard.app-parts._navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('layouts.dashboard.app-parts._sidebar')

            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('layouts.dashboard.app-parts._footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{!! asset('assets') !!}/vendors/js/vendor.bundle.base.js"></script>
    <script src="{!! asset('assets') !!}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{!! asset('assets') !!}/vendors/chart.js/chart.umd.js"></script>
    <script src="{!! asset('assets') !!}/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{!! asset('assets') !!}/js/off-canvas.js"></script>
    <script src="{!! asset('assets') !!}/js/template.js"></script>
    <script src="{!! asset('assets') !!}/js/myscripts.js"></script>
    <script src="{!! asset('assets') !!}/js/lock-screen.js"></script>
    <script src="{!! asset('assets') !!}/js/hoverable-collapse.js"></script>
    <script src="{!! asset('assets') !!}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{!! asset('assets') !!}/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="{!! asset('assets') !!}/js/dashboard.js"></script>

    <script src="{!! asset('assets') !!}/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="{!! asset('vendor/flasher/flasher.min.js') !!}" type="text/javascript"></script>

    <script>
        window.Translations = {
            ask_delete_record: "{!! __('general.ask_delete_record') !!}",
            routes: {
                logout: "{{ route('dashboard.logout') }}",
                lock_screen: "{{ route('dashboard.lock.screen') }}",
                unlock_screen: "{{ route('dashboard.unlock.screen') }}",
                dashboard_index: "{{ route('dashboard.index') }}"
            },
            labels: {
                confirm: "{{ __('general.confirm') }}",
                cancel: "{{ __('general.cancel') }}",
                unlock: "{{ __('auth.unlock') }}"
            },
            messages: {
                delete_confirmation: "{{ __('general.delete_confirmation') }}",
                delete_warning: "{{ __('general.delete_warning') }}",
                error: "{{ __('general.error') }}",
                failed: "{{ __('auth.failed') }}"
            },
            delete_warning_text: "{!! __('general.delete_warning_text') !!}",
            yes_delete_it: "{!! __('general.yes_delete_it') !!}",
            no_cancel: "{!! __('general.no_cancel') !!}",
            deleted: "{!! __('general.deleted') !!}",
            delete_success_message: "{!! __('general.delete_success_message') !!}",
            error: "{!! __('general.error') !!}",
            delete_error_message: "{!! __('general.delete_error_message') !!}"
        };
    </script>
    <script src="{!! asset('assets/dashboard/js/myscripts.js') !!}"></script>
    <script src="{!! asset('assets/dashboard/js/lock-screen.js') !!}"></script>
    @stack('scripts')
</body>

</html>
