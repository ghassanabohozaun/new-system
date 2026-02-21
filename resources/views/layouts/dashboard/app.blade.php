<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{!! __('dashboard.dashboard') !!} | @yield('title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preload" href="{!! asset('assets/vendors/simple-line-icons/fonts/Simple-Line-Icons.woff2?v=2.4.0') !!}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{!! asset('assets/vendors/feather/fonts/feather-webfont.woff') !!}" as="font" type="font/woff" crossorigin>
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
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <link rel="stylesheet" href="{!! asset('assets') !!}/vendors/bootstrap-rtl/bootstrap.rtl.min.css">
    @endif
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{!! asset('assets') !!}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets') !!}/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{!! asset('assets') !!}/css/style.css">
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <link rel="stylesheet" href="{!! asset('assets') !!}/css/rtl-overrides.css">
    @endif
    <link rel="stylesheet" href="{!! asset('assets') !!}/css/tajawal.css">
    <!-- endinject -->
    <link rel="stylesheet" href="{!! asset('vendor/flasher/flasher.min.css') !!}" rel="stylesheet">
    <link rel="shortcut icon" href="{!! asset('assets') !!}/images/favicon.png" />
    @stack('css')
</head>

<body class="with-welcome-text {{ LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? 'rtl' : '' }}">
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
    <script src="{!! asset('assets') !!}/js/settings.js"></script>
    <script src="{!! asset('assets') !!}/js/hoverable-collapse.js"></script>
    <script src="{!! asset('assets') !!}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{!! asset('assets') !!}/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="{!! asset('assets') !!}/js/dashboard.js"></script>
    <!-- <script src="{!! asset('assets') !!}/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
    <script src="{!! asset('assets') !!}/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="{!! asset('vendor/flasher/flasher.min.js') !!}" type="text/javascript"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.delete-confirm', function(e) {
            e.preventDefault();
            const button = $(this);
            const id = button.data("id");
            const route = button.data("route");
            const title = button.data("title") || "{!! __('general.ask_delete_record') !!}";
            const text = button.data("text") || "{!! __('general.delete_warning_text') !!}";

            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{!! __('general.yes_delete_it') !!}",
                cancelButtonText: "{!! __('general.no_cancel') !!}",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: route,
                        data: {
                            id: id,
                        },
                        success: function(data) {
                            if (data.status) {
                                Swal.fire({
                                    title: "{!! __('general.deleted') !!}",
                                    text: "{!! __('general.delete_success_message') !!}",
                                    icon: 'success'
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: "{!! __('general.error') !!}",
                                    text: "{!! __('general.delete_error_message') !!}",
                                    icon: 'error'
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: "{!! __('general.error') !!}",
                                text: "{!! __('general.delete_error_message') !!}",
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
