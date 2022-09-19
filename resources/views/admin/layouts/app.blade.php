<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Head-->

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <title>@yield('title','Laravel')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
  
    <link rel="apple-touch-icon" href="{{ asset('/')}}assets/admin/images/ico/apple-icon-120.png">

    <!-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/')}}assets/admin/images/ico/favicon.ico"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/')}}assets/admin/images/favicon.png">

    <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
    
    @yield('styles')

    <!-- BEGIN: Vendor CSS-->
  
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/charts/apexcharts.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/extensions/toastr.min.css">

    <!-- END: Vendor CSS-->



    <!-- BEGIN: Theme CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/bootstrap-extended.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/colors.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/components.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/themes/dark-layout.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/themes/bordered-layout.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/core/menu/menu-types/vertical-menu.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/pages/dashboard-ecommerce.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/charts/chart-apex.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/extensions/ext-component-toastr.css">

   



    <!-- END: Page CSS-->



    <!-- BEGIN: Custom CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/style.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/custom.css?v={{ time() }}">


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- END: Custom CSS-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/material-ui/5.0.0-beta.5/index.js" integrity="sha512-uKxirna7d5STmVXEMQYBVRW1nERrqHjwOubv4QcK4oYaaifLiEnN/aLIJxVsyK4R1K+awpNIG73RaQfT1DZ8ew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    


</head>

<!-- END: Head-->



<!-- BEGIN: Body-->



<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">



    @include('admin.layouts.partials._header')



    @include('admin.layouts.partials._navigation')





    <!-- BEGIN: Content-->

    <div class="app-content content" style="min-height:unset">

        <div class="content-overlay"></div>

        <div class="header-navbar-shadow"></div>

        @yield('content')

    </div>

    <!-- END: Content-->



    <div class="sidenav-overlay"></div>

    <div class="drag-target"></div>



    <!-- BEGIN: Footer-->

    <footer class="footer footer-static footer-light">

        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ms-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pathports</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span></p>

    </footer>

    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>

    <!-- END: Footer-->



<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"></script>

    <!-- BEGIN: Vendor JS-->

    <script src="{{ asset('/')}}assets/admin/vendors/js/vendors.min.js"></script>

    <!-- BEGIN Vendor JS-->



    <!-- BEGIN: Page Vendor JS-->

    <script src="{{ asset('/')}}assets/admin/vendors/js/charts/apexcharts.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/extensions/toastr.min.js"></script>

    <!-- END: Page Vendor JS-->



    <!-- BEGIN: Theme JS-->

    <script src="{{ asset('/')}}assets/admin/js/core/app-menu.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/core/app.js"></script>

    <!-- END: Theme JS-->



    <!-- BEGIN: Page JS-->

   <!--  <script src="{{ asset('/')}}assets/admin/js/scripts/pages/dashboard-ecommerce.js"></script> -->

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

        var close = document.getElementsByClassName("closebtn");
        var i;

        for (i = 0; i < close.length; i++) {
          close[i].onclick = function(){
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function(){ div.style.display = "none"; }, 600);
          }
        }



       /* $(".main-menu-content").click(function(){
            $(this).find('li.nav-item').addClass('active');
        });*/
    </script>

</body>

<!-- END: Body-->

</html>
