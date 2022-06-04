<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Head-->

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <title>@yield('title','Laravel')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="apple-touch-icon" href="{{ asset('/')}}assets/backend/images/ico/apple-icon-120.png">

    <!-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/')}}assets/backend/images/ico/favicon.ico"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/')}}assets/backend/images/favicon.png">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    @yield('styles')

    <!-- BEGIN: Vendor CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/charts/apexcharts.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/extensions/toastr.min.css">

    <!-- END: Vendor CSS-->



    <!-- BEGIN: Theme CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/bootstrap-extended.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/colors.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/components.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/themes/dark-layout.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/themes/bordered-layout.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/core/menu/menu-types/vertical-menu.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/pages/dashboard-ecommerce.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/plugins/charts/chart-apex.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/plugins/extensions/ext-component-toastr.css">





    <!-- END: Page CSS-->



    <!-- BEGIN: Custom CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/style.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/custom.css?v={{ time() }}">

    <!-- END: Custom CSS-->







</head>

<!-- END: Head-->



<!-- BEGIN: Body-->



<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">



    @include('backend.layouts.partials._header')



    @include('backend.layouts.partials._navigation')





    <!-- BEGIN: Content-->

    <div class="app-content content ">

        <div class="content-overlay"></div>

        <div class="header-navbar-shadow"></div>

        @yield('content')

    </div>

    <!-- END: Content-->



    <div class="sidenav-overlay"></div>

    <div class="drag-target"></div>



    <!-- BEGIN: Footer-->

    <footer class="footer footer-static footer-light">

        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ms-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Company Name</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>

    </footer>

    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>

    <!-- END: Footer-->





    <!-- BEGIN: Vendor JS-->

    <script src="{{ asset('/')}}assets/backend/vendors/js/vendors.min.js"></script>

    <!-- BEGIN Vendor JS-->



    <!-- BEGIN: Page Vendor JS-->

    <script src="{{ asset('/')}}assets/backend/vendors/js/charts/apexcharts.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/extensions/toastr.min.js"></script>

    <!-- END: Page Vendor JS-->



    <!-- BEGIN: Theme JS-->

    <script src="{{ asset('/')}}assets/backend/js/core/app-menu.js"></script>

    <script src="{{ asset('/')}}assets/backend/js/core/app.js"></script>

    <!-- END: Theme JS-->



    <!-- BEGIN: Page JS-->

    <script src="{{ asset('/')}}assets/backend/js/scripts/pages/dashboard-ecommerce.js"></script>

    <!-- END: Page JS-->



    @yield('scripts')

    <script>

        $(window).on('load', function() {

            if (feather) {

                feather.replace({

                    width: 14,

                    height: 14

                });

            }

        })

    </script>

</body>

<!-- END: Body-->

</html>
