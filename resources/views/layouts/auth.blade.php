<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@if (isset($title))
        {{ $title }}
        @else
        Authentication
        @endif
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href={{ asset("assets/admin/images/favicon.ico")}}>

    <!-- Bootstrap Css -->
    <link href={{ asset("assets/admin/css/bootstrap.min.css")}} id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href={{ asset("assets/admin/css/icons.min.css")}} rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href={{ asset("assets/admin/css/app.min.css")}} id="app-style" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href={{ asset("assets/admin/libs/sweetalert2/sweetalert2.min.css") }} rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src={{ asset("assets/admin/libs/jquery/jquery.min.js")}}></script>
    <script src={{ asset("assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    <script src={{ asset("assets/admin/libs/metismenu/metisMenu.min.js")}}></script>
    <script src={{ asset("assets/admin/libs/simplebar/simplebar.min.js")}}></script>
    <script src={{ asset("assets/admin/libs/node-waves/waves.min.js")}}></script>

    <!-- Sweet Alerts js -->
    <script src={{ asset("assets/admin/libs/sweetalert2/sweetalert2.min.js")}}></script>

    <!-- Sweet alert init js-->
    <script src={{ asset("assets/admin/js/pages/sweet-alerts.init.js")}}></script>

    <!-- App js -->
    <script src={{ asset("assets/admin/js/app.js")}}></script>

    {{-- Show message --}}
    @if (Session::has('message'))
    <script>
        Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: {{ Session::get('message') }},
                        showConfirmButton: !1,
                        timer: 1500,
                        });
    </script>
    @endif
</body>

</html>