<html lang="en" data-theme="dark" data-layout-mode="fluid" data-menu-color="dark" data-topbar-color="light"
    data-layout-position="fixed" data-sidenav-size="default" class="menuitem-active sidebar-enable">

<head>
    <meta charset="utf-8">
    <title>Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="{{ asset('css/layout/daterangepicker.css') }}">

    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('css/layout/jquery-jvectormap-1.2.2.css') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('js/layout/hyper-config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('css/layout/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style">

    <!-- Icons css -->
    <link href="{{ asset('css/layout/icons.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/layout/main-style.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="show">
    <!-- Begin page -->
    <div class="wrapper">


        <!-- ========== Topbar Start ========== -->
        @include('layout.topbar')
        <!-- ========== Topbar End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('layout.sidebar')
        <!-- ========== Left Sidebar End ========== -->


        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            @yield('content')
            <!-- content -->

            <!-- Footer Start -->
            @include('layout.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->

    <!-- Vendor js -->
    <script src="{{ asset('js/layout/vendor.min.js') }}"></script>

    <!-- Daterangepicker js -->
    <script src="{{ asset('js/layout/moment.min.js') }}"></script>
    <script src="{{ asset('js/layout/daterangepicker.js') }}"></script>

    <!-- Apex Charts js -->
    <script src="{{ asset('js/layout/apexcharts.min.js') }}"></script>

    <!-- Vector Map js -->
    <script src="{{ asset('js/layout/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('js/layout/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- Dashboard App js -->
    <script src="{{ asset('js/layout/demo.dashboard.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('js/layout/app.min.js') }}"></script>


    <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
    </svg>
    <div class="daterangepicker ltr single opensright">
        <div class="ranges"></div>
        <div class="drp-calendar left single" style="display: block;">
            <div class="calendar-table"></div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-calendar right" style="display: none;">
            <div class="calendar-table"></div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default"
                type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled"
                type="button">Apply</button> </div>
    </div>
    <div class="jvectormap-label"></div>
</body>

</html>
