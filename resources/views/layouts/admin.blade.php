<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - @if (isset($title))
        {{ $title }}
        @else
        {{ config('app.name', 'Admin') }}
        @endif
    </title>

    <!-- App favicon -->
    <link rel="shortcut icon" href={{ asset("assets/admin/images/favicon.ico") }}>

    <!-- Bootstrap Css -->
    <link href={{ asset("assets/admin/css/bootstrap.min.css") }} id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href={{ asset("assets/admin/css/icons.min.css") }} rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href={{ asset("assets/admin/css/app.min.css") }} id="app-style" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href={{ asset("assets/admin/libs/sweetalert2/sweetalert2.min.css") }} rel="stylesheet" type="text/css" />
</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ========== Header Start ========== -->
        @include('layouts.header')
        <!-- Header End -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.sidebar')
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <!-- Start Page-content -->
            {{ $slot }}
            <!-- End Page-content -->

            <!-- ========== Footer Start ========== -->
            @include('layouts.footer')
            <!-- Footer End -->
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src={{ asset("assets/admin/libs/jquery/jquery.min.js") }}></script>
    <script src={{ asset("assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <script src={{ asset("assets/admin/libs/metismenu/metisMenu.min.js") }}></script>
    <script src={{ asset("assets/admin/libs/simplebar/simplebar.min.js") }}></script>
    <script src={{ asset("assets/admin/libs/node-waves/waves.min.js") }}></script>

    <script src={{ asset("assets/admin/libs/apexcharts/apexcharts.min.js") }}></script>

    <!-- Sweet Alerts js -->
    <script src={{ asset("assets/admin/libs/sweetalert2/sweetalert2.min.js")}}></script>

    <!-- Sweet alert init js-->
    <script src={{ asset("assets/admin/js/pages/sweet-alerts.init.js")}}></script>

    <!-- Generate slug js -->
    <script src={{ asset("assets/admin/js/pages/slugify.js")}}></script>

    <!-- App js -->
    <script src={{ asset("assets/admin/js/app.js") }}></script>

    {{-- Show message --}}
    @if(Session::has('message'))
    <script>
        window.onload = function() {
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "{{ Session::get('message') }}",
            showConfirmButton: false,
            timer: 1500,
        });
    };
    </script>
    @endif

</body>

</html>
